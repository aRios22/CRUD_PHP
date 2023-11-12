<?php
session_start();

include("../services/connection.php");
include("login.php");

if (!isset($_POST['username'], $_POST['password'])) {

    header('Location: login.php');
}

if ($stmt = $conn->prepare('SELECT id,password FROM world.accounts WHERE username = ?')) {

    $stmt->bind_param('s', $_POST['username']);
    $stmt->execute();
}


$stmt->store_result();
if ($stmt->num_rows > 0) {
    $stmt->bind_result($id, $password);
    $stmt->fetch();

    if ($_POST['password'] === $password) {



        session_regenerate_id();
        $_SESSION['loggedin'] = TRUE;
        $_SESSION['name'] = $_POST['username'];
        $_SESSION['id'] = $id;

        setcookie ("username",$_POST["username"],time()+ 3600);
	    setcookie ("password",$_POST["password"],time()+ 3600);

        header('Location: ../index.php');
    }
} else {

    // usuario incorrecto
    header('Location: login.php');
}

$stmt->close();