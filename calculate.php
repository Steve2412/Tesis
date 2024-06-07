<?php
include('php/conexion.php');
(int)$const = 1728;
$get_height = $_POST['height'];

$get_width = (int)$_POST['width'];


$get_length = (int)$_POST['length'];


$get_origin = $_POST['origin'];

$get_destination = $_POST['destination'];

(int)$volume = $get_height * $get_width * $get_length;

(int)$total_pc = $volume / $const;

$check_distance = "SELECT precio FROM calc_sucursales WHERE (remitente_1 LIKE ? AND destinatario_1 LIKE ?) 
                                                    OR (remitente_2 LIKE ? AND destinatario_2 LIKE ?)";

$stmt = $conectar->prepare($check_distance);
$stmt->bindValue(1, '%' . $get_origin . '%', PDO::PARAM_STR);
$stmt->bindValue(2, '%' . $get_destination . '%', PDO::PARAM_STR);
$stmt->bindValue(3, '%' . $get_destination . '%', PDO::PARAM_STR);
$stmt->bindValue(4, '%' . $get_origin . '%', PDO::PARAM_STR);
$stmt->execute();

if ($stmt->rowCount() > 0) {
    $fetch_data = $stmt->fetch(PDO::FETCH_ASSOC);
    $precio = $fetch_data['precio'];
    $total = $precio * $total_pc;
    $total_round = round($total, 2);
    echo $total_round;
} else {
    echo "¡Lo siento, no puedo ayudarte con este inconveniente! Favor comunícate con el administrador en el siguiente enlace:
    </br><a href='https://www.google.com.ve'>Contacto</a>";
}
