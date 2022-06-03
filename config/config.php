<?php
#Caminhos absolutos
$dirInt   = "agendamento/"; #Caso os arquivos estejam dentro de uma pasta exemplo agendamento/ $dirInt = "agendamento/"
define('DIRPAGE',"http://{$_SERVER['HTTP_HOST']}/{$dirInt}");
$bar      = (substr($_SERVER['DOCUMENT_ROOT'],-1)=='/')?"":"/"; # caso no servidor o último caracter do Cocument_root for uma barra não adiciona nada caso contrário adiciona a barra
define('DIRREQ',"{$_SERVER['DOCUMENT_ROOT']}{$bar}{$dirInt}"); # constante para incluir arquivos 

#atalhos
define('DIRIMG',DIRPAGE.'img/');

#Banco de Dados
define('HOST','localhost');
define('DB','sistema');
define('USER','root');
define('PASS','');

#Incluir arquivos
include(DIRREQ.'lib/composer/vendor/autoload.php');
include(DIRREQ.'helpers/variables.php');

#Informações do servidor de email
define("HOSTNAME","smtp.gmail.com");
define("USERMAIL","testemail.testeemail@gmail.com");
define("PASSMAIL","t3st33m41l");

#Outras Informações
define("SITEKEY","6Lds3TwgAAAAAKNQPC4xw0neFIBTlQxdV70gqZt5");
define("SECRETKEY","6Lds3TwgAAAAAJ4COSMW0wRcnfeAG1bqPlxhLm1V");
define("DOMAIN",$_SERVER["HTTP_HOST"]);

