<?php include("cabecera.php"); ?>
<?php include("database.php"); ?>

<?php
$objConn = new Conexion();

if ($_POST) {
    $username = $_POST['username'];
    $nombre = $_POST['nombre'];
    $passwd = $_POST['password'];
    $email = $_POST['email'];

    $fecha = new DateTime();
    $file  = $fecha->getTimestamp() . "_" . $_FILES['archivo']['name'];

    $img_temporal = $_FILES['archivo']['tmp_name'];
    move_uploaded_file($img_temporal, "imagenes/" . $file);

    $sql = "INSERT INTO `users` (`username`, `firstname`, `password`, `email`, `img`) 
        VALUES ('$username','$nombre','$passwd','$email','$file')";
    $objConn->ejecutar($sql);

    header("location:portafolio.php");
}

if ($_GET) {

    $objConn = new Conexion();
    $imagen = $objConn->consultar("SELECT `img` FROM `USERS` WHERE `users`.`id`=" . $_GET['borrar']);
    unlink("imagenes/" . $imagen[0]['img']);


    $sql = "DELETE  FROM `USERS` WHERE `users`.`id`=" . $_GET['borrar'];
    $objConn->ejecutar($sql);
    header("location:portafolio.php");
}
$objConn = new Conexion();
$users  = $objConn->consultar("SELECT * FROM `users`");


?>


<h1>Registro de usuarios</h1>
<form action="portafolio.php" method="post" enctype="multipart/form-data">
    <p>Ingrese un id o nombre de usuario</p>
    <input type="text" name="username" id="">
    <p>Ingrese su nombre</p>
    <input type="text" name="nombre" id="">
    <p>Ingrese su contraseña</p>
    <input type="text" name="password" id="">
    <p>Ingrese un nombre de email</p>
    <input type="text" name="email" id="">
    <p>seleccione una foto</p>
    <input type="file" name="archivo" id="">

    <input type="submit" value="crear">
</form>



<table style="border:1px; border-radius: 2px;border-color: black; border:solid;">
    <thead>Usuarios registrado</thead>
    <thead style="border:1px; border-radius: 2px;border-color: black; border:solid;">
        <th>ID</th>
        <th>Username</th>
        <th>nombre</th>
        <th>password</th>
        <th>email</th>
        <th>imagen</th>
    </thead>
    <tbody style=" border:1px; border-radius: 2px;border-color: black; border:solid;">
        <?php foreach ($users as $user) { ?>
            <tr>
                <td><?php echo " $user[id]"; ?></td>
                <td><?php echo " $user[username]" ?></td>
                <td><?php echo "$user[firstname]" ?></td>
                <td><?php echo "$user[password]" ?></td>
                <td><?php echo "$user[email]" ?></td>
                <td> <img style="width: 20%;" src="imagenes/<?php echo "$user[img]" ?>" alt=""></td>
                <td><a href="?borrar=<?php echo "$user[id]" ?>">Eliminar</a></td>
                <td><a href=>Editar</a></td>
            </tr>

        <?php }  ?>
    </tbody>

</table>
<?php include("pie.php"); ?>