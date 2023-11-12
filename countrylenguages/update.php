<?php
    include("../services/connection.php");
    //CAPTURA LOS VALORES QUE TIENE EL ARREGLO GET
    if(isset($_GET['CountryCode'])){

        $countryCode = $_GET['CountryCode'];

        $query = "SELECT * FROM `world`.`countrylanguage` WHERE `CountryCode`= $countryCode";
        $resultado = mysqli_query($conn, $query);

        if(mysqli_num_rows($resultado) ==1){       
            $fila = mysqli_fetch_array($resultado);
            $countryCode = $fila['CountryCode'];
            $language = $fila['Language'];
            $isOfficial = $fila['IsOfficial'];
            $percentage = $fila['Percentage'];
        }
        

    }
    //CAPTURA LOS VALORES QUE TIENE EL ARREGLO POST
    if(isset($_POST['bt_update'])){
        $countryCode = $_GET['CountryCode'];
        $language = $_POST['Language'];
        $isOfficial = $_POST['IsOfficial'];
        $percentage = $_POST['Percentage'];

        $query = "UPDATE `world`.`countrylanguage` SET 
                    `Language` = ?,
                    `IsOfficial` = ?,
                    `Percentage` = ?
                    WHERE `CountryCode` = ?";
        mysqli_query($conn, $query);

        header("Location: ../index.php");
    }
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"></head>

<form action="update.php?CountryCode=<?php echo $_GET['CountryCode'] ?>" method="POST">
    <div class="form-row">
        <div class="form-group col-md-3">
            <label for="lCountryCode">Country Code::</label>
            <input type="text" class="form-control" id="CountryCode" name="CountryCode"  value="<?php echo $countryCode ?>" maxlength="3">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-4">
            <label for="lIsOfficial">Is Official:</label>
            <select id="IsOfficial" class="form-control" name="IsOfficial" value="<?php echo $isOfficial ?>">
                <option selected> T </option>
                <option> F </option>
            </select>
        </div>
        <div class="form-group col-md-3">
            <label for="lPercentage">Percentage:</label>
            <input type="number" class="form-control" id="Percentage" name="Percentage"  value="<?php echo $percentage ?>" step=".01">
        </div>
        
    </div>
    <button name="bt_update" type="submit" class="btn btn-dark" value="Update Country Lenguage">Update Country Lenguage</button>
</form>