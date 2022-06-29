<?php \Classes\ClassLayout::setHeadRestrito("user"); ?>
<?php \Classes\ClassLayout::setHead('Agendamento de Consultas','Agende sua consulta.',''); ?>
<?php \Classes\ClassLayout::setMenu(); ?>
<?php
var_dump($_SESSION);
?>
<input class="float w100 h40" type="hidden" id="g-recaptcha-response" name="g-recaptcha-response" required>
<?php \Classes\ClassLayout::setFooter(); ?>