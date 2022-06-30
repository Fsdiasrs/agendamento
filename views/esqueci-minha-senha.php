<?php \Classes\ClassLayout::setHead('Esqueci Minha Senha', 'Recupere sua senha.'); ?>

<div class="topFaixa float w100 center">
    Esqueci minha senha
</div>

<div class="retornoSen float w100 center"></div>
<div class="container">
    <form name="formSenha" id="formSenha" action="<?php echo DIRPAGE . 'controllers/controllerSenha'; ?>" method="post">
        <div class="cadastro float center">
            <div class="mb-3 float w100 h40">
                <input class="form-control" type="email" id="email" name="email" placeholder="Email:" required>
            </div>
            <div class="mb-3 float w100 h40">
                <input class="form-control" type="text" id="dataNascimento" name="dataNascimento" placeholder="Data de Nascimento:" required>
            </div>
                <input class="form-control" type="hidden" id="g-recaptcha-response" name="g-recaptcha-response" required>
                <input class="inlineBlock h40" type="submit" value="Solicitar">
        </div>
    </form>
</div>
<?php \Classes\ClassLayout::setFooter(); ?>