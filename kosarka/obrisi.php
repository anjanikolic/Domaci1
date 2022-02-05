<?php
include('inicijalizacija.php');
$id = $_GET['id'];

$db->where("mecID", $id);//za mec sa ovim id-om brisemo 
$db->delete('mec');
header("Location: tabelaTimovi.php");//sluzi da nas vrati na stranicu
?>
