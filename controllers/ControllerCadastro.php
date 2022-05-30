<?php

$validate=new Classes\ClassValidate();
$validate->validateFields($_POST);
var_dump($validate->getErro());

?>