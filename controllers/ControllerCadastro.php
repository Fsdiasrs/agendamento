<?php
    include ("../config/config.php");
    $objEvents=new \Classes\ClassCadastro();
    $nome=filter_input(INPUT_POST,'nome_usuario',FILTER_DEFAULT);
    $email=filter_input(INPUT_POST,'email_usuario',FILTER_VALIDATE_EMAIL);
    $password=filter_input(INPUT_POST,'senha_usuario',FILTER_DEFAULT);
    $login=filter_input(INPUT_POST,'login_usuario',FILTER_DEFAULT);
    $senha=filter_input(INPUT_POST,'senha_usuario',FILTER_DEFAULT);
    

    $objEvents->createCadastro(
        0,
        $nome,
        $email,
        $login,
        $password
    );
    
?>