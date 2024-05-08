<?php
require "php/conexion.php";


$Prueba = 'PAQ202494132616';
$pdo = $conectar->prepare("SELECT package_qr_code FROM paquetes WHERE package_id = '$Prueba'");
$pdo->execute();
$resultado = $pdo->fetch(PDO::FETCH_ASSOC);
$codigo_qr = $resultado['package_qr_code'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <img src="data:image/png;base64,<?php echo base64_encode($codigo_qr); ?>" alt="Código QR del paquete">

</body>

</html>