<?php


$book = $database->query(
  query: "select * from books where id = :id",
  class: Book::class,
  params: ['id' => $_REQUEST['id']]
)->fetch();

$avaliacoes = $database->query(
  query: "select * from avaliacoes where book_id = :book_id",
  class: Avaliacao::class,
  params: ["book_id" => $_REQUEST['id']]
)->fetchAll();

view("book", compact('book', 'avaliacoes'));