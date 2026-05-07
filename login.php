<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

require_once 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Obtener datos del formulario
    $email = trim($_POST['email']);
    $pwd   = trim($_POST['pwd']);

    // Conexión a BD
    $db = conectarDB();

    try {

        // Buscar usuario por email
        $sql = "SELECT * FROM usuarios WHERE email = :email LIMIT 1";

        $query = $db->prepare($sql);

        $query->execute([
            ':email' => $email
        ]);

        // Obtener usuario
        $usuario = $query->fetch();

        // Verificar si existe usuario
        if ($usuario) {

            // Verificar contraseña
            if (password_verify($pwd, $usuario['password'])) {

                // Crear sesión
                $_SESSION['id'] = $usuario['id_usuario'];
                $_SESSION['username'] = $usuario['nombre'];
                $_SESSION['email'] = $usuario['email'];
                $_SESSION['login_time'] = time();

                // Redireccionar al dashboard
                header("Location: dashboard.php");
                exit();

            } else {

                echo "
                <h3 style='color:red; text-align:center; margin-top:40px;'>
                    Contraseña incorrecta
                </h3>

                <div style='text-align:center; margin-top:20px;'>
                    <a href='index.html'>Volver al login</a>
                </div>
                ";
            }

        } else {

            echo "
            <h3 style='color:red; text-align:center; margin-top:40px;'>
                Usuario no encontrado
            </h3>

            <div style='text-align:center; margin-top:20px;'>
                <a href='index.html'>Volver al login</a>
            </div>
            ";
        }

    } catch (PDOException $e) {

        echo "
        <h3 style='color:red; text-align:center; margin-top:40px;'>
            Error de Base de Datos
        </h3>

        <pre>";
        print_r($e->getMessage());
        echo "</pre>";
    }

} else {

    // Si alguien entra directo al archivo
    header("Location: index.html");
    exit();
}
?>