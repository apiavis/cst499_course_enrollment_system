<?php
    error_reporting(E_ALL ^ E_NOTICE);
    require_once('Connect.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title> Home Page </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-sacle=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://ajax.googleleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>

<?php require 'master.php';?>

    <div class="container text-center">
        <?php 
            if(isset($_SESSION['username'])) {
                echo "<h1>Welcome to the Home Page, ".$_SESSION['username']."</h1>";
            }
            else {
                echo "<h1>Welcome to the Home Page</h1>";
                echo "<h3>Please login or register</h3>";
            }
        ?>
    </div>

<?php require_once 'footer.php';?>
</body>
</html>