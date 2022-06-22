<?php
include ("../config/config.php");
$objEvents=new \Classes\ClassEvents();
$permition=filter_input(INPUT_POST,'permition',FILTER_DEFAULT);
$id=filter_input(INPUT_GET,'id',FILTER_DEFAULT);
$objEvents->deleteEvent($id);

if ($permition == "user") {
    echo "<script>location = '".DIRPAGE."calendarUser';</script>";
} else {
    echo "<script>location = '".DIRPAGE."calendarManager';</script>";
}

