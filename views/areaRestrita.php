<?php \Classes\ClassLayout::setHeadRestrito("user"); ?>
<?php \Classes\ClassLayout::setHead('Agendamento de Consultas','Agende sua consulta.',''); ?>
<?php \Classes\ClassLayout::setMenu(); ?>

<input class="float w100 h40" type="hidden" id="g-recaptcha-response" name="g-recaptcha-response" required>
<a href="<?php echo DIRPAGE.'calendarUser';?>">Agendamento de consultas usuário</a><br>
<a href="<?php echo DIRPAGE.'calendarManager';?>">Agendamento de consultas Manager</a><br>

<?php \Classes\ClassLayout::setFooter(); ?>