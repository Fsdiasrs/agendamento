<?php
namespace Models;

use Traits\TraitGetIp;

class ClassLogin extends ClassCrud{
    
    private $trait;
    private $dateNow;

    public function __construct()
    {
        $this->trait = TraitGetIp::getUserIp();
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
    
    /**
     * getDataUserById
     * Retorna os dados do usuário pelo id
     * @param  string $id
     * @return string
     */
    public function getDataUserById($id)
    {
        $b=$this->selectDB(
            "*",
            "users",
            "where id=?",
            array(
                $id
            )
        );
        $f=$b->fetch(\PDO::FETCH_ASSOC);
        $r=$b->rowCount();
        return $arrData=[
            "data"=>$f,
            "rows"=>$r
        ];
    }

        
    /**
     * getDataAllUserByName
     * Retorna todos os usuários com o nome indicado
     * @param  string $nome
     * @return string vetor
     */
    public function getDataAllUserByName($nome)
    {
        $valor= "%".$nome."%";
        $b=$this->selectDB(
            "*",
            "users",
            "where nome like ?",
            array(
                $valor
            )
        );
        $f=$b->fetchAll(\PDO::FETCH_ASSOC);
        $r=$b->rowCount();
        return $arrData=[
            "data"=>$f,
            "rows"=>$r
        ];
    }

    /**
     * getDataAllUserByName
     * Retorna todos os usuários com o nome indicado
     * @param  string $nome
     * @return string vetor
     */
    public function getDataAllUserByNameIdEmail($data)
    {
        
        $b=$this->selectDB(
            "*",
            "users",
            "where nome like %?% or id like %?% or email like %?%",
            array(
                $data
            )
        );
        $f=$b->fetchAll(\PDO::FETCH_ASSOC);
        $r=$b->rowCount();
        return $arrData=[
            "data"=>$f,
            "rows"=>$r
        ];
    }

    #Retorna os dados de todos os usuários
    public function getDataAllUser()
    {
        $b=$this->selectDB(
            "*",
            "users",
            "",
            array(             
)
        );
        $f=$b->fetchAll(\PDO::FETCH_ASSOC);
        $r=$b->rowCount();
        return $arrData=[
            "data"=>$f,
            "rows"=>$r
        ];
    }

    #Conta as tentativas
    public function countAttempt()
    {
        $b=$this->selectDB(
           "*",
           "attempt",
           "where ip = ?",
           array(
            $this->trait
           )
        );
        $r=0;
        while ($f=$b->fetch(\PDO::FETCH_ASSOC)) {
            if (strtotime($f["date"]) > strtotime($this->dateNow) - 1200) {
                $r++;
            } 
        }
        return $r;
    }

    #Insere as tentativas
    public function insertAttempt()
    {
        if ($this->countAttempt() < 5) {
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