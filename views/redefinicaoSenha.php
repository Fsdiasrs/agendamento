<?php \Classes\ClassLayout::setHeadRestrito("user"); ?>
<?php \Classes\ClassLayout::setHead('Redefinição de Senha', 'Redefina sua senha!'); ?>

<div class="topFaixa float w100 center">
    Redefinição de Senha
</div>

<div class="retornoSen"></div>
<div class="container">
    <form name="formRedSenha" id="formRedSenha" action="<?php echo DIRPAGE . 'controllers/controllerConfirmacaoSenha'; ?>" method="post">
        <div class="cadastro float center"></div>
        <input class="float w100 h40" type="hidden" id="email" name="email" value="<?php echo \Traits\TraitParseUrl::parseUrl(1); ?>" required>
        <input class="float w100 h40" type="hidden" id="token" name="token" value="<?php echo \Traits\TraitParseUrl::parseUrl(2); ?>" required>
        <div class="mb-3 float w100 h40">
            <input class="float w100 h40" type="password" id="senha" name="senha" placeholder="Senha:" required>
        </div>
        <div class="mb-3 float w100 h40">
            <input class="float w100 h40" type="password" id="senhaConf" name="senhaConf" placeholder="Confirmação da Senha:" required>
        </div>
        <input class="float w100 h40" type="hidden" id="g-recaptcha-response" name="g-recaptcha-response" required>
        <input class="inlineBlock h40" type="submit" value="Cadastrar Nova Senha">
    </form>
</div>
<?php \Classes\ClassLayout::setFooter(); ?>