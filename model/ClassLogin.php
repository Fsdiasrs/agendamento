<?php
namespace Models;
use Traits\TraitGetIp;
class ClassLogin extends ClassCrud{

    private $trait;
    private $dateNow;

    public function __construct()
    {
        $this->trait=TraitGetIp::getUserIp();
        $this->dateNow=date("Y-m-d H:i:s");
    }

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

    #Conta as tentativas
    public function countAttempt(){
        #Consulta a tabela attempt do banco onde o ip é o ip do usuário
        $b=$this->selectDB(
            "*",
            "attempt",
            "where ip = ?",
            array(
                $this->trait
            )
        );
        $r=0; #variável r de row
        while ($f=$b->fetch(\PDO::FETCH_ASSOC)) {
            #se a data do banco for maior que a data atual - 1200 incrementa o $r 
            if(strtotime($f["date"])> strtotime($this->dateNow)-1200){
                $r++;
            }
        }
        return $r;
    }

    #Insere as tentativas
    public function insertAttempt(){
        #se countAttempt < 5 insere no banco id, ip, data atual
        if ($this->countAttempt()<5) {
            $this->insertDB(
                "attempt",
                "?,?,?",
                array(
                    0,
                    $this->trait,
                    $this->dateNow
                )
            );
        }        
    }

    #Deleta as tentativas
    public function deleteAttempt()
    {
        $this->deleteDB(
            "attempt",
            "ip=?",
            array(
                $this->trait
            )
        );
    }
}