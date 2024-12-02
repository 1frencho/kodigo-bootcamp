<?php


// Task: Create a Library, it is not necessary to create a Client view for this task.

// Load library resources - Structure - Client view was not requested for this task.
require './app/author.php';
require './app/book.php';
require './app/loan.php';
require './clients/user.php';
require './settings/library.php';
require './tools/uuidV4.php';

// // Get details from data mocks
$jsonBooks = file_get_contents('./mocks/books.json');
$jsonAuthors = file_get_contents('./mocks/authors.json');
$jsonCategories = file_get_contents('./mocks/categories.json');

$booksData = json_decode($jsonBooks, true); // Decode JSON as associative array
$authorsData = json_decode($jsonAuthors, true); // Decode JSON as associative array
$categoriesData = json_decode($jsonCategories, true); // Decode JSON as associative array

// // Set available details to the Library
$books = [];
$authors = [];
$users = [];
$categories = [];

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

foreach ($categoriesData['categories'] as $category) {
  $categories[] = new Category(
    $category['id'],
    $category['name'],
    $category['description']
  );
}


// Set Up Library
$library = new Library('Bibliotech', $books, $authors, $users, $categories, []);

// TESTING

// User registration
try {
  echo Account::signUp("Marcos", "Alfaro", "ola@ola.com", "password123", 'user', $library);
  echo "<br>";
  echo Account::signUp("Lola", "Admin", "albo@ola.com", "password432", 'admin', $library);
  echo "<br>";
} catch (Error $e) {
  echo "Error: " . $e->getMessage();
}
// Current users
echo "---------- Current users ---------- ";
echo "<pre>";
print_r($library->getUsers());
echo "</pre>";

// User authentication - Admin
echo "---------- User authentication - Admin and Client ---------- <br>";
$userAdmin = null;
$userClient = null;
try {
  $userAdmin =  Account::authenticate("albo@ola.com", "password432", $library);
  echo "<br/>";
  $userClient = Account::authenticate("ola@ola.com", "password123", $library);
} catch (Error $e) {
  echo "Error: " . $e->getMessage();
}
echo "<br>";
echo "<br>";



// Search books with similar title
echo "---------- Search books with similar title ---------- <br>";

try {
  echo "<pre>";
  print_r(Book::searchBooksByTitle($library->getBooks(), "Harry Potter"));
  echo "</pre>";
} catch (Error $e) {
  echo "Error: " . $e->getMessage();
}

echo "<br>";
echo "<br>";

echo "---------- Search books by authorID ---------- <br>";

// Search books by author
try {
  echo "<pre>";
  print_r(Book::searchBooksByAuthor($library->getBooks(), 1));
  echo "</pre>";
} catch (Error $e) {
  echo "Error: " . $e->getMessage();
}

echo "<br>";
echo "<br>";

echo "---------- Search books by categoryID ---------- <br>";

// Search books by category
try {
  echo "<pre>";
  print_r(Book::searchBooksByCategory($library->getBooks(), $library->getCategories(), 1));
  echo "</pre>";
} catch (Error $e) {
  echo "Error: " . $e->getMessage();
}


echo "<br>";
echo "<br>";

echo "---------- Request a book ---------- <br>";

// Request a book
try {
  echo "<pre>";
  print_r(Loan::requestBook('9780141439600', $library, $userClient));
  // Trying to request same book again. Fails
  echo "<br>";
  print_r(Loan::requestBook('9780141439600', $library, $userClient));
  echo "</pre>";
} catch (Error $e) {
  echo "Error: " . $e->getMessage();
}

echo "<br/>";
echo "<br/>";

echo "---------- Borrowed books ---------- <br>";

echo "<pre>";
print_r($library->getBorrowedBooks());
echo "</pre>";


echo "<br/>";
echo "<br/>";

// Update book
echo "---------- Update book ---------- <br>";

$singleBook = $library->getBookByISBN('9780141439600');

$singleBook[0]->setTitle('New title');


try {
  print_r($singleBook[0]->updateBook($singleBook[0], $userAdmin, $library));
  echo "<pre>";
  print_r($library->getBooks());
  echo "</pre>";
} catch (Error $e) {
  echo "Error: " . $e->getMessage();
}

?>


<style>
  body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background-color: #f5f5f5;
    padding: 20px;
  }

  pre {
    background-color: #f5f5f5;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
  }
</style>