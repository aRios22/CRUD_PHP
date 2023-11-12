<?php
//Antes que todo hay que incluir la conexión para que esté disponible en la página
include('../services/connection.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Querys</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"></head>
<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

<table class="table table-hover table-dark" border="1" cellpadding="2">
    <thead>
        <tr>
            <th socpe="col">Continent</th>
            <th socpe="col">Countru</th>
            <th socpe="col">Surface Area</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $query = "SELECT c.Continent AS Continente, c.Name AS NombrePais, c.SurfaceArea AS Superficie 
            FROM world.country c
            WHERE c.SurfaceArea = (
                SELECT MIN(SurfaceArea)
                FROM world.country
                WHERE Continent = c.Continent
            )";
            $resultado = mysqli_query($conn, $query);
            while ($fila = mysqli_fetch_array($resultado)) {
        ?>
        <tr>
            <td><?php echo $fila['Continente'] ?></td>
            <td><?php echo $fila['NombrePais'] ?></td>
            <td><?php echo $fila['Superficie'] ?></td>
        </tr>
            <?php } ?>
    </tbody>
</table>

<table class="table table-hover table-dark" border="1" cellpadding="2">
    <thead>
        <tr>
            <th socpe="col">Country</th>
            <th socpe="col">Population</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $query = "WITH PoblacionPromContinente AS (
                    SELECT c.Continent, AVG(c.Population) AS PoblacionProm
                    FROM world.country c
                    GROUP BY c.Continent
                    )
                    
                    SELECT c.NombrePais , c.Population
                    FROM (
                        SELECT country.Name AS NombrePais, country.Population, country.Continent,
                        ROW_NUMBER() OVER (PARTITION BY country.Continent ORDER BY country.Population DESC) AS rn
                        FROM world.country
                    ) c
                    JOIN PoblacionPromContinente cap ON c.Continent = cap.Continent
                    WHERE c.rn = 1";
            $resultado = mysqli_query($conn, $query);
            while ($fila = mysqli_fetch_array($resultado)) {
        ?>
        <tr>
            <td><?php echo $fila['NombrePais'] ?></td>
            <td><?php echo $fila['Population'] ?></td>
        </tr>
            <?php } ?>
    </tbody>
</table>

<table class="table table-hover table-dark" border="1" cellpadding="2">
    <thead>
        <tr>
            <th socpe="col">City</th>
            <th socpe="col">Country</th>
            <th socpe="col">Population</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $query = "SELECT c2.Name AS NombreCiudad, c1.Name AS NombrePais, c2.Population AS Poblacion
                    FROM world.country c1
                    JOIN city c2 ON c1.Code = c2.CountryCode
                    WHERE c2.Population = (
                        SELECT MAX(Population)
                        FROM world.city
                        WHERE CountryCode = c1.Code
                    )";
            $resultado = mysqli_query($conn, $query);
            if (!$resultado) {
                die('Error en la consulta: ' . mysqli_error($conn));
            }
            while ($fila = mysqli_fetch_array($resultado)) {
        ?>
        <tr>
            <td><?php echo $fila['NombreCiudad'] ?></td>
            <td><?php echo $fila['NombrePais'] ?></td>
            <td><?php echo $fila['Poblacion'] ?></td>
        </tr>
            <?php } ?>
    </tbody>
</table>
</body>
</html> 
