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
}
