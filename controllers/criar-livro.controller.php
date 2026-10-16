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

$dir = 'images';
$file = $dir . '/' . basename($_FILES['cover']['name']);
$extension = pathinfo($_FILES['cover']['tmp_name'], PATHINFO_EXTENSION);
$randName = md5(uniqid(rand(), true));
$cover = "$dir/$randName.$extension";

move_uploaded_file($_FILES['cover']['tmp_name'], $cover);


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
