<?php include("../../config/config.php"); ?>
<?php include(DIRREQ."lib/html/header.php"); ?>
<?php 
   use Classes\ClassSessions;
   $session=new ClassSessions();
   $session->verifyInsideSession();
?>

    <div class              = "calendarManager"></div>

<?php include(DIRREQ."lib/html/footer.php"); ?>