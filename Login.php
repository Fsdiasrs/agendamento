<?php include("config/config.php"); ?>
<?php include(DIRREQ."lib/html/header.php"); ?>

    <div class                  = "fundo"></div>

    <form name                  = "formLogin" id="formLogin" action="<?php echo DIRPAGE.'controllers/controllerLogin.php';?>" method="post">
        <div class              = "login">
            <div class          = "loginLogomarca float w100 center">
                <img src        = "<?php echo DIRPAGE.'img/LogomarcaHUSFP.png'; ?>" alt="Logomarca HUSFP">
            </div>
            <div class          = "loginFormulario float w100">
                <input class    = "float w100 h40" type="email" name="email" placeholder="Email:" id="email" require>
                <input class    = "float w100 h40" type="password" name="password" placeholder="Senha:" id="password" require>
                <input class    = "float h40 center" type="submit" value="Entrar">
                <div class      = "loginTextos float center"><a href="<?php echo DIRPAGE.'esqueci-minha-senha'; ?>">Esqueci minha senha</a></div>
            </div>
            
        </div>
    </form>
    <br>
<?php include(DIRREQ."lib/html/footer.php"); ?>
