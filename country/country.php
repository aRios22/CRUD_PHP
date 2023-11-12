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
    <title>Country</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"></head>
<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

<form action="country/create.php" method="POST">
    <div class="form-row">
        <div class="form-group col-md-2">
            <label for="lcode">Code:</label>
            <input type="text" class="form-control" id="Code" name="Code" maxlength="3" >
        </div>
        <div class="form-group col-md-3">
            <label for="lname">Name:</label>
            <input type="text" class="form-control" id="Name" name="Name">
        </div>
    </div>
    
    <div class="form-row">
        <div class="form-group col-md-4">
            <label for="lContinent">Continent:</label>
            <select id="Continent" class="form-control" name="Continent">
                <option selected> Asia </option>
                <option> Antarctica </option>
                <option> Europe </option>
                <option> Africa </option>
                <option> North America </option>
                <option> Central America </option>
                <option> South America </option>
            </select>
        </div>
        <div class="form-group col-md-4">
            <label for="lRegion">Region:</label>
            <input type="text" class="form-control" id="Region" name="Region">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-2">
            <label for="lSurfaceArea">Surface Area:</label>
            <input type="number" class="form-control" id="SurfaceArea" name="SurfaceArea" step=".01">
        </div>
        <div class="form-group col-md-2">
            <label for="lIndepYear">Independece Year:</label>
            <input type="number" class="form-control" id="IndepYear" name="IndepYear">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-3">
            <label for="lPopulation">Population:</label>
            <input type="number" class="form-control" id="Population" name="Population">
        </div>
        <div class="form-group col-md-2">
            <label for="lLifeExpectancy">Life Expectancy:</label>
            <input type="number" class="form-control" id="LifeExpectancy" name="LifeExpectancy">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-2">
            <label for="lGNP">GNP:</label>
            <input type="number" class="form-control" id="GNP" name="GNP" step=".01">
        </div>
        <div class="form-group col-md-2">
            <label for="lGNPOld">GNPOld:</label>
            <input type="number" class="form-control" id="GNPOld" name="GNPOld" step=".01">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-4">
            <label for="lLocalName">Local Name:</label>
            <input type="text" class="form-control" id="LocalName" name="LocalName">
        </div>
        <div class="form-group col-md-4">
            <label for="lGovernmentForm">Government Form:</label>
            <input type="text" class="form-control" id="GovernmentForm" name="GovernmentForm">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-4">
            <label for="lHeadOfState">Head Of State:</label>
            <input type="text" class="form-control" id="HeadOfState" name="HeadOfState">
        </div>
        <div class="form-group col-md-2">
            <label for="lCapital">Capital:</label>
            <input type="number" class="form-control" id="Capital" name="Capital">    
        </div>
        <div class="form-group col-md-2">
            <label for="lCode2">Code 2:</label>
            <input type="text" class="form-control" id="Code2" name="Code2" maxlength="2">
        </div>
    </div>
    <button name="bt_save_country" type="submit" class="btn btn-dark" value="Save Country">Save Country</button>
</form>

<table class="table table-hover table-dark" border="1" cellpadding="2">
    <thead>
        <tr>
            <th socpe="col">Code</th>
            <th socpe="col">Name</th>
            <th socpe="col">Continent</th>
            <th socpe="col">Region</th>
            <th socpe="col">Surface Area</th>
            <th socpe="col">Independece Year</th>
            <th socpe="col">Population</th>
            <th socpe="col">Life Expectancy</th>
            <th socpe="col">GNP</th>
            <th socpe="col">GNPOld</th>
            <th socpe="col">Local Name</th>
            <th socpe="col">Government Form</th>
            <th socpe="col">Head Of State</th>
            <th socpe="col">Capital</th>
            <th socpe="col">Code2</th>
            <th socpe="col">Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $query = "SELECT * FROM world.country";
            $resultado = mysqli_query($conn, $query);
            while ($fila = mysqli_fetch_array($resultado)) {
        ?>
        <tr>
            <td><?php echo $fila['Code'] ?></td>
            <td><?php echo $fila['Name'] ?></td>
            <td><?php echo $fila['Continent'] ?></td>
            <td><?php echo $fila['Region'] ?></td>
            <td><?php echo $fila['SurfaceArea'] ?></td>
            <td><?php echo $fila['IndepYear'] ?></td>
            <td><?php echo $fila['Population'] ?></td>
            <td><?php echo $fila['LifeExpectancy'] ?></td>
            <td><?php echo $fila['GNP'] ?></td>
            <td><?php echo $fila['GNPOld'] ?></td>
            <td><?php echo $fila['LocalName'] ?></td>
            <td><?php echo $fila['GovernmentForm'] ?></td>
            <td><?php echo $fila['HeadOfState'] ?></td>
            <td><?php echo $fila['Capital'] ?></td>
            <td><?php echo $fila['Code2'] ?></td>
            <td>
                <a href="country/update.php?Code=<?php echo $fila['Code'] ?>">Update</a>
                <a href="country/delete.php?Code=<?php echo $fila['Code'] ?>">Delete</a>
            </td>
        </tr>
            <?php } ?>
    </tbody>
</table>
</body>
</html> 