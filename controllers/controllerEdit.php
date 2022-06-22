<?php
include ("../config/config.php");
$objEvents=new \Classes\ClassEvents();
$permition=filter_input(INPUT_POST,'permition',FILTER_DEFAULT);
$date=filter_input(INPUT_POST,'date',FILTER_DEFAULT);
$time=filter_input(INPUT_POST,'time',FILTER_DEFAULT);
$id=filter_input(INPUT_POST,'id',FILTER_DEFAULT);
$title=filter_input(INPUT_POST,'title',FILTER_DEFAULT);
$description=filter_input(INPUT_POST,'description',FILTER_DEFAULT);
$horasAtendimento=filter_input(INPUT_POST,'horasAtendimento',FILTER_DEFAULT);
$start=new \DateTime($date.' '.$time, new \DateTimeZone('America/Sao_Paulo'));
$end=new \DateTime($date.' '.$time, new \DateTimeZone('America/Sao_Paulo'));

$objEvents->updateEvent(
    $title,
    $description,
    $start->format("Y-m-d H:i:s"),
    $end = $start->modify('+'.$horasAtendimento.'minutes')->format("Y-m-d H:i:s"),
    $id
);

echo "<script>alert('Dados editados com sucesso!'); location = '".DIRPAGE."calendarManager';</script>";
