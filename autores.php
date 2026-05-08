<?php
session_start();

if(!isset($_SESSION['usuario'])){
    header("Location: login.php");
    exit();
}

include("db.php");

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $nombre = $_POST['nombre'];
    $nacionalidad = $_POST['nacionalidad'];

    $sql = "INSERT INTO autores(nombre, nacionalidad)
            VALUES('$nombre', '$nacionalidad')";

    mysqli_query($conn, $sql);

    header("Location: autores.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Autores</title>

<style>

body{
    font-family: Arial;
    background:#f4f4f4;
    margin:0;
}

.menu{
    width:220px;
    height:100vh;
    background:#1565ff;
    position:fixed;
    padding-top:20px;
}

.menu a{
    display:block;
    color:white;
    text-decoration:none;
    padding:15px;
    font-size:18px;
}

.menu a:hover{
    background:#0d47c7;
}

.contenido{
    margin-left:240px;
    padding:30px;
}

form{
    background:white;
    padding:20px;
    border-radius:10px;
    width:400px;
}

input{
    width:100%;
    padding:10px;
    margin-top:10px;
}

button{
    margin-top:15px;
    padding:10px 20px;
    background:#1565ff;
    color:white;
    border:none;
    cursor:pointer;
}

table{
    width:100%;
    background:white;
    margin-top:30px;
    border-collapse:collapse;
}

table th,
table td{
    border:1px solid #ddd;
    padding:12px;
}

</style>

</head>
<body>

<div class="menu">

    <a href="dashboard.php">Dashboard</a>

    <a href="autores.php">Autores</a>

    <a href="libros.php">Libros</a>

    <a href="prestamos.php">Préstamos</a>

    <a href="logout.php">Salir</a>

</div>

<div class="contenido">

<h1>Autores</h1>

<form method="POST">

    <label>Nombre</label>
    <input type="text" name="nombre" required>

    <label>Nacionalidad</label>
    <input type="text" name="nacionalidad" required>

    <button type="submit">
        Guardar Autor
    </button>

</form>

<table>

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

</div>

</body>
</html>