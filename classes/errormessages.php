<?php
    class ErrorMessages
    {
        const PRUEBA = "be79cb487cdd6f798b54ccdf9aa03fa9";

        private $errorList = [];
        
        public function __construct()
        {
            $this->errorList = 
            [
                ErrorMessages::PRUEBA => 'Existe un error mijin'
            ];
        }

        public function get($hash)
        {
            return $this->errorList[$hash];
        }

        public function existsKey($key)
        {
            if(array_key_exists($key, $this->errorList))
            {
                return true;
            }
            else
            {
                return false;
            }
        }
    }
?>