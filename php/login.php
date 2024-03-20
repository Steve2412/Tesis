<?php

include 'conexion.php';

session_start();

if (isset($_POST['login'])) {
    if ($_POST['cedula'] != "" || $_POST['clave'] != "") {
        $username = $_POST['cedula'];
        $password = $_POST['clave'];
        $sql = "SELECT * FROM `empleados` WHERE `cedula`=? AND `clave`=?";
        $query = $pdo->prepare($sql);
        $query->execute(array($username, $password));
        $row = $query->rowCount();
        $fetch = $query->fetch();

        if ($row > 0) {
            $_SESSION['id_empleado'] = $fetch['id_empleado'];
            $_SESSION['empleado'] = $fetch['nombre'];
            $_SESSION['apellido'] = $fetch['apellido'];
            header('location:../home.php');
        } else {
            echo "<script>alert('Invalid username or password')</script>";
            echo "<script>window.location = '../login_empleado.html'</script>";
        }
    } else {
        echo "<script>alert('Please complete the required field!')</script>";
        echo "<script>window.location = '../login_empleado.html'</script>";
    }
}
