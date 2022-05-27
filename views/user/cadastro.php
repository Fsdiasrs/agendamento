<?php include("../../config/config.php"); ?>
<?php include(DIRREQ."lib/html/header.php"); ?>

    <form action="<?php echo DIRPAGE.'controllers/controllerCadastro.php;'?>" method="post" class="cadastro">
        <div class="cadastro">
            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" class="form-control form-control-sm" name="nome" id="nome" aria-describedby="helpId" placeholder="Informe o Nome" require>
                <small id="helpId" class="form-text text-muted">Nome e sobrenome</small>
            </div>

            <div class="form-group">
                <label for="email">E-mail</label>
                <input type="email" class="form-control form-control-sm" name="email" id="email" aria-describedby="emailHelpId" placeholder="Informe o e-mail" require>
                <small id="emailHelpId" class="form-text text-muted">abc@def.com</small>
            </div>  
            
            <div class="form-group">
                <label for="cpf">CPF</label>
                <input type="text" class="form-control form-control-sm" name="cpf" id="cpf" aria-describedby="helpId" placeholder="Informe o cpf" require>
                <small id="helpId" class="form-text text-muted">Somente números</small>
            </div>

            <div class="form-group">
              <label for="dataNascimento">Data Nascimento</label>
              <input type="date" class="form-control form-control-sm" name="dataNascimento" id="dataNascimento" aria-describedby="helpId" placeholder="" require>
              <small id="helpId" class="form-text text-muted">Data</small>
            </div>

            <div class="form-group">
              <label for="senha">Senha</label>
              <input type="password" class="form-control form-control-sm" name="senha" id="senha" placeholder="Digite senha" require>
              <small id="helpId" class="form-text text-muted">Senha</small>
            </div>

            <div class="form-group">
                <label for="senha">Confirme Senha</label>
                <input type="password" class="form-control form-control-sm" name="senhaConf" id="senhaConf" placeholder="Repita senha" require>
                <small id="helpId" class="form-text text-muted">Confirme Senha</small>
            </div>

            <button type="submit" class="btn btn-primary" id="btn-cad">Cadastrar</button>
        </div>
    </form>

<?php include(DIRREQ."lib/html/footer.php"); ?>
