<?php
namespace Classes;
use Models;

class ClassSessions{

    private $login;
    private $timeSession=1200;
    private $timeCanary=300;

    public function __construct()
    {
        if(session_id() == ''){
            ini_set("session.save_handler","files");
            ini_set("session.use_cookies",1);
            ini_set("session.use_only_cookies",1);
            ini_set("session.cookie_domain",DOMAIN);
            ini_set("session.cookie_httponly",1);
            if(DOMAIN != "localhost"){ini_set("session.cookie_secure",1);}
            /*Criptografia das nossas sessions*/
            ini_set("session.entropy_length",512);
            ini_set("session.entropy_file",'/dev/urandom');
            ini_set("session.hash_function",'sha256');
            ini_set("session.hash_bits_per_character",5);
            session_start();
        }
        $this->login=new Models\ClassLogin();
    }

    #Proteger contra roubo de sessão
    public function setSessionCanary($par=null)
    {

    }

    #Verificar a integridade da sessão
    public function verifyIdSessions()
    {

    }

    #Setar as sessões do nosso sistema
    public function setSessions($email)
    {
        $this->verifyIdSessions();
        $_SESSION["login"]=true;
        $_SESSION["time"]=time();
        $_SESSION["name"]=$this->login->getDataUser($email)['data']['nome'];
        $_SESSION["email"]=$this->login->getDataUser($email)['data']['email'];
        $_SESSION["permition"]=$this->login->getDataUser($email)['data']['permissoes'];
    }

    #Validar as páginas internas do sistema
    public function verifyInsideSession()
    {

    }
}