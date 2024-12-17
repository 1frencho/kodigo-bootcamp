<?php
/*
Ejercicio 1:

Crear un programa que contenga dos personajes: "Esqueleto" y "Zombi". Cada personaje tendrá una lógica diferente en sus ataques y velocidad. La creación de los personajes dependerá del nivel del juego:

- En el nivel fácil se creará un personaje "Esqueleto".

- En el nivel difícil se creará un personaje "Zombi".

Debes aplicar el patrón de diseño Factory para la creación de los personajes.

// Following video: https://www.youtube.com/watch?v=H5lor4wyl1Y

*/
class Character
{
  private $name;
  private $attackSpeed;
  private $damageScore;
  private $health;

  public function __construct($name, $attackSpeed, $damageScore, $health)
  {
    $this->name = $name;
    $this->attackSpeed = $attackSpeed;
    $this->damageScore = $damageScore;
    $this->health = $health;
  }

  public function getName()
  {
    return $this->name;
  }

  public function getDetails()
  {
    return 'Atk. Speed: ' . $this->attackSpeed . '/s, Damage Score: ' . $this->damageScore . ', Health: ' . $this->health . 'hp ';
  }
}

class Skeleton extends Character
{
  public function __construct($name, $attackSpeed, $damageScore, $health)
  {
    parent::__construct($name, $attackSpeed, $damageScore, $health);
  }
}

class Zombie extends Character
{
  public function __construct($name, $attackSpeed, $damageScore, $health)
  {
    parent::__construct($name, $attackSpeed, $damageScore, $health);
  }
}

class CharacterFactory
{
  public static function createCharacterByLevel($gameLevel)
  {
    if ($gameLevel === 'easy') {
      return new Skeleton("Skeleton", 1.5, 10, 100);
    } elseif ($gameLevel === 'difficult') {
      return new Zombie("Zombi", 0.8, 20, 50);
    } else {
      throw new Exception("Unsupported game level: " . $gameLevel);
    }
  }
}

class GameLevel
{
  private $level;

  public function __construct($gameLevel)
  {
    $this->level = $gameLevel;
  }

  public function getCurrentLevel()
  {
    return $this->level;
  }

  public function changeLevel($gameLevel)
  {
    $this->level = $gameLevel;
  }
}

class GameFactory
{
  public static function start($gameLevel)
  {
    return new GameLevel($gameLevel);
  }
}

// Game Simulation
try {
  // Initialize the game at a specific level
  $gameLevel = GameFactory::start('easy'); // Change to 'difficult' to test other level

  // Use the factory to create the appropriate character
  $character = CharacterFactory::createCharacterByLevel($gameLevel->getCurrentLevel());

  // Display character details
  echo "Character Created: " . $character->getName() . PHP_EOL;
  echo "Details: " . $character->getDetails() . PHP_EOL;

  // Change the game level (simulate level progression)
  $gameLevel->changeLevel('difficult');
  $character = CharacterFactory::createCharacterByLevel($gameLevel->getCurrentLevel());

  echo "Character Created for New Level: " . $character->getName() . PHP_EOL;
  echo "Details: " . $character->getDetails() . PHP_EOL;
} catch (Exception $e) {
  echo "Error: " . $e->getMessage() . PHP_EOL;
}

/**
 * Character Created: Skeleton
 * Details: Atk. Speed: 1.5/s, Damage Score: 10, Health: 100hp
 * Character Created for New Level: Zombi
 * Details: Atk. Speed: 0.8/s, Damage Score: 20, Health: 50hp
 */
