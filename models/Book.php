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
  public $nota_avaliacao;
  public $total_avaliacoes;
  public $cover;

  public static function make($item)
  {
    $book = new self();
    $book->id = $item["id"];
    $book->title = $item["title"];
    $book->author = $item["author"];
    $book->description = $item["description"];

    return $book;
  }

  public function query($where, $params)
  {
    $db = new Database(config('database'));


    return $db->query(
      "
    SELECT
    b.id, b.title, b.author, b.description, b.released_at, b.cover, b.pages,
    IFNULL(round(sum(a.nota) / 5.0), 0) AS nota_avaliacao, 
    IFNULL(count(a.id), 0) AS total_avaliacoes
  FROM
    books b 
    LEFT JOIN avaliacoes a ON a.book_id = b.id
  WHERE $where
  GROUP BY
    b.id,
    b.title,
    b.author,
    b.description,
    b.released_at,
    b.pages;
   ",
      self::class,
      $params
    );
  }

  public static function getAll($filter = '')
  {
    return (new self)->query('title like :search or author like :search or  description like :search', ['search' => "%$filter%"])->fetchAll();
  }

  public static function get($id)
  {

    return (new self)->query('b.id = :id', ['id' => $id])->fetch();
  }

  public static function getByUserId($user_id)
  {
    return (new self)->query('b.user_id = :user_id', ['user_id' => $user_id])->fetchAll();
  }
}