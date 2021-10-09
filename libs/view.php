<?php
    class View
    {
        function __construct()
        {

        }

        function render($nombre, $data = [])
        {
            $this->d = $data;
            
            $this->handleMessages();
            
    
            require 'views/' . $nombre . '.php';
        }
        
        //muestra de mensajes desde la solicitud de los controladores
        private function handleMessages()
        {
            if(isset($_GET['success']) && isset($_GET['error']))
            {
                //error no se muestra nada porque no se puede dar esta accion al mismo tiempo
            }
            else if(isset($_GET['success']))
            {
                $this->handleSuccess();
            }
            else if(isset($_GET['error']))
            {
                $this->handleError();
            }
        }

        //creacion de la funcion error
        private function handleError()
        {
            $hash = $_GET['error'];
            $error = new ErrorMessages();

            if($error->existsKey($hash))
            {
                $this->d['error'] = $error->get($hash);
            }
        }

        private function handleSuccess()
        {
            $hash = $_GET['success'];
            $success = new SuccessMessages();

            if($success->existsKey($hash))
            {
                $this->d['success'] = $success->get($hash);
            }
        }

        //para mostrar la infomación en la vista
        public function showMessages()
        {
            $this->showErrors();
            $this->showSuccess();
        }

        public function showErrors()
        {
            if(array_key_exists('error', $this->d))
            {
                echo '<div class="error">'.$this->d['error'].'</div>';
            }
        }
    
        public function showSuccess()
        {
            if(array_key_exists('success', $this->d))
            {
                echo '<div class="success">'.$this->d['success'].'</div>';
            }
        }
    }
?>