<?php

// Task: Create a Library, it is not necessary to create a Client view for this task.

// Load library resources - Structure - Client view was not requested for this task.
require './admin/admin.php';
require './app/author.php';
require './app/book.php';
require './clients/user.php';
require './settings/library.php';
require './tools/uuidV4.php';

// // Get details from data mocks
$jsonBooks = file_get_contents('./mocks/books.json');
$jsonAuthors = file_get_contents('./mocks/authors.json');
$jsonUsers = file_get_contents('./mocks/users.json');

$booksData = json_decode($jsonBooks, true); // Decode JSON as associative array
$authorsData = json_decode($jsonAuthors, true); // Decode JSON as associative array

// // Set available details to the Library
$books = [];
$authors = [];
$users = [];

foreach ($booksData['books'] as $book) {
  $books[] = new Book(
    $book['ISBN'],
    $book['title'],
    $book['authorId'],
    $book['categoryId'],
    $book['publicationYear'],
    $book['status']
  );
}

foreach ($authorsData['authors'] as $author) {
  $authors[] = new Author(
    $author['id'],
    $author['name'],
    $author['biography']
  );
}


// Set Up Library
$library = new Library('Bibliotech', $books, $authors, $users);

// TESTING

// User registration
try {
  echo Account::signUp("Marcos", "Alfaro", "ola@ola.com", "password123", 'user', $library);
  echo Account::signUp("Lola", "Admin", "albo@ola.com", "password432", 'admin', $library);
} catch (Error $e) {
  echo "Error: " . $e->getMessage();
}

echo "<pre>";
print_r($library->getUsers());
echo "</pre>";

// User authentication
try {
  echo Account::authenticate("albo@ola.com", "password432", $library);
} catch (Error $e) {
  echo "Error: " . $e->getMessage();
}
