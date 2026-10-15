<?php

require 'Validation.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $validations = [];
  $name = $_POST['name'];
  $email = $_POST['email'];
  $confirm_email = $_POST['confirm_email'];
  $password = $_POST['password'];

  $validation = Validation::validate([
    'name' => 'required',
    'email' => ['required', 'email', 'confirmed'],
    'password' => ['required', 'min:8', 'max:30', 'strong']
  ]);


  // if ($validation->invalid()) {
  //   $_SESSION['validations'] = $validation->validations;
  //   header("location: /login");
  //   exit();
  // }

  if (strlen($name) === 0) {
    $validations[] = 'O nome é obrigatório';
  }

  if (strlen($email) === 0) {
    $validations[] = 'O e-mail é obrigatório';
  }

  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $validations[] = 'O e-mail é inválido';
  }

  if ($email !== $confirm_email) {
    $validations[] = 'O e-mail de confirmação está diferente.';
  }

  if (strlen($password) < 8 || strlen($password) > 30) {
    $validations[] = 'A senha precisa ter entre 8 e 30 caracteres.';
  }

  if (sizeof($validations) > 0) {
    $_SESSION['validations'] = $validations;
    header("location: /login");
    exit();
  }

  $database->query(
    query: 'insert into users (name, email, password) values (:name, :email,:password)',
    params: [
      "name" => $_POST['name'],
      "email" => $_POST['email'],
      'password' => $_POST['password'],
    ]
  );

  header("location: /login?msg=Registrado com sucesso!");
  exit();
}