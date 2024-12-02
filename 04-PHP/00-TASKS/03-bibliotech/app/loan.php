<?php

class Loan
{
  protected $id;
  protected Book $book;
  protected $user;
  protected $date;
  protected $status;
  protected $dueDate;

  public function __construct($book, $user, $date, $status)
  {
    $this->id = uuidv4();
    $this->book = $book;
    $this->user = $user;
    $this->date = $date;
    $this->status = $status;
    // Due date is the date of the loan plus 7 days
    $this->dueDate = date('Y-m-d', strtotime($date) + 60 * 60 * 24 * 7);
  }

  // ---- Getters ----
  public function getId()
  {
    return $this->id;
  }

  public function getBook()
  {
    return $this->book;
  }

  public function getUser()
  {
    return $this->user;
  }

  public function getDate()
  {
    return $this->date;
  }

  public function getStatus()
  {
    return $this->status;
  }

  public function getDueDate()
  {
    return $this->dueDate;
  }

  // ---- Setters ----

  public function setBook($book)
  {
    $this->book = $book;
  }

  public function setUser($user)
  {
    $this->user = $user;
  }

  public function setDate($date)
  {
    $this->date = $date;
  }

  public function setStatus($status)
  {
    $this->status = $status;
  }

  public function setDueDate($dueDate)
  {
    $this->dueDate = $dueDate;
  }

  // Borrow a book
  public static function requestBook($bookId, Library $library, Account $user)
  {
    $book = array_filter($library->getBooks(), function ($book) use ($bookId) {
      return $book->getISBN() === $bookId;
    });

    if (empty($book)) {
      throw new Error("Book ID {$bookId} does not exist.");
    }

    if ($book[0]->getStatus() !== 'available') {
      throw new Error("Book ID {$bookId} is already reserved.");
    }

    $loan = new Loan($book[0], $user, date('Y-m-d'), 'borrowed');
    $library->addLoan($loan);

    $book[0]->setStatus('borrowed');
    return "Book ID {$bookId} is available. Borrowing it...";
    return $book[0];
  }
}
