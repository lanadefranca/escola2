<?php

    include("conecta.php");
    $matricula  = $_GET["M"];

  $comando = $pdo->prepare("DELETE FROM alunos 
  WHERE matricula=$matricula");

  $resultado = $comando->execute();

  //voltar para o arquivo original após enviar
  header("Location: cadastro.html");

?>