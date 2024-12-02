<?php

// Personal Details
class User
{
  protected $name;
  protected $lastName;
  // Other details...
  protected $borrowedBooks = [];

  public function __construct($name, $lastName, $borrowedBooks)
  {
    $this->name = $name;
    $this->lastName = $lastName;
    $this->borrowedBooks = $borrowedBooks;
  }
  // Set another actions to edit user details, it is not required for this task.
}

// Authentication

class Account extends User
{
  protected $id;
  protected $email;
  protected $password;
  protected $role = 'user';

  public function __construct($name, $lastName, $email, $password, $role = 'user', $borrowedBooks = [])
  {
    parent::__construct($name, $lastName, $borrowedBooks);
    $this->id = uuidV4();
    $this->email = $email;
    $this->password = hash('sha256', $password);
    $this->role = $role;
  }

  public function getId()
  {
    return $this->id;
  }

  public function getEmail()
  {
    return $this->email;
  }

  public function getRole()
  {
    return $this->role;
  }


  // Register a new user
  public static function signUp($name, $lastName, $email, $password, $role, Library $library)
  {
    // Check if email already exists
    $existingUser = self::findUserByEmail($email, $library);
    if ($existingUser) {
      throw new Error("Email is already registered.");
    }

    // Create a new user
    $newUser = new self($name, $lastName, $email, $password, $role, []);
    $library->addUser($newUser); // Add the user to the library
    return "User registered successfully.";
  }


  // Authenticate user
  public static function authenticate($email, $password, Library $library)
  {
    $user = self::findUserByEmail($email, $library);
    if (!$user) {
      throw new Error("User not found.");
    }

    // Compare the provided password's hash with the stored hashed password
    if (hash('sha256', $password) === $user->password) {
      echo "Authentication successful. Welcome, {$user->name} {$user->lastName}!";
      return $user;
    } else {
      throw new Error("Invalid password. Try again.");
    }
  }

  public static function findUserByEmail($email, Library $library)
  {
    $users = $library->getUsers();

    foreach ($users as $user) {
      if ($user->email === $email) {
        return $user;
      }
    }
    return null;
  }
}
