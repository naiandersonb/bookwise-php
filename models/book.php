<?php
class Book
{
    public $id;
    public $title;
    public $author;
    public $description;

    public static function make($item)
    {
        $book = new self();
        $book->id = $item["id"];
        $book->title = $item["title"];
        $book->author = $item["author"];
        $book->description = $item["description"];

        return $book;
    }
}