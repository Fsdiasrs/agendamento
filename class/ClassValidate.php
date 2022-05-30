<?php
    namespace Classes;
    class ClassValidate{
        private $erro   = [];

        public function getErro(){
            return $this->erro;
        }

        public function setErro($erro){
           array_push($this->erro,$erro);
        }

        #Validar se os campos desejados foram preenchidos
        public function ValidateFields($param){
            $i          = 0;
            foreach($param as $key => $value){
                if (empty($value)) {
                    $i++;
                }
            }

            if($i==0){
                return true;
            }else{
                $this->setErro("Preencha todos os campos!");
                return false;
            }
        }
    }

?>