<?php

require_once 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id_usuario = $_POST['id_usuario'];
    $id_libro = $_POST['id_libro'];
    $fecha_prestamo = $_POST['fecha_prestamo'];
    $fecha_devolucion = $_POST['fecha_devolucion'];

    $db = conectarDB();

    $sql = "INSERT INTO prestamos
            (id_usuario, id_libro, fecha_prestamo, fecha_devolucion)
            VALUES
            (:id_usuario, :id_libro, :fecha_prestamo, :fecha_devolucion)";

    $query = $db->prepare($sql);

    $resultado = $query->execute([
        ':id_usuario' => $id_usuario,
        ':id_libro' => $id_libro,
        ':fecha_prestamo' => $fecha_prestamo,
        ':fecha_devolucion' => $fecha_devolucion
    ]);

    if ($resultado) {
        header("Location: dashboard.php");
        exit();
    }
}
?>