<?php
//Antes que todo hay que incluir la conexión para que esté disponible en la página
include('services/connection.php');

session_start();

if (!isset($_SESSION['loggedin'])) {
    header('Location: index.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="scripts.js"></script>
    <title>Menú Principal</title>
</head>
<body>
    <div class="tab">
        <button class="tablinks" onclick="openTab(event, 'tab1')">Country</button>
        <button class="tablinks" onclick="openTab(event, 'tab2')">City</button>
        <button class="tablinks" onclick="openTab(event, 'tab3')">Country Lenguages</button>
        <button class="tablinks" onclick="openTab(event, 'tab4')">Querys</button>
        <a href="login/logout.php">Logout</a>
    </div>

    <div id="tab1" class="tabcontent">
    </div>

    <div id="tab2" class="tabcontent">
    </div>

    <div id="tab3" class="tabcontent">
    </div>

    <div id="tab4" class="tabcontent">
    </div>

</body>
</html>




