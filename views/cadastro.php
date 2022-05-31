<?php include("../config/config.php"); ?>
<?php include(DIRREQ."lib/html/header.php"); ?>

    <div class="topFaixa float w100 center">
        Cadastro de Paciente
    </div>

    <form action="<?php echo DIRPAGE.'controllers/controllerCadastro.php';?>" name="formCadastro" id="formCadastro" method="post">
        <div class="cadastro float center">
            <input class="float w100 h40" type="text" id="name" name="name" placeholder="Nome:" required>
            <input class="float w100 h40" type="email" id="email" name="email" placeholder="E-mail:" required>
            <input class="float w100 h40" type="text" id="cpf" name="cpf" placeholder="CPF:" required>
            <input class="float w100 h40" type="text" id="dataNascimento" name="dataNascimento" placeholder="Data de nascimento:" required>
            <input class="float w100 h40" type="password" id="senha" name="senha" placeholder="Senha:" required>
            <input class="float w100 h40" type="password" id="senhaConf" name="senhaConf" placeholder="Confirmação da senha:" required>
            <input class="inlineBlock h40" type="submit" value="Cadastrar">
        </div>
    </form>


<?php include(DIRREQ."lib/html/footer.php"); ?>
