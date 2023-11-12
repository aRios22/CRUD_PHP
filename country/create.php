<?php
include("../services/connection.php");

if(isset($_POST['bt_save_country'])){

$code = $_POST['Code'];
$name = $_POST['Name'];
$continent = $_POST['Continent'];
$region = $_POST['Region'];
$surfaceArea = $_POST['SurfaceArea'];
$independenceYear = $_POST['IndepYear'];
$population = $_POST['Population'];
$lifeExpectancy = $_POST['LifeExpectancy'];
$gnp = $_POST['GNP'];
$gnpOld = $_POST['GNPOld'];
$localName = $_POST['LocalName'];
$governmentForm = $_POST['GovernmentForm'];
$headOfState = $_POST['HeadOfState'];
$capital = $_POST['Capital'];
$code2 = $_POST['Code2'];
    

$query = "INSERT INTO `world`.`country` 
(`Code`,`Name`,`Continent`,`Region`,`SurfaceArea`,`IndepYear`,`Population`,`LifeExpectancy`,`GNP`,`GNPOld`,`LocalName`,`GovernmentForm`,`HeadOfState`,`Capital`,`Code2`)
VALUES 
('$code','$name','$continent','$region','$surfaceArea','$independenceYear','$population','$lifeExpectancy','$gnp','$gnpOld','$localName','$governmentForm','$headOfState','$capital','$code2')";

mysqli_query($conn, $query);

header("Location: ../index.php");
}
?>