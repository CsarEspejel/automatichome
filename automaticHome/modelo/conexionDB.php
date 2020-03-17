<?php
  //Credenciales
  $usuario = "root";
  $contrasena = "";
  $servidor = "localhost";
  $nombreDB = "automatichome";
  try{
    $con = new PDO('mysql:host='.$servidor.';dbname='.$nombreDB.'',$usuario,'');
    // echo "Simón ese";
    //$con = new PDO('mysql:host='.$servidor.';dbname='.$nombreDB,$usuario,$contrasena);
  }catch(PDOException $e){
    echo "Error, nel ese: ".$e->getMessage();
  }

?>
