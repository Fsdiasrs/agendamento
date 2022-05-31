<?php
    namespace Classes;
    use Models\ClassCadastro;

    class ClassValidate{

        private $erro         = [];
        private $cadastro;

        public function __construct()
        {
            $this->cadastro   = new ClassCadastro();
        }

        public function getErro()
        {
            return $this->erro;
        }

        public function setErro($erro)
        {
            array_push($this->erro,$erro);
        }

        #Validar se os campos desejados foram preenchidos
        public function validateFields($par)
        {
            $i                = 0;
            foreach ($par as $key => $value){
                if(empty($value)){
                    $i++;
                }
            }
            if($i==0){
                return true;
            }else{
                $this->setErro("Preencha todos os dados!");
                return false;
            }
        }

        #Validação se o dado é um email
        public function validateEmail($par){
            if (filter_var($par, FILTER_VALIDATE_EMAIL)) {
                return true;
            } else {
                $this->setErro("E-mail inválido!");
                return false;
            }
            
        }

        #Validação se o dado é uma data
        public function validateData($par){
            $data             = \DateTime::createFromFormat("d/m/Y",$par);
            if (($data) && ($data->format("d/m/Y")===$par)) {
                return true;
            } else {
                $this->setErro("Data inválida");
                return false;
            }
        }

        #Validação se é um cpf real
        public function validateCpf($par)
        {
            $cpf              = preg_replace('/[^0-9]/', '', (string) $par);
            if (strlen($cpf) != 11){
                $this->setErro("Cpf Inválido!");
                return false;
            }
            for ($i = 0, $j = 10, $soma = 0; $i < 9; $i++, $j--)
                $soma         += $cpf[$i] * $j;
                $resto        = $soma % 11;
            if ($cpf[9] != ($resto < 2 ? 0 : 11 - $resto))
            {
                $this->setErro("Cpf Inválido!");
                return false;
            }
            for ($i = 0, $j = 11, $soma = 0; $i < 10; $i++, $j--)
                $soma         += $cpf[$i] * $j;
                $resto        = $soma % 11;
                return $cpf[10] == ($resto < 2 ? 0 : 11 - $resto);
        }
        
        #Validação final do cadastro
        public function validateFinalCad($arrVar){
            $this->cadastro->insertCad($arrVar);
        }
    }
?>