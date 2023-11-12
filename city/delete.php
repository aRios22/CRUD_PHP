<?php
include('../services/connection.php');

if(isset($_GET['ID'])) {
    $code = $_GET['ID'];

    $query = "DELETE FROM `world`.`city` WHERE `ID` = ?";
    $stmt = mysqli_prepare($conn, $query);

    mysqli_stmt_bind_param($stmt, "s", $code);

    $resultado = mysqli_stmt_execute($stmt);

    if(!$resultado){
        die("Error on City delete");
    }
    header("Location: ../index.php");
}
?>
