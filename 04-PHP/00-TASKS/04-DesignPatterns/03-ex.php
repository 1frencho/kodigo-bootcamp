<?php

/*

Crear un programa donde sea posible añadir diferentes armas a ciertos personajes de videojuegos. 
Debes utilizar al menos dos personajes para este ejercicio.

Aplica el patrón de diseño Decorator.
*/


interface Character
{
  public function getName(): string;
  public function getDetails(): string;
  public function getPower(): int;
}

class Warrior implements Character
{
  private $name;

  public function __construct(string $name = "Warrior")
  {
    $this->name = $name;
  }

  public function getName(): string
  {
    return $this->name;
  }

  public function getDetails(): string
  {
    return "{$this->name}";
  }

  public function getPower(): int
  {
    return 10;
  }
}

class Mage implements Character
{
  private $name;

  public function __construct(string $name = "Mage")
  {
    $this->name = $name;
  }

  public function getName(): string
  {
    return $this->name;
  }

  public function getDetails(): string
  {
    return "{$this->name}";
  }

  public function getPower(): int
  {
    return 8;
  }
}

abstract class WeaponDecorator implements Character
{
  protected $character;

  public function __construct(Character $character)
  {
    $this->character = $character;
  }

  public function getName(): string
  {
    return $this->character->getName();
  }

  public function getDetails(): string
  {
    return $this->character->getDetails();
  }

  public function getPower(): int
  {
    return $this->character->getPower();
  }
}

class Sword extends WeaponDecorator
{
  public function getDetails(): string
  {
    return $this->character->getDetails() . " equipped with a Sword";
  }

  public function getPower(): int
  {
    return $this->character->getPower() + 5;
  }
}

class Staff extends WeaponDecorator
{
  public function getDetails(): string
  {
    return $this->character->getDetails() . " equipped with a Staff";
  }

  public function getPower(): int
  {
    return $this->character->getPower() + 3;
  }
}

class Bow extends WeaponDecorator
{
  public function getDetails(): string
  {
    return $this->character->getDetails() . " equipped with a Bow";
  }

  public function getPower(): int
  {
    return $this->character->getPower() + 4;
  }
}

function displayCharacter(Character $character)
{
  echo $character->getDetails() . " has a power of " . $character->getPower() . "\n";
}

// Characters
$warrior = new Warrior("Brave Warrior");
$mage = new Mage("Wise Mage");

// Decorate Characters with Weapons
$warriorWithSword = new Sword($warrior);
$mageWithStaff = new Staff($mage);
$mageWithBow = new Bow($mage);

// Display Results
displayCharacter($warrior);
displayCharacter($warriorWithSword);
displayCharacter($mage);
displayCharacter($mageWithStaff);
displayCharacter($mageWithBow);


/**
 * Brave Warrior has a power of 10
 * Brave Warrior with a Sword has a power of 15
 * Wise Mage has a power of 8
 * Wise Mage with a Staff has a power of 11
 * Wise Mage with a Bow has a power of 12
 */
