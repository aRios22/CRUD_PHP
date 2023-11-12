<?php
include("../services/connection.php");

if(isset($_POST['bt_save_city'])){

$name = $_POST['Name'];
$countryCode = $_POST['CountryCode'];
$district = $_POST['District'];
$population = $_POST['Population'];
    

$query = "INSERT INTO `world`.`city` 
(`Name`,`CountryCode`,`District`,`Population`)
VALUES 
('$name','$countryCode','$district','$population')";

mysqli_query($conn, $query);

header("Location: index.php");
}
?>