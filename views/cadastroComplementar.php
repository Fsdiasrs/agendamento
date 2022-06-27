<?php \Classes\ClassLayout::setHeadRestrito("manager"); ?>
<?php \Classes\ClassLayout::setHead('Cadastro Complementar','Complete seu cadastro.'); ?>
<?php \Classes\ClassLayout::setMenu(); ?>

<div class="topFaixa float w100 center">
    Cadastro Complementar
</div>
<div class="retornoCad float w100 center"></div>
<form name="formCadastroCompl" id="formCadastroCompl" action="<?php echo DIRPAGE.'controllers/controllerCadastroCompl'; ?>" method="post">
    <div class="cadastro float center">
        <input class="form-control float w100 h40" type="text" id="empresa" name="nome" placeholder="Nome da empresa:" required>
        <input class="form-control float w100 h40" type="email" id="emailEmp" name="emailEmp" placeholder="Email da empresa:" required>
        <input class="form-control float w100 h40" type="text" id="telefoneEmp" name="telefoneEmp" placeholder="Telefone da empresa:" required>
        <input class="form-control float w100 h40" type="text" id="telefoneResid" name="telefoneResid" placeholder="Telefone residencial:">
        <input class="form-control float w100 h40" type="text" id="telefonePessoal" name="telefonePessoal" placeholder="Telefone pessoal:" required>
        <input class="form-control float w100 h40" type="text" id="planoSaude" name="planoSaude" placeholder="Plano de saúde:" required>
        <input class="float w100 h40" type="hidden" id="g-recaptcha-response" name="g-recaptcha-response" required>
        <input class="inlineBlock h40" type="submit" value="Cadastrar">
    </div>
</form>

<?php \Classes\ClassLayout::setFooter(); ?>