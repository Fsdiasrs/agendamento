<?php

$validate = new Classes\ClassValidate();


$validate->ValidateFields($_POST);
var_dump($validate->getErro());

?>