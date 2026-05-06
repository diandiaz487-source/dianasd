<?php
session_start();

// eliminar variables de sesión
session_unset();

// destruir la sesión
session_destroy();

// eliminar la cookie
setcookie("id_usuario", "", time() - 3600, "/");

// redirigir al login
header("Location: index.html");
exit();
?>