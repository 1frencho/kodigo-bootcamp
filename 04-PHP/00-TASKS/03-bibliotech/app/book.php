<?php

class Book
{
  protected $ISBN;
  protected $title;
  protected $authorId;
  protected $category;
  protected $publicationYear;
  protected $status;

  public function __construct($ISBN, $title, $authorId, $category, $publicationYear, $status)
  {
    $this->ISBN = $ISBN;
    $this->title = $title;
    $this->authorId = $authorId;
    $this->category = $category;
    $this->publicationYear = $publicationYear;
    $this->status = $status;
  }

  // Getters for private/protected properties
  public function getTitle()
  {
    return $this->title;
  }

  public function getAuthorId()
  {
    return $this->authorId;
  }

  public function getCategoryId()
  {
    return $this->category; // Assuming category ID is stored in $category
  }

  public function getStatus()
  {
    return $this->status;
  }

  public function getISBN()
  {
    return $this->ISBN;
  }

  // Static methods to search books
  public static function searchBooksByTitle($books, $title, Account $user)
  {
    return array_filter($books, function ($book) use ($title) {
      // Partial match (case-insensitive)
      return stripos($book->getTitle(), $title) !== false;
    });
  }


  public static function searchBooksByAuthor($books, $authorId, Account $user)
  {
    // Check if the user is not valid
    if ($user !== 'admin') {
      throw new Error("You are not authorized to perform this action.");
    }
    return array_filter($books, function ($book) use ($authorId) {
      return $book->getAuthorId() === $authorId;
    });
  }

  public static function searchBooksByCategory($books, $categoryId, Account $user)
  {
    return array_filter($books, function ($book) use ($categoryId) {
      return $book->getCategoryId() === $categoryId;
    });
  }
}
