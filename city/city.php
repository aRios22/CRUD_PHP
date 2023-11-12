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
    <title>City</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"></head>
<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

<form action="create.php" method="POST">
    <div class="form-row">
        <div class="form-group col-md-3">
            <label for="lname">Name:</label>
            <input type="text" class="form-control" id="Name" name="Name">
        </div>
    </div>
    
    <div class="form-row">
        <div class="form-group col-md-4">
            <label for="lCountryCode">Country Code:</label>
            <input type="text" class="form-control" id="CountryCode" name="CountryCode" maxlength="3">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-2">
            <label for="lDistrict">District:</label>
            <input type="text" class="form-control" id="District" name="District">
        </div>
        <div class="form-group col-md-3">
            <label for="lPopulation">Population:</label>
            <input type="number" class="form-control" id="Population" name="Population">
        </div>
        
    </div>
    <button name="bt_save_city" type="submit" class="btn btn-dark" value="Save City">Save City</button>
</form>

<table class="table table-hover table-dark" border="1" cellpadding="2">
    <thead>
        <tr>
            <th socpe="col">ID</th>
            <th socpe="col">Name</th>
            <th socpe="col">Country Code</th>
            <th socpe="col">District</th>
            <th socpe="col">Population</th>
            <th socpe="col">Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $query = "SELECT * FROM world.city";
            $resultado = mysqli_query($conn, $query);
            while ($fila = mysqli_fetch_array($resultado)) {
        ?>
        <tr>
            <td><?php echo $fila['ID'] ?></td>
            <td><?php echo $fila['Name'] ?></td>
            <td><?php echo $fila['CountryCode'] ?></td>
            <td><?php echo $fila['District'] ?></td>
            <td><?php echo $fila['Population'] ?></td>
            <td>
                <a href="city/update.php?ID=<?php echo $fila['ID'] ?>">Update</a>
                <a href="city/delete.php?ID=<?php echo $fila['ID'] ?>">Delete</a>
            </td>
        </tr>
            <?php } ?>
    </tbody>
</table>
</body>
</html> 