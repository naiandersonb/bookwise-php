<?php
class Book
{
    public $id;
    public $title;
    public $author;
    public $description;
    public $released_at;
    public $user_id;
    public $pages;

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