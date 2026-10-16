<?php


$book = Book::get($_REQUEST['id']);

// dd($book);

$avaliacoes = $database->query(
  query: "select * from avaliacoes where book_id = :book_id",
  class: Avaliacao::class,
  params: ["book_id" => $_REQUEST['id']]
)->fetchAll();

view("book", compact('book', 'avaliacoes'));