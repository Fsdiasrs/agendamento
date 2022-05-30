<?php
namespace Classes;
class ClassValidate{
    private $erro=[];

    #Validar se os campos desejados foram preenchidos
    public function ValidateFields($param){
        $i=0;
        foreach($param as $key => $value){
            echo $key.'=>'.$value;
        }
    }
}



?>