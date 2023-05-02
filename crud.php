<?php

  include("conecta.php");

  $matricula  = $_POST["matricula"];
  $nome       = $_POST["nome"];
  $idade      = $_POST["idade"];

  // Se clicou no botão INSERIR:
  if(isset($_POST["inserir"]) )
  {
    $comando = $pdo->prepare("INSERT INTO alunos(nome,idade) VALUES('$nome', $idade)");
    $resultado = $comando->execute();
    header("Location: cadastro.html");
  }
  if(isset($_POST["excluir"]) )
  {
    $comando = $pdo->prepare("DELETE FROM alunos WHERE matricula=$matricula");
    $resultado = $comando->execute();
    header("Location: cadastro.html");
  }
  if(isset($_POST["alterar"]) )
  {
    $comando = $pdo->prepare("UPDATE alunos SET nome='$nome', idade=$idade WHERE matricula=$matricula ");
    $resultado = $comando->execute();
    header("Location: cadastro.html");
  }
  if(isset($_POST["listar"]) )
  {
    $comando = $pdo->prepare("Select * FROM alunos");
    $resultado = $comando->execute();

    while( $linhas = $comando->fetch() )
    {
      $m = $linhas["matricula"];  //nome da coluna XAMPP
      $n = $linhas["nome"];       //nome da coluna XAMPP
      $i = $linhas["idade"];      //nome da coluna XAMPP
      echo("Matrícula: $m Nome: $n Idade: $i");
    }
  }
?>