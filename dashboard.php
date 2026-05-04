<?php
session_start();

// ¿Existe la sesión? Si no, fuera de aquí.
if (!isset($_SESSION['id'])) {
    header("Location: index.html");
    exit();
}
?>
<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Biblioteca Virtual</title>

  <link href="./wwwroot/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="./wwwroot/css/bootstrap-icons.min.css">
  <script src="./wwwroot/js/jquery-4.0.0.min.js"></script>

  <style>
    body {
      background-color: #f4f6f9;
    }

    .sidebar {
      position: fixed;
      top: 70px;
      bottom: 0;
      left: 0;
      width: 250px;
      padding: 15px;
      background: #ffffff;
      border-right: 1px solid #ddd;
    }

    .sidebar .nav-link {
      color: #333;
      border-radius: 8px;
      margin-bottom: 5px;
    }

    .sidebar .nav-link:hover,
    .sidebar .nav-link.active {
      background-color: #0d6efd;
      color: white;
    }

    .content {
      margin-left: 260px;
      padding: 20px;
    }

    .card {
      border: none;
      border-radius: 12px;
      box-shadow: 0 2px 10px rgba(0,0,0,0.05);
    }

    .table {
      background: white;
      border-radius: 10px;
      overflow: hidden;
    }
  </style>
</head>

<body>

<!-- HEADER -->
<header>
  <div class="px-3 py-2 text-bg-primary border-bottom">
    <div class="container-fluid d-flex justify-content-between">
      <span class="fw-bold fs-5">
        <i class="bi bi-book"></i> Biblioteca Virtual
      </span>

      <a class="text-white text-decoration-none" href="logout.php">
        <i class="bi bi-box-arrow-right"></i> Salir
      </a>
    </div>
  </div>
</header>

<!-- SIDEBAR -->
<div class="sidebar">
  <ul class="nav flex-column">

    <li>
      <a class="nav-link active" href="#" onclick="showSection('dashboard')">
        <i class="bi bi-speedometer2"></i> Dashboard
      </a>
    </li>

    <li>
      <a class="nav-link" href="#" onclick="showSection('autores')">
        <i class="bi bi-person"></i> Autores
      </a>
    </li>

    <li>
      <a class="nav-link" href="#" onclick="showSection('libros')">
        <i class="bi bi-book"></i> Libros
      </a>
    </li>

    <li>
      <a class="nav-link" href="#" onclick="showSection('prestamos')">
        <i class="bi bi-journal-check"></i> Préstamos
      </a>
    </li>

  </ul>
</div>

<!-- CONTENIDO -->
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

    <table class="table table-hover">
      <thead class="table-light">
        <tr>
          <th>ID</th>
          <th>Nombre</th>
          <th>Nacionalidad</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>1</td>
          <td>Gabriel García Márquez</td>
          <td>Colombia</td>
        </tr>
      </tbody>
    </table>
  </div>

  <!-- LIBROS -->
  <div id="libros" style="display:none;">
    <h4 class="mb-3">Libros</h4>

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
        <tr>
          <td>1</td>
          <td>Cien años de soledad</td>
          <td>García Márquez</td>
          <td>1967</td>
        </tr>
      </tbody>
    </table>
  </div>

  <!-- PRESTAMOS -->
  <div id="prestamos" style="display:none;">
    <h4 class="mb-3">Préstamos</h4>

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
        <tr>
          <td>1</td>
          <td>Cien años de soledad</td>
          <td>Diana</td>
          <td>2026-04-30</td>
        </tr>
      </tbody>
    </table>
  </div>

</div>

<!-- SCRIPT -->
<script>
  function showSection(section) {
    document.getElementById('dashboard').style.display = 'none';
    document.getElementById('autores').style.display = 'none';
    document.getElementById('libros').style.display = 'none';
    document.getElementById('prestamos').style.display = 'none';

    document.getElementById(section).style.display = 'block';
  }
</script>

<script src="./wwwroot/js/bootstrap.bundle.min.js"></script>

</body>
</html>
     


