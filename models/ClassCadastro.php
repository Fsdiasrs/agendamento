<?php
namespace Models;

class ClassCadastro extends ClassCrud{

    #Realizará a inserção no banco de dados
    public function insertCad($arrVar)
    {
        $this->insertDB(
        "users",
        "?,?,?,?,?,?,?,?,?,?,?,?,?,?,?",
            array(
                0,
                $arrVar['nome'],
                $arrVar['email'],
                $arrVar['hashSenha'],
                $arrVar['dataNascimento'],
                $arrVar['cpf'],
                $arrVar['dataCriacao'],
                'user',
                'confirmation',
                $arrVar['telefoneResid'],
                $arrVar['celular'],
                $arrVar['empresa'],
                $arrVar['emailEmp'],
                $arrVar['telefoneEmp'],
                $arrVar['planoSaude']
            )
        );

        $this->insConfirmation($arrVar);
    }

    #Realizará a inserção no banco de dados
    public function updateCad($arrVarUser,$id)
    {
        $b=$this->conectDB()->prepare("update users set email=?, dataNascimento=?, cpf=?, telefoneResid=?, celular=?, empresa=?, emailEmp=?, telefoneEmp=?, planoSaude=? where id=?");

        $b->bindParam(1, $arrVarUser['email'], \PDO::PARAM_STR);
        $b->bindParam(2, $arrVarUser['dataNascimento'], \PDO::PARAM_STR);
        $b->bindParam(3, $arrVarUser['cpf'], \PDO::PARAM_STR);
        $b->bindParam(4, $arrVarUser['telefoneResid'], \PDO::PARAM_STR);
        $b->bindParam(5, $arrVarUser['celular'], \PDO::PARAM_STR);
        $b->bindParam(6, $arrVarUser['empresa'], \PDO::PARAM_STR);
        $b->bindParam(7, $arrVarUser['emailEmp'], \PDO::PARAM_STR);
        $b->bindParam(8, $arrVarUser['telefoneEmp'], \PDO::PARAM_STR);
        $b->bindParam(9, $arrVarUser['planoSaude'], \PDO::PARAM_STR);
        $b->bindParam(10, $id, \PDO::PARAM_INT);
        $b->execute();

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

    public function deleteCadastro($id)
    {
            $this->deleteDB(
                "users",
                "id=?",
                array($id)
            );
    }
}