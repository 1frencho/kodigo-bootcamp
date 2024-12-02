<?php



class Category
{
  protected $id;
  protected $name;
  protected $description;

  public function __construct($id, $name, $description)
  {
    $this->id = $id;
    $this->name = $name;
    $this->description = $description;
  }

  // Getters for category properties
  public function getId()
  {
    return $this->id;
  }

  public function getName()
  {
    return $this->name;
  }

  public function getDescription()
  {
    return $this->description;
  }
}


class Book
{
  protected $ISBN;
  protected $title;
  protected $authorId;
  protected $categoryId;
  protected $publicationYear;
  protected $status;

  public function __construct($ISBN, $title, $authorId, $categoryId, $publicationYear, $status)
  {
    $this->ISBN = $ISBN;
    $this->title = $title;
    $this->authorId = $authorId;
    $this->categoryId = $categoryId;
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
    return $this->categoryId;
  }

  public function getStatus()
  {
    return $this->status;
  }

  public function getISBN()
  {
    return $this->ISBN;
  }

  public function getPublicationYear()
  {
    return $this->publicationYear;
  }


  // Setters

  public function setTitle($title)
  {
    $this->title = $title;
  }

  public function setAuthorId($authorId)
  {
    $this->authorId = $authorId;
  }

  public function setCategoryId($categoryId)
  {
    $this->categoryId = $categoryId;
  }

  public function setStatus($status)
  {
    $this->status = $status;
  }

  public function setISBN($ISBN)
  {
    $this->ISBN = $ISBN;
  }

  // Update book 
  public function updateBook(Book $book, Account $user, Library $library)
  {
    if ($user->getRole() !== 'admin') {
      throw new Error("You are not authorized to update this book.");
    }

    $this->title = $book->getTitle();
    $this->authorId = $book->getAuthorId();
    $this->categoryId = $book->getCategoryId();
    $this->publicationYear = $book->getPublicationYear();
    $this->status = $book->getStatus();

    $library->updateBook($this);

    return "Book updated successfully.";
  }


  // Static methods to search books
  public static function searchBooksByTitle($books, $title)
  {
    return array_filter($books, function ($book) use ($title) {
      // Partial match (case-insensitive)
      return stripos($book->getTitle(), $title) !== false;
    });
  }


  public static function searchBooksByAuthor($books, $authorId)
  {
    return array_filter($books, function ($book) use ($authorId) {
      return $book->getAuthorId() === $authorId;
    });
  }

  public static function searchBooksByCategory($books, $categories, $categoryId)
  {
    $categoryExists = array_filter($categories, function ($category) use ($categoryId) {
      return $category->getId() === $categoryId;
    });

    if (empty($categoryExists)) {
      throw new Error("Category ID {$categoryId} does not exist.");
    }

    return array_filter($books, function ($book) use ($categoryId) {
      return $book->getCategoryId() === $categoryId;
    });
  }
}
