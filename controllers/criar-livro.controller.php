<?php

// 1 -  validar o tipo de request
if ($_SERVER['REQUEST_METHOD'] != "POST") {
  header('location: /');
  exit();
}
// 2 - validar os dados
if (!auth()) {
  abort(403);
}

$user_id = auth()->id;
$title = $_POST["title"];
$author = $_POST["author"];
$description = $_POST["description"];
$released_at = $_POST["released_at"];
$pages = $_POST["pages"];

$novoNome = md5(rand());
$extensao = pathinfo($_FILES['cover']['name'], PATHINFO_EXTENSION);
$cover = "images/$novoNome.$extensao";
move_uploaded_file($_FILES['cover']['tmp_name'], __DIR__ . "/../public/$cover");


$validation = Validation::validate([
  "title" => ["required"],
  "author" => ["required"],
  "description" => ["required"],
  "released_at" => ["required"],
  "pages" => ["required"],
], $_POST);

if ($validation->isInvalid()) {
  header("location: /my-books");
  exit();
}

// 3 - salvar no banco de dados
$database->query(
  query: "insert into books (title, author, description, released_at, pages, cover, user_id) values (:title, :author, :description, :released_at, :pages, :cover, :user_id)",
  params: compact('title', 'author', 'description', 'released_at', 'pages', 'cover', 'user_id')
);

flash()->push('msg', 'Livro cadastrado com sucesso!');
header('location: /my-books');
exit();
