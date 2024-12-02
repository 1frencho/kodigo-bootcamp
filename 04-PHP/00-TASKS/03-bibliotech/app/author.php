<?php

class Author
{
  protected $id;
  protected $name;
  protected $biography;

  public function __construct($id, $name, $biography)
  {
    $this->id = $id;
    $this->name = $name;
    $this->biography = $biography;
  }

  // Getters for protected properties
  public function getId()
  {
    return $this->id;
  }

  public function getName()
  {
    return $this->name;
  }

  public function getBiography()
  {
    return $this->biography;
  }

  // Method to return a summary of the author
  public function getSummary()
  {
    return "Author: {$this->name}\nBiography: " . substr($this->biography, 0, 100) . "...";
  }
}
