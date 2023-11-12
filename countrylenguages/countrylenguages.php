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
    <title>Country Lenguages</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"></head>
<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

<form action="countrylenguages/create.php" method="POST">
    
    <div class="form-row">
        <div class="form-group col-md-4">
            <label for="lCountryCode">Country Code:</label>
            <input type="text" class="form-control" id="CountryCode" name="CountryCode" maxlength="3">
        </div>
        <div class="form-group col-md-4">
            <label for="lLanguage">Language:</label>
            <input type="text" class="form-control" id="Language" name="Language">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-4">
            <label for="lIsOfficial">Is Official:</label>
            <select id="IsOfficial" class="form-control" name="IsOfficial">
                <option selected> T </option>
                <option> F </option>
            </select>
        </div>
        <div class="form-group col-md-3">
            <label for="lPercentage">Percentage:</label>
            <input type="number" class="form-control" id="Percentage" name="Percentage" step=".01">
        </div>
    </div>
    <button name="bt_save_countryLenguage" type="submit" class="btn btn-dark" value="Save Country Lenguage">Save Country Lenguage</button>
</form>

<table class="table table-hover table-dark" border="1" cellpadding="2">
    <thead>
        <tr>
            <th socpe="col">Country Code</th>
            <th socpe="col">Language</th>
            <th socpe="col">Is Official</th>
            <th socpe="col">Percentage</th>
            <th socpe="col">Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $query = "SELECT * FROM world.countrylanguage";
            $resultado = mysqli_query($conn, $query);
            while ($fila = mysqli_fetch_array($resultado)) {
        ?>
        <tr>
            <td><?php echo $fila['CountryCode'] ?></td>
            <td><?php echo $fila['Language'] ?></td>
            <td><?php echo $fila['IsOfficial'] ?></td>
            <td><?php echo $fila['Percentage'] ?></td>
            <td>
                <a href="countrylenguages/update.php?CountryCode=<?php echo $fila['CountryCode'] ?>">Update</a>
                <a href="countrylenguages/delete.php?CountryCode=<?php echo $fila['CountryCode'] ?>">Delete</a>
            </td>
        </tr>
            <?php } ?>
    </tbody>
</table>
</body>
</html> 