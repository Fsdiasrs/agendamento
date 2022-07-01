<?php \Classes\ClassLayout::setHead('Dados do Paciente', 'Visualize os dados do Paciente.', 'Fábio Dias'); ?>
<?php
use Models\ClassCadastro;
$objUsuario=new ClassCadastro();
$id = filter_input(INPUT_GET,"id",FILTER_SANITIZE_NUMBER_INT);



if(!empty($id)){
   /*  $objUsuario->deleteCadastro($id); */
    $b=true; /* $objUsuario->deleteCadastro($id); */
    if($b){
        $retorna = ['status' => true, 'msg' => "<div class='alert alert-success' role='alert'>Usuario apagado com sucesso!</div>"];
    }else{
        $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Usuario nao apagado com sucesso!</div>"];
    }
    }else{
    $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Usuário nao apagado com sucesso!</div>"];
}

echo json_encode($retorna);

?>
<?php \Classes\ClassLayout::setFooter(); ?>