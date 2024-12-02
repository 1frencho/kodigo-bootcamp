<?php

class Library
{
  protected $name;
  protected $books = [];
  protected $users = [];
  protected $authors = [];
  protected $categories = [];
  protected $borrowedBooks = [];

  public function __construct($name, $books, $authors, $users, $categories, $borrowedBooks)
  {
    $this->name = $name;
    $this->books = $books;
    $this->authors = $authors;
    $this->users = $users;
    $this->categories = $categories;
  }

  // ---- Getters  ----
  public function getName()
  {
    return $this->name;
  }

  public function getBookByISBN($ISBN)
  {
    return array_filter($this->books, function ($book) use ($ISBN) {
      return $book->getISBN() === $ISBN;
    });
  }

  public function getBooks()
  {
    return $this->books;
  }

  public function getUsers()
  {
    return $this->users;
  }

  public function getAuthors()
  {
    return $this->authors;
  }

  public function getCategories()
  {
    return $this->categories;
  }

  public function getBorrowedBooks()
  {
    return $this->borrowedBooks;
  }

  // ---- Setters ----
  public function setBooks($books)
  {
    $this->books = $books;
  }

  public function setUsers($users)
  {
    $this->users = $users;
  }

  public function setAuthors($authors)
  {
    $this->authors = $authors;
  }

  // Add a new user
  public function addUser($user)
  {
    $this->users[] = $user;
  }

  // Add loan

  public function addLoan(Loan $loan)
  {
    $this->borrowedBooks[] = $loan;
  }

  // Add book
  public function addBook(Book $book)
  {
    $this->books[] = $book;
  }

  // Update book
  public function updateBook(Book $book)
  {
    $bookIndex = array_search($book, $this->books);
    $this->books[$bookIndex] = $book;
  }

  // Remove book
  public function removeBook(Book $book)
  {
    $bookIndex = array_search($book, $this->books);
    unset($this->books[$bookIndex]);
  }
}
