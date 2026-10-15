<?php

$msg = $_REQUEST['msg'] ?? '';

// var_dump($_SERVER['REQUEST_METHOD']);

// 1. receber o formulário com e-mail e senha
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $email = $_POST['email'];
  $password = $_POST['password'];

  // 2. fazer consulta no db com os dados[
  $user = $database->query(
    query: "
    select * from users where email = :email and password = :password",
    class: User::class,
    params: compact("email", "password")
  )->fetch();

  // 3. se existir vamos adicioanar sessão o usuário autenticado
  if ($user) {
    $_SESSION['auth'] = $user;
    flash()->push('msg', 'Seja bem vindo' . $user->name . '!');
    header('location: /');
    exit();
  }
  // 4. mudar a informação no navbar para mostrar o nome do usuário
  // -> views/template/app.php
}


view("login", compact('msg'));