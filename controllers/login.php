<?php
    class Login extends Controller
    {
        function __construct()
        {
            parent::__construct();
            //error_log('Login::construct-> inicio login');
        }

        function render()
        {
            error_log('Login::render-> cargando el controlador del index del login');
            $this->view->render('login/index');
        }
        
    }
?>