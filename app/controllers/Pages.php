<?php
class Pages extends Controller {
    private $adminModel;

    public function __construct(){
        $this->adminModel = $this->model('AdminModel');
    }

    public function index(){
        $events = $this->adminModel->getAllEvents();

        $data = [
            'title' => 'MueWear Collectiv',
            'events' => $events
        ];
        $this->view('pages/index', $data);
    }

    public function about(){
        $data = [
            'title' => 'About Us'
        ];
        $this->view('pages/about', $data);         
    }

    public function error404() {
        $data = [
            'title' => '404 Error',
            'description' => 'Page not found'
        ];
        $this->view('pages/404', $data);
    }

    public function fashionArt(){
        $events = $this->adminModel->getAllEvents();
        $fashionArtImages = $this->adminModel->getFashionArtImages();
        $data = [
            'title' => 'Fashion & Art',
            'events' => $events,
            'fashionArtImages' => $fashionArtImages
        ];
        $this->view('pages/fashion-and-art', $data);
    }

    public function community(){
        $blogposts = $this->adminModel->getAllBlogposts();
        $data = [
            'title' => 'Community',
            'blogposts' => $blogposts
        ];
        $this->view('pages/community', $data);
    }

    public function login(){
        $data = [
            'title' => 'Login'
        ];
        $this->view('pages/login', $data);
    }

    public function kontakt(){
        $data = [
            'title' => 'Kontakt'
        ];
        $this->view('pages/kontakt', $data);
    }
}
?>
