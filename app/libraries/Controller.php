<?php
/*
this ist the base controller and  it loads the models and the views
*/

class Controller{
    public function model($model){
        // requiere model file
        require_once '../app/models/'. $model. '.php';
        // instantiate model
        return new $model();
    }

    // Load view 
    public function view($view, $data = []){
        // Check for view file
        if(file_exists('../app/views/'. $view. '.php')){
            require_once '../app/views/'. $view. '.php';
        } else {
            // View does not exist
            die('View does not exist');
        }
    }
}