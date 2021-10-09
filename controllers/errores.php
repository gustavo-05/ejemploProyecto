<?php
    class Errores extends Controller
    {
        function __construct()
        {
            parent::__construct();
            $this->view->render('errores/index');
            error_log('Errores::construct-> inicio de errores');
        }
    }
?>