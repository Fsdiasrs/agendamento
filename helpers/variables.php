<?php
$objPass        = new \Classes\ClassPassword();
$objEvents      = new \Classes\ClassEvents();

if (isset($_POST['nome'])) {$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);} else { $nome = null;}
if (isset($_POST['email'])) {$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);} else { $email = null;}
if (isset($_POST['cpf'])) {$cpf = filter_input(INPUT_POST, 'cpf', FILTER_SANITIZE_SPECIAL_CHARS);} else { $cpf = null;}
if (isset($_POST['dataNascimento'])) {$dataNascimento = filter_input(INPUT_POST, 'dataNascimento', FILTER_SANITIZE_SPECIAL_CHARS);} else { $dataNascimento = null;}
if (isset($_POST['senha'])) {$senha = $_POST['senha'];$hashSenha = $objPass->passwordHash($senha);} else { $senha = null; $hashSenha = null;}
if (isset($_POST['senhaConf'])) {$senhaConf = $_POST['senhaConf'];} else { $senhaConf = null;}
if (isset($_POST['token'])) {$token = $_POST['token'];} else { $token = bin2hex(random_bytes(64));}
if (isset($_POST['g-recaptcha-response'])) {$gRecaptchaResponse = $_POST['g-recaptcha-response'];} else { $gRecaptchaResponse = null;}
$dataCriacao    = date("Y-m-d H:s:i");
$arrVar = [
    "nome" => $nome,
    "email" => $email,
    "cpf" => $cpf,
    "dataNascimento" => $dataNascimento,
    "senha" => $senha,
    "hashSenha" => $hashSenha,
    "dataCriacao" => $dataCriacao,
    "token" => $token,
];

if (isset($_POST['id'])) {$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_SPECIAL_CHARS);} else { $id = null;}
if (isset($_POST['date'])) {$date = filter_input(INPUT_POST, 'date', FILTER_SANITIZE_SPECIAL_CHARS);} else { $date = null;}
if (isset($_POST['time'])) {$time = filter_input(INPUT_POST, 'time', FILTER_SANITIZE_SPECIAL_CHARS);} else { $time = null;}
if (isset($_POST['title'])) {$title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_SPECIAL_CHARS);} else { $title = null;}
if (isset($_POST['color'])) {$color = filter_input(INPUT_POST, 'color', FILTER_SANITIZE_SPECIAL_CHARS);} else { $color = 'blue';}
if (isset($_POST['description'])) {$description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_SPECIAL_CHARS);} else { $description = null;}
if (isset($_POST['horasAtendimento'])) {$horasAtendimento = filter_input(INPUT_POST, 'horasAtendimento', FILTER_SANITIZE_SPECIAL_CHARS);} else { $horasAtendimento = null;}
$start          = new \DateTime($date.' '.$time, new \DateTimeZone('America/Sao_Paulo'));

$arrEvent = [
    "id"=>$id,
    "date"=>$date,
    "time"=>$time,
    "title"=>$title,
    "description"=>$description,
    "horasAtendimento"=>$horasAtendimento,
    "start"=>$start,
    "color"=>$color,
];
