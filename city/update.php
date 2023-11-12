<?php
    include("../services/connection.php");
    //CAPTURA LOS VALORES QUE TIENE EL ARREGLO GET
    if(isset($_GET['ID'])){

        $ID = $_GET['ID'];

        $query = "SELECT * FROM `world`.`city` WHERE `ID`= $ID";
        $resultado = mysqli_query($conn, $query);

        if(mysqli_num_rows($resultado) ==1){       
            $fila = mysqli_fetch_array($resultado);
            $name = $fila['Name'];
            $countryCode = $fila['CountryCode'];
            $district = $fila['District'];
            $population = $fila['Population'];
        }
        

    }
    //CAPTURA LOS VALORES QUE TIENE EL ARREGLO POST
    if(isset($_POST['bt_update'])){
        

        $ID = $_GET['ID'];
        $name = $_POST['Name'];
        $countryCode = $_POST['CountryCode'];
        $district = $_POST['District'];
        $population = $_POST['Population'];

        $query = "UPDATE `world`.`city` 
                SET `Name` = '$name', `CountryCode` = '$countryCode', `District` = '$district', `Population` =  '$population'
                WHERE `ID` = '$ID'";

        mysqli_query($conn, $query);
        
        header("Location: ../index.php");
    }
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"></head>

<form action="update.php?ID=<?php echo $_GET['ID'] ?>" method="POST">
    <div class="form-row">
        <div class="form-group col-md-3">
            <label for="lname">Name:</label>
            <input type="text" class="form-control" id="Name" name="Name"  value="<?php echo $name ?>">
        </div>
    </div>
    
    <div class="form-row">
        <div class="form-group col-md-4">
            <label for="lCountryCode">Country Code:</label>
            <input type="text" class="form-control" id="CountryCode" name="CountryCode" maxlength="3"  value="<?php echo $countryCode ?>">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-2">
            <label for="lDistrict">District:</label>
            <input type="text" class="form-control" id="District" name="District"  value="<?php echo $district ?>">
        </div>
        <div class="form-group col-md-3">
            <label for="lPopulation">Population:</label>
            <input type="number" class="form-control" id="Population" name="Population"  value="<?php echo $population ?>">
        </div>
        
    </div>
    <button name="bt_update" type="submit" class="btn btn-dark" value="Update City">Update City</button>
</form>