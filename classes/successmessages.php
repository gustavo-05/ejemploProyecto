<?php
    class SuccessMessages
    {
        const PRUEBA = "be79cb487cdd6f798b54ccdf9aa03fa9";

        private $successList = [];

        public function __construct()
        {
            $this->successList = 
            [
                SuccessMessages::PRUEBA => 'mensaje de exito mijin'
            ];
        }

        public function get($hash)
        {
            return $this->successList[$hash];
        }

        public function existsKey($key)
        {
            if(array_key_exists($key, $this->successList))
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