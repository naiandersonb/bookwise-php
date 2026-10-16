<?php

if (!auth()) {
  header('location: /');
  exit();
}

$my_books = Book::getByUserId(auth()->id);

view("my-books", compact('my_books'));