<?php \Classes\ClassLayout::setHead('Cadastro', 'Realize seu cadastro em nosso sistema.'); ?>
<?php \Classes\ClassLayout::setMenu(); ?>
<?php  
$objPaciente=new \Models\ClassLogin();
$b=$objPaciente->getDataUserById($_GET['id']);
?>
<div class="topFaixa float w100 center">
    Editar Dados do Usuário
</div>
<div class="retornoEditCad float w100 center" id="retornoEditCad"></div>
<div class="container">
    <form name="formEditCadastro" id="formEditCadastro" action="<?php echo DIRPAGE . 'controllers/controllerEditCadastro'; ?>" method="post">

        <div class="cadastro float center">
            <h5>Dados do Usuário</h5>
            <div class="mb-3 float w100 h40">
                <input type="hidden" class="form-control" name="id" id="id" value="<?php echo $b['data']['id'];?>" aria-describedby="helpId" placeholder="Nome" required>
            </div>
            <div class="mb-3 float w100 h40">
                <input type="text" class="form-control" name="nome" id="nome" value="<?php echo $b['data']['nome'];?>" aria-describedby="helpId" placeholder="Nome" disabled required>
            </div>
            <div class="mb-3 float w100 h40">
                <input class="form-control" type="email" id="email" name="email" value="<?php echo $b['data']['email'];?>" placeholder="Email:" required>
            </div>
            <div class="mb-3 float w100 h40">
                <input class="form-control" type="text" id="cpf" name="cpf" value="<?php echo $b['data']['cpf'];?>" placeholder="CPF:" maxlength="14" onkeyup="mascaraCpf()" required>
            </div>
            <div class="mb-3 float w100 h40">
                <input class="form-control" type="text" id="dataNascimento" name="dataNascimento" value="<?php echo $b['data']['dataNascimento'];?>" placeholder="Data de Nascimento:" required>
            </div>
            <div class="mb-3 float w100 h40">
                <input class="form-control" type="text" id="telefoneResid" name="telefoneResid" value="<?php echo $b['data']['telefoneResid'];?>" placeholder="Telefone residencial:">
            </div>
            <div class="mb-3 float w100 h40">
                <input class="form-control float h40" type="text" id="celular" name="celular" value="<?php echo $b['data']['celular'];?>" placeholder="Celular:" required>
            </div>
            <h5>Dados da Empresa</h5>
            <div class="mb-3 float w100 h40">
                <input class="form-control" type="text" id="empresa" name="empresa" value="<?php echo $b['data']['empresa'];?>" placeholder="Nome da empresa:" required>
            </div>
            <div class="mb-3 float w100 h40">
                <input class="form-control" type="email" id="emailEmp" name="emailEmp" value="<?php echo $b['data']['emailEmp'];?>" placeholder="Email da empresa:" required>
            </div>
            <div class="mb-3 float w100 h40">
                <input class="form-control" type="text" id="telefoneEmp" name="telefoneEmp" value="<?php echo $b['data']['telefoneEmp'];?>" placeholder="Telefone da empresa:" required>
            </div>
            <div class="mb-3 float w100 h40">
                <input class="form-control" type="text" id="planoSaude" name="planoSaude" value="<?php echo $b['data']['planoSaude'];?>" placeholder="Plano de saúde:" required>
            </div>
            <input class="float w100 h40" type="hidden" id="g-recaptcha-response" name="g-recaptcha-response" required>
            <input class="inlineBlock h40" type="submit" value="Alterar">
        </div>

    </form>
</div>

<?php \Classes\ClassLayout::setFooter(); ?>