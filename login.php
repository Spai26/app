<?php
if ($_POST) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username === "notgame" && $password === "123456") {
        session_start();
        $_SESSION['user'] = $username;
        header("location:index.php");
        
    } else {
        echo "Contraseña incorrecta por favor contacta con tu administrador.";
    }
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
        <form action="login.php" method="post">
            <p>usuario</p>
            <input type="text" name="username" id="username">
            <p>contraseña</p>
            <input type="password" name="password" id="password">

            <button type="submit">Ingresar</button>
            <a href="registar.php">Registrar usuario</a>
        </form>
    </div>
</body>

</html>