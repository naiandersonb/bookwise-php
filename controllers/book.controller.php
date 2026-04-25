<?php

// model
require 'data.php';

$id = $_REQUEST['id'];

$filter_book = array_filter($books, fn($l) => $l['id'] == $id);

$book = array_pop($filter_book);

view("book", compact('book'));