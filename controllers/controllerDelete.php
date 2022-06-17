<?php
include ("../config/config.php");
use Traits\TraitParseUrl;
$objEvents=new \Classes\ClassEvents();
$id=filter_input(INPUT_GET,'id',FILTER_DEFAULT);
$objEvents->deleteEvent($id);


