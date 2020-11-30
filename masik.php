<?php
session_start();
$file=new SplFileObject("kerdesek.txt");
$kerdesek=[];
while(!$file->eof()){
      $sor=trim($file->fgets());
      $kerdesek[]=explode(";",$sor);
}
$_SESSION["kerdesek"]=$kerdesek;
header("Location:Beadando.php");
//print_r($kerdesek);
?>