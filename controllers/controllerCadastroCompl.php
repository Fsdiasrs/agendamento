<?php
$validate= new Classes\ClassValidate();
$validate->validateEmail($emailEmp);
$validate->validateCaptcha($gRecaptchaResponse);
echo $validate->validateFinalCad($arrVar);