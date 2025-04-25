<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Bookstore - Inheritance in PHP</title>
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background: linear-gradient(to right, #74ebd5, #9face6);
      padding: 40px;
      color: #333;
    }
    .container {
      max-width: 700px;
      margin: auto;
      background: #fff;
      padding: 30px;
      border-radius: 15px;
      box-shadow: 0 0 15px rgba(0,0,0,0.1);
    }
    h2 {
      text-align: center;
      color: #4a47a3;
    }
    .card {
      background: #f8f9fa;
      border: 1px solid #ddd;
      margin-top: 20px;
      padding: 20px;
      border-radius: 10px;
    }
    .card p {
      margin: 8px 0;
    }
  </style>
</head>
<body>

<div class="container">
  <h2> Bookstore - PHP Inheritance Demo</h2>

  <?php
    class Book {
        public $title;
        public $author;
        public $price;

        public function __construct($title, $author, $price) {
            $this->title = $title;
            $this->author = $author;
            $this->price = $price;
        }

        public function displayInfo() {
            echo "<div class='card'>";
            echo "<p><strong>Title:</strong> $this->title</p>";
            echo "<p><strong>Author:</strong> $this->author</p>";
            echo "<p><strong>Price:</strong> ₹$this->price</p>";
            echo "</div>";
        }
    }

    class EBook extends Book {
        public $fileSize;

        public function __construct($title, $author, $price, $fileSize) {
            parent::__construct($title, $author, $price);
            $this->fileSize = $fileSize;
        }

        public function displayInfo() {
            parent::displayInfo();
            echo "<div class='card'>";
            echo "<p><strong>Type:</strong> E-Book</p>";
            echo "<p><strong>File Size:</strong> $this->fileSize MB</p>";
            echo "</div>";
        }
    }

    // Create instances
    $book1 = new Book("The Alchemist", "Paulo Coelho", 299);
    $ebook1 = new EBook("Atomic Habits", "James Clear", 199, 5);

    // Display books
    $book1->displayInfo();
    $ebook1->displayInfo();
  ?>
</div>

</body>
</html>
