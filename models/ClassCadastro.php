<?php
namespace Models;

class ClassCadastro extends ClassCrud{

    #Realizará a inserção no banco de dados
    public function insertCad($arrVar)
    {
        $this->insertDB(
        "users",
        "?,?,?,?,?,?,?,?,?",
            array(
                0,
                $arrVar['nome'],
                $arrVar['email'],
                $arrVar['hashSenha'],
                $arrVar['dataNascimento'],
                $arrVar['cpf'],
                $arrVar['dataCriacao'],
                'user',
                'confirmation'
            )
        );

        $this->insConfirmation($arrVar);
    }

    #Inserção de confirmação
    public function insConfirmation($arrVar)
    {
        $this->insertDB(
            "confirmation",
            "?,?,?",
            array(
                0,
                $arrVar['email'],
                $arrVar['token']
            )
        );
    }

    #Verifica diretamente no banco de dados se o email esta cadastrado
    public function getIssetEmail($email)
    {
        $b=$this->selectDB(
            "*",
            "users",
            "where email = ?",
            array(
                $email
            )
        );
        return $r=$b->rowCount();
    }

    #Verificar a confirmação de cadastro pelo email
    public function confirmationCad($email,$token)
    {
        $b=$this->selectDB(
            "*",
            "confirmation",
            "where email=? and token=?",
            array(
                $email,
                $token
            )
        );
        $r=$b->rowCount();

        if($r >0){
            $this->deleteDB(
                "confirmation",
                "email=?",
                array($email)
            );

            $this->updateDB(
                "users",
                "status=?",
                "email=?",
                array(
                    "active",
                    $email
                )
            );
            return true;
        }else{
            return false;
        }
    }

    #Verificar a confirmação de senha
    public function confirmationSen($email,$token,$hashSenha)
    {
        $b=$this->selectDB(
            "*",
            "confirmation",
            "where email=? and token=?",
            array(
                $email,
                $token
            )
        );
        $r=$b->rowCount();

        if($r >0){
            $this->deleteDB(
                "confirmation",
                "email=?",
                array($email)
            );

            $this->updateDB(
                "users",
                "senha=?",
                "email=?",
                array(
                    $hashSenha,
                    $email
                )
            );
            return true;
        }else{
            return false;
        }
    }
}