<?php \Classes\ClassLayout::setHeadRestrito("user"); ?>
<?php
$permition = $_SESSION['permition'];
$objSession = new \Classes\CLassSessions();
$objSession->selectCalendar($permition);
