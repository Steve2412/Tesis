<?php
require "php/conexion.php";
session_start();
if (!isset($_SESSION['usuario'])) {
    header("location: index.html");
}
$cedula = $_SESSION['usuario'];

$query = "SELECT * FROM empleados WHERE cedula = '$cedula'";
$result = $conectar->query($query)->fetchAll(PDO::FETCH_BOTH);
foreach ($result as $row) {
    $Nombre = $row['nombre'];
    $direccion = $row['direccion'];
    $correo = $row['correo'];
    $telefono = $row['telefono'];
    $cargo = $row['cargo'];
    $sucursal = $row['sucursal'];
}
