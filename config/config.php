<?php
#Caminhos absolutos
$pastaInterna="login/";
define('DIRPAGE',"http://{$_SERVER['HTTP_HOST']}/{$pastaInterna}");
(substr($_SERVER['DOCUMENT_ROOT'],-1)=='/')?$barra="":$barra="/";
define('DIRREQ',"{$_SERVER['DOCUMENT_ROOT']}{$barra}{$pastaInterna}");

#Atalhos
define('DIRIMG',DIRPAGE.'img/');
define('DIRCSS',DIRPAGE.'lib/css/');
define('DIRJS',DIRPAGE.'lib/js/');

#Acesso ao db
define('HOST',"localhost");
define('DB',"sistema");
define('USER',"root");
define('PASS',"");

#Informações do servidor de email
define("HOSTMAIL","smtp.mailgun.org");
define("USERMAIL","postmaster@sandbox337f31c81a7c401abfe34eb10185c4c4.mailgun.org");
define("PASSMAIL","bf9980ff2c34a8544ac8d26174d34e08-50f43e91-49978341");

#Informações do ReCapatcha
define("SITEKEY","6LcJhWUgAAAAAJTZmKMq-xrGHZX7ufebE3tqgKpq");
define("SECRETKEY","6LcJhWUgAAAAAD3rvwLJ_Lswn1ah2pii-XHgBej8");
define("DOMAIN",$_SERVER["HTTP_HOST"]);

include(DIRREQ."lib/composer/vendor/autoload.php");