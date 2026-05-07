<?php

session_start();

require_once 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nombre = $_POST['nombre'];
    $email  = $_POST['email'];
    $pwd    = $_POST['pwd'];

    $db = conectarDB();

    try {

        $passwordHash = password_hash($pwd, PASSWORD_DEFAULT);

        $sql = "INSERT INTO usuarios (nombre, email, password)
                VALUES (:nombre, :email, :password)";

        $query = $db->prepare($sql);

        $resultado = $query->execute([
            ':nombre'   => $nombre,
            ':email'    => $email,
            ':password' => $passwordHash
        ]);

        if ($resultado) {

            $_SESSION["username"] = $nombre;
            $_SESSION["login_time"] = time();

            header("Location: dashboard.php");
            exit;
        }

    } catch (PDOException $e) {

        echo "Error: " . $e->getMessage();
    }
}
?>