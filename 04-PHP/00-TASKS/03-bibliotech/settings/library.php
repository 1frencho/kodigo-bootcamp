<?php

class Library
{
  protected $name;
  protected $books = [];
  protected $users = [];
  protected $authors = [];

  public function __construct($name, $books, $authors, $users)
  {
    $this->name = $name;
    $this->books = $books;
    $this->authors = $authors;
    $this->users = $users;
  }

  // ---- Getters  ----
  public function getName()
  {
    return $this->name;
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
}
