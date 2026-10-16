<?php
$books = Book::getAll($_REQUEST['search'] ?? '');

view("index", compact("books"));