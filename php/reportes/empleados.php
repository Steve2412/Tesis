<?php
// Carga la biblioteca DOMPDF
require_once '../../dompdf/vendor/autoload.php';

// Crea una nueva instancia de DOMPDF
use Dompdf\Dompdf;
$dompdf = new Dompdf();
include '../conexion.php';

$sql = "SELECT * FROM empleados";

$stmt = $pdo->prepare($sql);
$stmt->execute();

// Carga el HTML
$html = '<table border="1">';
$html .= '<tr><th>ID</th><th>Nombre</th><th>Apellido</th><th>Cedula</th><th>Ciudad</th><th>Direccion</th><th>Telefono</th><th>Correo</th><th>Cargo</th><th>Sexo</th></tr>';

while ($row = $stmt->fetch()) {
    $html .= '<tr>';
    $html .= "<td>" . htmlspecialchars($row['id_empleado']) . "</td>";
    $html .= "<td>" . htmlspecialchars($row['nombre']) . "</td>";
    $html .= "<td>" . htmlspecialchars($row['apellido']) . "</td>";
    $html .= "<td>" . htmlspecialchars($row['cedula']) . "</td>";
    $html .= "<td>" . htmlspecialchars($row['sucursal']) . "</td>";
    $html .= "<td>" . htmlspecialchars($row['direccion']) . "</td>";
    $html .= "<td>" . htmlspecialchars($row['correo']) . "</td>";
    $html .= "<td>" . htmlspecialchars($row['telefono']) . "</td>";
    $html .= "<td>" . htmlspecialchars($row['cargo']) . "</td>";
    $html .= "<td>" . htmlspecialchars($row['sexo']) . "</td>";

    $html .= '</tr>';
}

$html .= '</table>';
$dompdf->loadHtml($html);

// Renderiza el HTML como PDF
$dompdf->render();

// Envía el PDF al navegador
$dompdf->stream("reporte_clientes.pdf");

$dompdf->setPaper('A4', 'landscape');

$output = $dompdf->output();
file_put_contents('reporte_empleados.pdf', $output);


?>