<?php

  //var_dump($_POST);

  if (isset($_POST["usuario"])){
    $nome = $_POST["usuario"];
    $senha = $_POST["senha"];
  } else{
    $nome = $_GET["usuario"]" (get)";
    $senha = $_GET["senha"];
  }

  // Validação - usuário/Senha

  if ($nome == "admin" && $senha == "123456"){
    echo "<p>Seja bem-vindo(a) $nome!</p>";
    echo "<p>Senha: $senha</p>";
  } else{
    echo "<h1>Usuário e/ou senha inválidos!</h1>"
  }
