<?php
session_start();

if(!isset($_SESSION['usuario'])){
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Dashboard</title>
</head>
<body>

<h1>Biblioteca Virtual</h1>

<h3>Bienvenido: <?php echo $_SESSION['usuario']; ?></h3>

<hr>

<a href="autores.php">Autores</a>

<br><br>

<a href="libros.php">Libros</a>

<br><br>

<a href="prestamos.php">Préstamos</a>

<br><br>

<a href="logout.php">Salir</a>

</body>
</html>