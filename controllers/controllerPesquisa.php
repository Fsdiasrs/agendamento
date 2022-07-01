<?php
include ("../config/config.php");

$objUsuario=new \Models\ClassCrud();
$title = filter_input(INPUT_GET, "title", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

if (!empty($title)) {
    $nome = "%".$title."%";
    $b=$objUsuario ->selectDB("id, nome", "users", "where nome like ?", array($nome));
    $f=$b->fetchAll(\PDO::FETCH_ASSOC);
    $r=$b->rowCount();
    $usuario=[
        "data"=>$f,
        "rows"=>$r
    ];
    if($usuario['rows'] == 0){
        $retorna = ['erro'=>true, 'msg'=>"Usuário não cadastrado, realize cadastro antes de marcar consultas!"];
    }else{
        $retorna = ['erro' => false, 'dados' => $usuario['data']];    
    }
} else {
    $retorna = ['erro' => true, 'msg' => "Erro: Nenhum usuário encontrado!"];
}

echo json_encode($retorna);