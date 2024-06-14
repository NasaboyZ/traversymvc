<?php

class Core {
    protected $currentController = 'Pages';
    protected $currentMethod = 'index';
    protected $params = [];

    public function __construct() {
        $url = $this->getUrl();
        
        if ($url && isset($url[0])) {
            error_log("URL: " . implode('/', $url));
        } else {
            error_log("URL not set");
        }

        if ($url && isset($url[0]) && file_exists('../app/controllers/' . ucwords($url[0]) . '.php')) {
            $this->currentController = ucwords($url[0]);
            unset($url[0]);
        }

        require_once '../app/controllers/' . $this->currentController . '.php';
        $this->currentController = new $this->currentController;

        if ($url && isset($url[1]) && method_exists($this->currentController, $url[1])) {
            $this->currentMethod = $url[1];
            unset($url[1]);
        } else {
            // Fallback to index method if specific method does not exist
            $this->currentMethod = 'index';
        }

        $this->params = $url ? array_values($url) : [];

        error_log("Controller: " . get_class($this->currentController));
        error_log("Method: " . $this->currentMethod);

        call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
    }

    public function getUrl() {
        if (isset($_GET['url'])) {
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            return $url;
        }
        return [];
    }
}
?>
