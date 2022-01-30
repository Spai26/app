<?php
session_start();

if (isset($_SESSION['user']) != "notgame") {
    header("location:login.php");
} else {
    echo "Bienvenido al sistema app " . $_SESSION['user'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>App project</title>
</head>

<body>
    <div>
        <ul>
            <li><a href="index.php">Inicio</a></li>
            <li><a href="portafolio.php">Portafolio</a></li>
            <li><a href="cerrar.php">cerrar</a></li >
        </ul>
    </div>