<?php

require_once 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $titulo = $_POST['titulo'];
    $isbn = $_POST['isbn'];
    $categoria = $_POST['categoria'];
    $anio = $_POST['anio_publicacion'];
    $stock = $_POST['stock'];
    $id_autor = $_POST['id_autor'];

    $db = conectarDB();

    $sql = "INSERT INTO libros
            (titulo, isbn, categoria, anio_publicacion, stock, id_autor)
            VALUES
            (:titulo, :isbn, :categoria, :anio, :stock, :id_autor)";

    $query = $db->prepare($sql);

    $resultado = $query->execute([
        ':titulo' => $titulo,
        ':isbn' => $isbn,
        ':categoria' => $categoria,
        ':anio' => $anio,
        ':stock' => $stock,
        ':id_autor' => $id_autor
    ]);

    if ($resultado) {
        header("Location: dashboard.php");
        exit();
    }
}
?>