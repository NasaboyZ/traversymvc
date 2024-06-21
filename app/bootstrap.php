<?php

// Load Config
require_once 'config/config.php';
// Load Helpers
require_once 'helpers/url_helper.php';
require_once 'helpers/resizeImage.php';
require_once 'helpers/csrf_helper.php';
require_once 'helpers/session_helper.php';
require_once 'helpers/sanitaizer_helper.php';
// Load Libraries
require_once 'libraries/Core.php';
require_once 'libraries/Controller.php';
require_once 'libraries/Database.php';
// Load Controllers
require_once 'controllers/Admin.php';
require_once 'controllers/Pages.php';

// Initialize CSRF token
generateCSRFToken();

// autoload core libraries
spl_autoload_register(function($className){
    require_once 'libraries/' . $className . '.php';
});
