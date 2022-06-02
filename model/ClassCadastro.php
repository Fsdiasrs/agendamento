<?php
    namespace Models;
    class ClassCadastro extends ClassCrud{

        #Realizará a inserção no banco de dados
        public function insertCad($arrVar){
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

        #Veriricar se já existe o mesmo email cadastro no db
        public function getIssetEmail($email)
        {
            $b=$this->selectDB(
                "*",
                "users",
                "where email=?",
                array(
                    $email
                )
            );
            return $r=$b->rowCount();
        }
    }

?>