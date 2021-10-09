<?php
    //llamando al archivo imodel
    include_once 'libs/imodel.php';
    //conexión a bd
    class Model
    {
        function __construct()
        {
            $this->db = new Database();
        }

        //para evitar inyecciones sql
        function query($query){
            return $this->db->connect()->query($query);
        }
    
        function prepare($query){
            return $this->db->connect()->prepare($query);
        }
    }
?>