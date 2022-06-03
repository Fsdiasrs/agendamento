<?php
include ("../config/config.php");
$validate=new Classes\ClassValidate();
$validate->validateFields($_POST);
$validate->validateEmail($email);
$validate->validateIssetEmail($email);
$validate->validateData($dataNascimento);
$validate->validateCpf($cpf);
$validate->validateConfSenha($senha, $senhaConf);
$validate->validateStrongSenha($senha);
$validate->validateCaptcha($gRecaptchaResponse);
echo $validate->validateFinalCad($arrVar);
/*var_dump($validate->getErro());*/
$validate->validateFinalCad($arrVar);
?>