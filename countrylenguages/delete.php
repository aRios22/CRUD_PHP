<?php
include('../services/connection.php');

if(isset($_GET['CountryCode'])) {
    $code = $_GET['CountryCode'];

    $query = "DELETE FROM `world`.`countrylanguage` WHERE `CountryCode` = ?";
    $stmt = mysqli_prepare($conn, $query);

    mysqli_stmt_bind_param($stmt, "s", $code);

    $resultado = mysqli_stmt_execute($stmt);

    if(!$resultado){
        die("Error on Country Lenguage delete");
    }
    header("Location: ../index.php");
}
?>
