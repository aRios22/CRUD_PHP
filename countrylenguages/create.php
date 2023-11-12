<?php
include("../services/connection.php");

if(isset($_POST['bt_save_countryLenguage'])){

    $countryCode = $_POST['CountryCode'];
    $language = $_POST['Language'];
    $isOfficial = $_POST['IsOfficial'];
    $percentage = $_POST['Percentage'];

    echo "Country Code: " . $countryCode . "<br>";
    echo "Language: " . $language . "<br>";
    echo "Is Official: " . $isOfficial . "<br>";
    echo "Percentage: " . $percentage . "<br>";
    
    $query = "INSERT INTO `world`.`countrylanguage` 
        (`CountryCode`,`Language`,`IsOfficial`,`Percentage`)
        VALUES 
        ('$countryCode','$language','$isOfficial','$percentage')";

    echo "Query: " . $query . "<br>"; // Imprime la consulta SQL

    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "Registro insertado correctamente.<br>";
    } else {
        echo "Error al insertar el registro: " . mysqli_error($conn) . "<br>";
    }

    header("Location: ../index.php");
}
?>
