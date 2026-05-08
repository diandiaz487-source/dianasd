<?php
session_start();

if(!isset($_SESSION['usuario'])){
    header("Location: login.php");
    exit();
}

include("db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nombre = $_POST['nombre'];
    $nacionalidad = $_POST['nacionalidad'];

    $sql = "INSERT INTO autores(nombre,nacionalidad)
            VALUES('$nombre','$nacionalidad')";

    mysqli_query($conn, $sql);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Autores</title>
</head>
<body>

<h2>Autores</h2>

<form method="POST">

<input type="text" name="nombre" placeholder="Nombre" required>

<br><br>

<input type="text" name="nacionalidad" placeholder="Nacionalidad" required>

<br><br>

<button type="submit">Guardar</button>

</form>

<hr>

<table border="1">

<tr>
<th>ID</th>
<th>Nombre</th>
<th>Nacionalidad</th>
</tr>

<?php

$sql = "SELECT * FROM autores";
$resultado = mysqli_query($conn, $sql);

while($fila = mysqli_fetch_assoc($resultado)){

    echo "<tr>";
    echo "<td>".$fila['id']."</td>";
    echo "<td>".$fila['nombre']."</td>";
    echo "<td>".$fila['nacionalidad']."</td>";
    echo "</tr>";
}
?>

</table>

<br>

<a href="dashboard.php">Volver</a>

</body>
</html>