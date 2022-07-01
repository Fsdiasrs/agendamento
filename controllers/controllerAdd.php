
<?php
include("../config/config.php");
$objEvents = new \Classes\ClassEvents();
$permition = filter_input(INPUT_POST, 'permition', FILTER_DEFAULT);
$id_usuario = filter_input(INPUT_POST, 'id_usuario', FILTER_DEFAULT);
$date = filter_input(INPUT_POST, 'date', FILTER_DEFAULT);
$time = filter_input(INPUT_POST, 'time', FILTER_DEFAULT);
$title = filter_input(INPUT_POST, 'title', FILTER_DEFAULT);
$description = filter_input(INPUT_POST, 'description', FILTER_DEFAULT);
$horasAtendimento = filter_input(INPUT_POST, 'horasAtendimento', FILTER_DEFAULT);
$start = new \DateTime($date . ' ' . $time, new \DateTimeZone('America/Sao_Paulo'));

if ($id_usuario == null or $id_usuario == '') {
    echo "<script>
        alert('Erro: você está tentando marcar uma consulta para um usuário não cadastrado!'); 
    </script>";
    if ($permition == "user") {
        echo "<script> location = '" . DIRPAGE . "calendarUser';</script>";
    } else {
        echo "<script>location = '" . DIRPAGE . "calendarManager';</script>";
    }
} else {
    $objEvents->createEvent(
        0,
        $id_usuario,
        $title,
        $description,
        'blue',
        $start->format("Y-m-d H:i:s"),
        $start->modify('+' . $horasAtendimento . 'minutes')->format("Y-m-d H:i:s")
    );
    if ($permition == "user") {
        echo "<script> location = '" . DIRPAGE . "calendarUser';</script>";
    } else {
        echo "<script>location = '" . DIRPAGE . "calendarManager';</script>";
    }
}
