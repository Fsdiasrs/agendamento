<?php
include ("../config/config.php");
$validate=new Classes\ClassValidate();
/*$validate->validateFields($_POST);
$email = $_POST['email'];
$dataNascimento = $_POST['dataNascimento'];
$cpf = $_POST['cpf'];*/
/*$validate->validateEmail($email);
$validate->validateData($dataNascimento);
$validate->validateCpf($cpf);*/
var_dump($_POST);
var_dump($arrVar);
$validate->validateFinalCad($arrVar);
?>