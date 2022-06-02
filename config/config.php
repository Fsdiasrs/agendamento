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

#Outras Informações
define("SITEKEY","6LfQaTwgAAAAADFc8lF4S2E8Uuqyk49v_L23BSgM");
define("SECRETKEY","6LfQaTwgAAAAAJ_X469BcWWEDhQjcFENJhlI3IQJ");