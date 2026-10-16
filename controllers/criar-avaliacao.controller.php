<?php

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
  header('location: /');
  exit();
}

$user_id = auth()->id;
$book_id = $_POST['book_id'];
$avaliacao = $_POST['avaliacao'];
$nota = $_POST["nota"];

$validation = Validation::validate([
  'avaliacao' => ['required'],
  'nota' => ['required']
], $_POST);

if ($validation->isInvalid()) {
  header("location: /book?id=$book_id");
  exit();
}


$database->query(
  query: "insert into avaliacoes (user_id, book_id, avaliacao, nota)
    values (:user_id, :book_id, :avaliacao, :nota);
  ",
  params: compact('user_id', 'book_id', 'avaliacao', 'nota')
);

flash()->push('msg', 'Avaliação criada com sucesso');
header("location: /book?id=$book_id");

exit();