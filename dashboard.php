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
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Biblioteca Virtual</title>

<link href="./wwwroot/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="./wwwroot/css/bootstrap-icons.min.css">

<style>

body{
    background-color:#f4f6f9;
}

.sidebar{
    position:fixed;
    top:70px;
    bottom:0;
    left:0;
    width:250px;
    padding:15px;
    background:#ffffff;
    border-right:1px solid #ddd;
}

.sidebar .nav-link{
    color:#333;
    border-radius:8px;
    margin-bottom:5px;
}

.sidebar .nav-link:hover,
.sidebar .nav-link.active{
    background-color:#0d6efd;
    color:white;
}

.content{
    margin-left:260px;
    padding:20px;
}

.card{
    border:none;
    border-radius:12px;
    box-shadow:0 2px 10px rgba(0,0,0,0.05);
}

.table{
    background:white;
    border-radius:10px;
    overflow:hidden;
}

</style>

</head>

<body>

<header>
<div class="px-3 py-2 text-bg-primary border-bottom">

<div class="container-fluid d-flex justify-content-between">

<span class="fw-bold fs-5">
<i class="bi bi-book"></i> Biblioteca Virtual
</span>

<span class="text-white">
Bienvenido: <?php echo $_SESSION['usuario']; ?>
</span>

<a class="text-white text-decoration-none" href="logout.php">
<i class="bi bi-box-arrow-right"></i> Salir
</a>

</div>
</div>
</header>

<div class="sidebar">

<ul class="nav flex-column">

<li>
<a class="nav-link active"
href="#"
onclick="showSection('dashboard')">
<i class="bi bi-speedometer2"></i> Dashboard
</a>
</li>

<li>
<a class="nav-link"
href="#"
onclick="showSection('autores')">
<i class="bi bi-person"></i> Autores
</a>
</li>

<li>
<a class="nav-link"
href="#"
onclick="showSection('libros')">
<i class="bi bi-book"></i> Libros
</a>
</li>

<li>
<a class="nav-link"
href="#"
onclick="showSection('prestamos')">
<i class="bi bi-journal-check"></i> Préstamos
</a>
</li>

</ul>

</div>

<div class="content">

<!-- DASHBOARD -->
<div id="dashboard">

<div class="row g-4">

<div class="col-md-4">
<div class="card p-3">
<h6>Total Libros</h6>
<h3>120</h3>
</div>
</div>

<div class="col-md-4">
<div class="card p-3">
<h6>Autores</h6>
<h3>45</h3>
</div>
</div>

<div class="col-md-4">
<div class="card p-3">
<h6>Préstamos Activos</h6>
<h3>18</h3>
</div>
</div>

</div>
</div>

<!-- AUTORES -->
<div id="autores" style="display:none;">

<h4 class="mb-3">Autores</h4>

<form action="autores.php" method="POST" class="mb-4">

<input type="text"
name="nombre"
placeholder="Nombre"
required
class="form-control mb-2">

<input type="text"
name="nacionalidad"
placeholder="Nacionalidad"
required
class="form-control mb-2">

<button type="submit"
class="btn btn-primary">

Guardar Autor

</button>

</form>

<table class="table table-hover">

<thead class="table-light">

<tr>
<th>ID</th>
<th>Nombre</th>
<th>Nacionalidad</th>
</tr>

</thead>

<tbody>

<?php

$sql = "SELECT * FROM autores";
$resultado = mysqli_query($conn,$sql);

while($fila = mysqli_fetch_assoc($resultado)){

echo "<tr>";
echo "<td>".$fila['id']."</td>";
echo "<td>".$fila['nombre']."</td>";
echo "<td>".$fila['nacionalidad']."</td>";
echo "</tr>";

}
?>

</tbody>

</table>

</div>

<!-- LIBROS -->
<div id="libros" style="display:none;">

<h4 class="mb-3">Libros</h4>

<form action="libros.php" method="POST" class="mb-4">

<input type="text"
name="titulo"
placeholder="Título"
required
class="form-control mb-2">

<input type="text"
name="autor"
placeholder="Autor"
required
class="form-control mb-2">

<input type="number"
name="anio"
placeholder="Año"
required
class="form-control mb-2">

<button type="submit"
class="btn btn-success">

Guardar Libro

</button>

</form>

<table class="table table-hover">

<thead class="table-light">

<tr>
<th>ID</th>
<th>Título</th>
<th>Autor</th>
<th>Año</th>
</tr>

</thead>

<tbody>

<?php

$sql = "SELECT * FROM libros";
$resultado = mysqli_query($conn,$sql);

while($fila = mysqli_fetch_assoc($resultado)){

echo "<tr>";
echo "<td>".$fila['id']."</td>";
echo "<td>".$fila['titulo']."</td>";
echo "<td>".$fila['autor']."</td>";
echo "<td>".$fila['anio']."</td>";
echo "</tr>";

}
?>

</tbody>

</table>

</div>

<!-- PRESTAMOS -->
<div id="prestamos" style="display:none;">

<h4 class="mb-3">Préstamos</h4>

<form action="prestamos.php" method="POST" class="mb-4">

<input type="text"
name="libro"
placeholder="Libro"
required
class="form-control mb-2">

<input type="text"
name="usuario"
placeholder="Usuario"
required
class="form-control mb-2">

<input type="date"
name="fecha"
required
class="form-control mb-2">

<button type="submit"
class="btn btn-danger">

Guardar Préstamo

</button>

</form>

<table class="table table-hover">

<thead class="table-light">

<tr>
<th>ID</th>
<th>Libro</th>
<th>Usuario</th>
<th>Fecha</th>
</tr>

</thead>

<tbody>

<?php

$sql = "SELECT * FROM prestamos";
$resultado = mysqli_query($conn,$sql);

while($fila = mysqli_fetch_assoc($resultado)){

echo "<tr>";
echo "<td>".$fila['id']."</td>";
echo "<td>".$fila['libro']."</td>";
echo "<td>".$fila['usuario']."</td>";
echo "<td>".$fila['fecha']."</td>";
echo "</tr>";

}
?>

</tbody>

</table>

</div>

</div>

<script>

function showSection(section){

document.getElementById('dashboard').style.display='none';
document.getElementById('autores').style.display='none';
document.getElementById('libros').style.display='none';
document.getElementById('prestamos').style.display='none';

document.getElementById(section).style.display='block';

}

</script>

<script src="./wwwroot/js/bootstrap.bundle.min.js"></script>

</body>
</html>