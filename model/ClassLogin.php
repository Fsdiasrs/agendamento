<?php
namespace Models;

class ClassLogin extends ClassCrud{
    #Retorna os dados do usuário
    public function getDataUser($email)
    {
        $b=$this->selectDB(
            "*",
            "users",
            "where email=?",
            array(
                $email
            )
        );
        $f=$b->fetch(\PDO::FETCH_ASSOC);
        $r=$b->rowCount();
        return $arrData=[
            "data"=>$f,
            "rows"=>$r
        ];
    }
}