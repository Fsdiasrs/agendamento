<?php include("config/config.php"); ?>
<?php include(DIRREQ."lib/html/header.php"); ?>

    <div class="fundo"></div>
    <form name="formLogin" id="formLogin" action="<?php echo DIRPAGE.'controllers/controllerLogin.php';?>" method="post">
        <div class="login">
            <div class="loginFormulario">
                <input type="email" name="email" placeholder="Email:" id="email" require>
                <input type="password" name="password" placeholder="Senha:" id="password" require>
                <input type="submit" value="Entrar">
            </div>
            <div class="loginTextos">
                Esqueci minha senha
            </div>
        </div>
    </form>
    <br>
    <a href                         = "<?php echo DIRPAGE.'views/user';?>">Calendário do Usuário</a><br>
    <a href                         = "<?php echo DIRPAGE.'views/manager';?>">Calendário do Manager</a>

<?php include(DIRREQ."lib/html/footer.php"); ?>
