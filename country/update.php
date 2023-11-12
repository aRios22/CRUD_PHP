<?php
    include("../services/connection.php");
    //CAPTURA LOS VALORES QUE TIENE EL ARREGLO GET
    //VALOR CODE
    if(isset($_GET['Code'])){

        $code = $_GET['Code'];

        $query = "SELECT * FROM world.country WHERE Code= ?";
        $stmt  = mysqli_prepare($conn, $query);

        if($stmt) {
            mysqli_stmt_bind_param($stmt, 's', $code);
            mysqli_stmt_execute($stmt);
            $resultado = mysqli_stmt_get_result($stmt);

            if(mysqli_num_rows($resultado) ==1){

                $fila = mysqli_fetch_array($resultado);
                $code = $fila['Code'];
                $name = $fila['Name'];
                $continent = $fila['Continent'];
                $region = $fila['Region'];
                $surfaceArea = $fila['SurfaceArea'];
                $independenceYear = $fila['IndepYear'];
                $population = $fila['Population'];
                $lifeExpectancy = $fila['LifeExpectancy'];
                $gnp = $fila['GNP'];
                $gnpOld = $fila['GNPOld'];
                $localName = $fila['LocalName'];
                $governmentForm = $fila['GovernmentForm'];
                $headOfState = $fila['HeadOfState'];
                $capital = $fila['Capital'];
                $code2 = $fila['Code2'];
            }

        }
    }
    //CAPTURA LOS VALORES QUE TIENE EL ARREGLO POST
    if(isset($_POST['bt_update'])){

        $code = $_GET['Code'];
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

        $query = "UPDATE `world`.`country` SET 
                    `Name` = ?, 
                    `Continent` = ?,
                    `Region` = ?,
                    `SurfaceArea` = ?,
                    `IndepYear` = ?,
                    `Population` = ?,
                    `LifeExpectancy` = ?,
                    `GNP` = ?,
                    `GNPOld` = ?,
                    `LocalName` = ?,
                    `GovernmentForm` = ?,
                    `HeadOfState` = ?,
                    `Capital` = ?,
                    `Code2` = ?
                    WHERE `Code` = ?";
        mysqli_query($conn, $query);

        header("Location: ../index.php");
    }
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"></head>

<form action="update.php?code=<?php echo $_GET['Code'] ?>" method="POST">
    <div class="form-row">
        <div class="form-group col-md-2">
            <label for="lcode">Code:</label>
            <input type="text" class="form-control" id="Code" name="Code" maxlength="3"  value="<?php echo $code ?>">
        </div>
        <div class="form-group col-md-3">
            <label for="lname">Name:</label>
            <input type="text" class="form-control" id="Name" name="Name" value="<?php echo $name ?>">
        </div>
    </div>
    
    <div class="form-row">
        <div class="form-group col-md-4">
            <label for="lContinent">Continent:</label>
            <select id="Continent" class="form-control" name="Continent" value="<?php echo $continent ?>">
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
            <input type="text" class="form-control" id="Region" name="Region" value="<?php echo $region ?>">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-2">
            <label for="lSurfaceArea">Surface Area:</label>
            <input type="number" class="form-control" id="SurfaceArea" name="SurfaceArea" step=".01" value="<?php echo $surfaceArea ?>">
        </div>
        <div class="form-group col-md-2">
            <label for="lIndepYear">Independece Year:</label>
            <input type="number" class="form-control" id="IndepYear" name="IndepYear" value="<?php echo $independenceYear ?>">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-3">
            <label for="lPopulation">Population:</label>
            <input type="number" class="form-control" id="Population" name="Population" value="<?php echo $population ?>">
        </div>
        <div class="form-group col-md-2">
            <label for="lLifeExpectancy">Life Expectancy:</label>
            <input type="number" class="form-control" id="LifeExpectancy" name="LifeExpectancy" value="<?php echo $lifeExpectancy ?>">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-2">
            <label for="lGNP">GNP:</label>
            <input type="number" class="form-control" id="GNP" name="GNP" step=".01" value="<?php echo $gnp ?>">
        </div>
        <div class="form-group col-md-2">
            <label for="lGNPOld">GNPOld:</label>
            <input type="number" class="form-control" id="GNPOld" name="GNPOld" step=".01" value="<?php echo $gnpOld ?>">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-4">
            <label for="lLocalName">Local Name:</label>
            <input type="text" class="form-control" id="LocalName" name="LocalName" value="<?php echo $localName ?>">
        </div>
        <div class="form-group col-md-4">
            <label for="lGovernmentForm">Government Form:</label>
            <input type="text" class="form-control" id="GovernmentForm" name="GovernmentForm" value="<?php echo $governmentForm ?>">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-4">
            <label for="lHeadOfState">Head Of State:</label>
            <input type="text" class="form-control" id="HeadOfState" name="HeadOfState" value="<?php echo $headOfState ?>">
        </div>
        <div class="form-group col-md-2">
            <label for="lCapital">Capital:</label>
            <input type="number" class="form-control" id="Capital" name="Capital" value="<?php echo $capital ?>">    
        </div>
        <div class="form-group col-md-2">
            <label for="lCode2">Code 2:</label>
            <input type="text" class="form-control" id="Code2" name="Code2" maxlength="2" value="<?php echo $code2 ?>">
        </div>
    </div>
    <button name="bt_update" type="submit" class="btn btn-dark" value="Update Country">Update Country</button>
</form>