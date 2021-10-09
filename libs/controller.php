<?php
    class Controller
    {
        function __construct()
        {
            $this->view = new View();
        }

        //accediendo al controlador
        function loadModel($model)
        {
            $url = 'models/'.$model.'model.php';
    
            if(file_exists($url))
            {
                require_once $url;
    
                $modelName = $model.'Model';
                $this->model = new $modelName();
            }
        }

        //metodos para funcionalidades
        //para parametros en la base de datos, por POST
        function existPOST($params)
        {
            //para la validación de parametros a recibir y evitar datos incompletos
            foreach($params as $param)
            {
                if(!issset($_POST[$param]))
                {
                    error_log('CONTROLLER::existsPost => No existe el parámetro ' . $param);
                    return false;
                }
            }
            //error_log("ExistPOST: Existen parámetros");
            return true;
        }

        //para parametros en la base de datos, por GET
        function existGET($params)
        {
            //para la validación de parametros a recibir y evitar datos incompletos
            foreach($params as $param)
            {
                if(!issset($_GET[$param]))
                {
                    error_log('CONTROLLER::existsGet => No existe el parámetro ' . $param);
                    return false;
                }
            }
            //error_log("ExistPOST: Existen parámetros");
            return true;
        }

        //para llamar parametros tanto por post y get
        function getGet($name)
        {
            return $_GET[$name];
        }

        function getPost($name)
        {
            return $_POST[$name];
        }

        //para redirigir
        function redirect($route, $mensajes)
        {
            $data = [];
            $params = '';
            
            foreach ($mensajes as $key => $mensaje) 
            {
                array_push($data, $key . '=' . $mensaje);
            }
            $params = join('&', $data);
            
            if($params != '')
            {
                $params = '?' . $params;
            }
            header('Location: ' . constant('URL') . $route . $params);
        }
    }
?>