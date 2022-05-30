<?php include("config/config.php"); ?>
<?php include(DIRREQ."lib/html/header.php"); ?>
<?php echo DIRREQ."helpers/variables.php";  ?>

    <a href   = "<?php echo DIRPAGE.'views/user/Cadastro.php';  ?>">Cadastro</a><br>
    <a href   = "<?php echo DIRPAGE.'login.php';  ?>">Login</a><br>
    <a href   = "<?php echo DIRPAGE.'views/user';?>">Calendário do Usuário</a><br>
    <a href   = "<?php echo DIRPAGE.'views/manager';?>">Calendário do Manager</a>

<?php include(DIRREQ."lib/html/footer.php"); ?>
