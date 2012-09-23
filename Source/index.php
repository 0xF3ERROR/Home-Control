<?php    //error_reporting(E_ALL);
session_start();
include('class/logic/cls_Include.php');
error_reporting(E_ALL & ~(E_STRICT|E_NOTICE)); 
//$Request=new Request();
//Logger::write("Error Datei wurde nicht hochgeladen ".var_dump($Request));

//Logger::write("Datei wird hochgeladen ".$_FILES['File']['name']." Pfad ".$Request->getAsString("AD").$Request->getAsString("ND"));

$Controler_Main= Controler_Main::getInstance();

$Controler_Main->start();

//include "inhalt.php";
?> 