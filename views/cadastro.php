<?php \Classes\ClassLayout::setHeadRestrito("user"); ?>
<?php \Classes\ClassLayout::setHead('Cadastro', 'Realize seu cadastro em nosso sistema.'); ?>
<?php \Classes\ClassLayout::setMenu(); ?>

<div class="topFaixa float w100 center">
    Cadastro de Usuários
</div>
<div class="retornoCad float w100 center" id="retornoCad"></div>
<div class="container">
    <form name="formCadastro" id="formCadastro" action="<?php echo DIRPAGE . 'controllers/controllerCadastro'; ?>" method="post">

        <div class="cadastro float center">
            <h5>Dados do Usuário</h5>
            <div class="mb-3 float w100 h40">
                <input type="text" class="form-control" name="nome" id="nome" aria-describedby="helpId" placeholder="Nome" required>
            </div>
            <div class="mb-3 float w100 h40">
                <input class="form-control" type="email" id="email" name="email" placeholder="Email:" required>
            </div>
            <div class="mb-3 float w100 h40">
                <input class="form-control" type="text" id="cpf" name="cpf" placeholder="CPF:" maxlength="14" onkeyup="mascaraCpf()" required>
            </div>
            <div class="mb-3 float w100 h40">
                <input class="form-control" type="text" id="dataNascimento" name="dataNascimento" placeholder="Data de Nascimento:" required>
            </div>
            <div class="mb-3 float w100 h40">
                <input class="form-control" type="password" id="senha" name="senha" placeholder="Senha:" required>
            </div>
            <div class="mb-3 float w100 h40">
                <input class="form-control" type="password" id="senhaConf" name="senhaConf" placeholder="Confirmação da Senha:" required>
            </div>
            <div class="mb-3 float w100 h40">
                <input class="form-control" type="text" id="telefoneResid" name="telefoneResid" placeholder="Telefone residencial:">
            </div>
            <div class="mb-3 float w100 h40">
                <input class="form-control float h40" type="text" id="celular" name="celular" placeholder="Celular:" required>
            </div>
            <h5>Dados da Empresa</h5>
            <div class="mb-3 float w100 h40">
                <input class="form-control" type="text" id="empresa" name="empresa" placeholder="Nome da empresa:" required>
            </div>
            <div class="mb-3 float w100 h40">
                <input class="form-control" type="email" id="emailEmp" name="emailEmp" placeholder="Email da empresa:" required>
            </div>
            <div class="mb-3 float w100 h40">
                <input class="form-control" type="text" id="telefoneEmp" name="telefoneEmp" placeholder="Telefone da empresa:" required>
            </div>
            <div class="mb-3 float w100 h40">
                <input class="form-control" type="text" id="planoSaude" name="planoSaude" placeholder="Plano de saúde:" required>
            </div>
            <input class="float w100 h40" type="hidden" id="g-recaptcha-response" name="g-recaptcha-response" required>
            <input id="cadastrar" class="inlineBlock h40" type="submit" value="Cadastrar">
        </div>

    </form>
</div>

<?php \Classes\ClassLayout::setFooter(); ?>