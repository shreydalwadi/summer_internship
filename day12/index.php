<?php

session_start();

require_once "Book.php";

/*
    Fix broken/incomplete session objects
*/

if(isset($_SESSION['books'])) {

    foreach($_SESSION['books'] as $book) {

        if(!($book instanceof Book)) {

            session_destroy();

            session_start();

            break;
        }
    }
}

/*
    Create books first time
*/

if(!isset($_SESSION['books'])) {

    $_SESSION['books'] = array(

        new Book("Clean Code", "Robert Martin", "9780132350884"),
        new Book("PHP Basics", "John Smith", "9780672329166"),
        new Book("Design Patterns", "Erich Gamma", "9780201633610"),
        new Book("Refactoring", "Martin Fowler", "9780201485677"),
        new Book("The Pragmatic Programmer", "Andrew Hunt", "9780201616224")

    );

}

$message = "";

/*
    Borrow / Return Logic
*/

if(isset($_POST['action']) && isset($_POST['book_index'])) {

    $index = $_POST['book_index'];

    $book = $_SESSION['books'][$index];

    // Borrow
    if($_POST['action'] == "borrow") {

        if($book->borrowBook()) {

            $message = "Book Borrowed Successfully!";

        } else {

            $message = "Book Already Borrowed!";

        }

    }

    // Return
    if($_POST['action'] == "return") {

        if($book->returnBook()) {

            $message = "Book Returned Successfully!";

        } else {

            $message = "Book Already Available!";

        }

    }

    $_SESSION['books'][$index] = $book;

}

$books = $_SESSION['books'];

?>

<!DOCTYPE html>
<html>

<head>

<title>Library Management System</title>

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:Arial;
}

body{

    background:linear-gradient(135deg,#4facfe,#00f2fe,#43e97b,#38f9d7);
    min-height:100vh;
    padding:40px;

}

.container{

    max-width:1200px;
    margin:auto;
    background:white;
    border-radius:20px;
    padding:30px;
    box-shadow:0px 10px 30px rgba(0,0,0,0.2);

}

h1{

    text-align:center;
    margin-bottom:30px;
    color:#111827;

}

.message{

    background:#d1fae5;
    padding:15px;
    border-radius:10px;
    margin-bottom:20px;
    text-align:center;
    font-weight:bold;
    color:#065f46;

}

.cards{

    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(300px,1fr));
    gap:20px;

}

.card{

    background:#f9fafb;
    border-radius:20px;
    padding:25px;
    box-shadow:0px 5px 15px rgba(0,0,0,0.1);
    transition:0.3s;

}

.card:hover{

    transform:translateY(-8px);

}

.number{

    width:50px;
    height:50px;
    background:#2563eb;
    color:white;
    border-radius:50%;
    display:flex;
    justify-content:center;
    align-items:center;
    margin-bottom:15px;
    font-size:20px;
    font-weight:bold;

}

.title{

    font-size:24px;
    margin-bottom:15px;
    color:#111827;

}

.info{

    margin-bottom:10px;
    color:#374151;

}

.status{

    padding:10px 15px;
    border-radius:30px;
    display:inline-block;
    color:white;
    margin-top:10px;
    margin-bottom:15px;
    font-weight:bold;

}

.available{

    background:#10b981;

}

.borrowed{

    background:#ef4444;

}

button{

    width:100%;
    padding:12px;
    border:none;
    border-radius:10px;
    color:white;
    font-size:16px;
    font-weight:bold;
    cursor:pointer;

}

.borrow-btn{

    background:#3b82f6;

}

.return-btn{

    background:#f59e0b;

}

.reset{

    display:inline-block;
    margin-top:30px;
    text-decoration:none;
    background:#111827;
    color:white;
    padding:14px 20px;
    border-radius:10px;

}

</style>

</head>

<body>

<div class="container">

    <h1>📚 Library Management System</h1>

    <?php if($message != "") { ?>

        <div class="message">

            <?php echo $message; ?>

        </div>

    <?php } ?>

    <div class="cards">

        <?php foreach($books as $index => $book) { ?>

            <div class="card">

                <div class="number">

                    <?php echo $index + 1; ?>

                </div>

                <div class="title">

                    <?php echo $book->getTitle(); ?>

                </div>

                <div class="info">

                    <strong>Author:</strong>
                    <?php echo $book->getAuthor(); ?>

                </div>

                <div class="info">

                    <strong>ISBN:</strong>
                    <?php echo $book->getIsbn(); ?>

                </div>

                <div class="status <?php echo $book->isAvailable() ? 'available' : 'borrowed'; ?>">

                    <?php echo $book->getStatus(); ?>

                </div>

                <form method="POST">

                    <input type="hidden" name="book_index" value="<?php echo $index; ?>">

                    <?php if($book->isAvailable()) { ?>

                        <input type="hidden" name="action" value="borrow">

                        <button class="borrow-btn">

                            Borrow Book

                        </button>

                    <?php } else { ?>

                        <input type="hidden" name="action" value="return">

                        <button class="return-btn">

                            Return Book

                        </button>

                    <?php } ?>

                </form>

            </div>

        <?php } ?>

    </div>

    <a href="reset.php" class="reset">

        Reset Library

    </a>

</div>

</body>

</html>