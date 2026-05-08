<?php
session_start();

if(!isset($_SESSION['usuario'])){
    header("Location: login.php");
    exit();
}

include("db.php");
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Biblioteca Virtual</title>

<style>

body{
    margin:0;
    font-family:Arial;
    background:#f5e9ee;
}

.sidebar{
    width:220px;
    height:100vh;
    background:white;
    position:fixed;
    padding-top:20px;
}

.sidebar a{
    display:block;
    padding:15px;
    text-decoration:none;
    color:#333;
    font-size:20px;
}

.sidebar a:hover{
    background:#f06292;
    color:white;
}

.topbar{
    margin-left:220px;
    background:#f06292;
    color:white;
    padding:20px;
    display:flex;
    justify-content:space-between;
}

.content{
    margin-left:220px;
    padding:30px;
}

form{
    background:white;
    padding:20px;
    border-radius:15px;
}

input{
    width:30%;
    padding:12px;
    margin-right:10px;
}

button{
    background:#e53935;
    color:white;
    border:none;
    padding:12px 20px;
    border-radius:8px;
    cursor:pointer;
}

table{
    width:100%;
    background:white;
    margin-top:20px;
    border-collapse:collapse;
}

table th,
table td{
    padding:15px;
    border-bottom:1px solid #ddd;
}

</style>

</head>
<body>

<div class="sidebar">

<h2 style="padding-left:15px;">Dashboard</h2>

<a href="dashboard.php">Autores</a>
<a href="libros.php">Libros</a>
<a href="prestamos.php">Préstamos</a>

</div>

<div class="topbar">

<div>
Bienvenido: <?php echo $_SESSION['usuario']; ?>
</div>

<div>
<a href="logout.php" style="color:white;text-decoration:none;">
Salir
</a>
</div>

</div>

<div class="content">

<h1>Autores</h1>

<form method="POST" action="autores.php">

<input type="text" name="nombre" placeholder="Nombre" required>

<input type="text" name="nacionalidad" placeholder="Nacionalidad" required>

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