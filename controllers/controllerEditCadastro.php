<?php
$validate= new Classes\ClassValidate();
$validate->validateFields($_POST);
$validate->validateEmail($email);
$validate->validateEmail($emailEmp);
$validate->validateData($dataNascimento);
$validate->validateCpf($cpf);
$validate->validateCaptcha($gRecaptchaResponse);
echo $validate->validateFinalEdit($arrVarUser,$id);
/* var_dump($_POST);
var_dump($arrVarUser); */