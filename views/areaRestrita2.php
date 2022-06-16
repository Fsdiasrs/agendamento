<?php \Classes\ClassLayout::setHeadRestrito("manager"); ?>
<?php \Classes\ClassLayout::setHead('Área Restrita','Exclusivo para menbros.',''); ?>
<h1>Ferramentas Gerenciais</h1>
Área exclusiva para o gerente do sistema <br>
<a href="<?php echo DIRPAGE.'controllers/controllerLogout'; ?>">Sair</a>
<?php \Classes\ClassLayout::setFooter(); ?>