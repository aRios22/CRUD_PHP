<?php
include('../services/connection.php');

if(isset($_GET['Code'])) {
    $code = $_GET['Code'];

    $query = "DELETE FROM `world`.`country` WHERE `Code` = ?";
    $stmt = mysqli_prepare($conn, $query);

    mysqli_stmt_bind_param($stmt, "s", $code);

    $resultado = mysqli_stmt_execute($stmt);

    if(!$resultado){
        die("Error on Country delete");
    }
    header("Location: ../index.php");
}
?>
