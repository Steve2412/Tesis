<?php
include('phpqrcode/qrlib.php');
date_default_timezone_set('America/Caracas');
session_start();
require "conexion.php";

$record_per_page = 1;
$page = '';

if (isset($_POST['page'])) {
    $page = $_POST['page'];
} else {
    $page = 1;
}

$start_from = ($page - 1) * $record_per_page;



//Ejecutar la accion que se envio desde el html

if (isset($_POST["action"])) {

    //Login de empleado


    if ($_POST["action"] == 'login') {

        $Cedula_Login = $_POST["Cedula_Login"];
        $Contra_Login = $_POST["Contra_Login"];

        $pdo = $conectar->prepare("SELECT * FROM empleados where cedula = '$Cedula_Login' and clave = '$Contra_Login'");
        $pdo->execute();
        $result = $pdo->fetchColumn();

        if ($result > 0) {
            $_SESSION['usuario'] = $Cedula_Login;
            echo 'Continuar';
        } else {
            echo 'Error';
        }
    }

    //Mostrar los datos del empleado en una tabla con paginacion


    if ($_POST["action"] == 'fetch_empleados') {
        $output = '
        <table class="table caption-top">
        <caption>Lista de Usuarios</caption>
        <thead class="table-primary">
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Nombre</th>
                <th scope="col">Apellido</th>
                <th scope="col">Cedula</th>
                <th scope="col">Sucursal</th>
                <th scope="col">Direccion</th>
                <th scope="col">Correo</th>
                <th scope="col">Telefono</th>
                <th scope="col">Cargo</th>
                <th scope="col">Sexo</th>
            </tr>
            </thead>

        ';
        $query = "SELECT * FROM empleados LIMIT $start_from,$record_per_page";
        $result = $conectar->query($query)->fetchAll(PDO::FETCH_BOTH);
        if ($result) {
            foreach ($result as $row) {
                $output .= '
                <tbody>
                <tr>
                    <td>' . $row['id_empleado'] . '</td>
                    <td>' . $row['nombre'] . '</td>
                    <td>' . $row['apellido'] . '</td>
                    <td>' . $row['cedula'] . '</td>
                    <td>' . $row['sucursal'] . '</td>
                    <td>' . $row['direccion'] . '</td>
                    <td>' . $row['correo'] . '</td>
                    <td>' . $row['telefono'] . '</td>
                    <td>' . $row['cargo'] . '</td>
                    <td>' . $row['sexo'] . '</td>

                </tr>
                
            </tbody>';
            }
        } else {
            $output .= '
                <tr>
                    <td colspan="6">No hay informacion</td>
                </tr> 
            ';
        }
        $output .= '</table>';
        $page_query = "SELECT * FROM empleados";
        $page_result = $conectar->query($page_query);
        $total_record = $page_result->rowCount();
        $total_pages = ceil($total_record / $record_per_page);

        $output .= '<ul class="pagination">';

        for ($i = 1; $i <= $total_pages; $i++) {
            $active_page = '';
            if ($i == $page) {
                $active_page = 'active';
            }
            $output .= '<li class="page-item ' . $active_page . '"><span class="pagination_link" style="  position: relative;
            display: block;
            padding: 0.5rem 0.75rem;
            margin-left: -1px;
            line-height: 1.25;
            color: #4e73df;
            background-color: #fff;
            cursor:pointer;
            border: 1px solid #dddfeb;
            " id= "' . $i . '">' . $i . '</span> </li>';
        }
        echo $output;
    }

    //Buscar empleado mediante la barra de busqueda en una tabla


    if ($_POST["action"] == 'search_empleado') {
        $busc_empleado = $_POST["busc_empleado"];
        $output = '
        <table class="table caption-top">
        <caption>Lista de Usuarios</caption>
        <thead class="table-primary">
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Nombre</th>
                <th scope="col">Apellido</th>
                <th scope="col">Cedula</th>
                <th scope="col">Sucursal</th>
                <th scope="col">Direccion</th>
                <th scope="col">Correo</th>
                <th scope="col">Telefono</th>
                <th scope="col">Cargo</th>
                <th scope="col">Sexo</th>
            </tr>
            </thead>

        ';
        $query = "SELECT * FROM empleados where nombre LIKE '%$busc_empleado%'";
        $result = $conectar->query($query)->fetchAll(PDO::FETCH_BOTH);
        if ($result) {
            foreach ($result as $row) {
                $output .= '
                <tbody>
                <tr>
                    <td>' . $row['id_empleado'] . '</td>
                    <td>' . $row['nombre'] . '</td>
                    <td>' . $row['apellido'] . '</td>
                    <td>' . $row['cedula'] . '</td>
                    <td>' . $row['sucursal'] . '</td>
                    <td>' . $row['direccion'] . '</td>
                    <td>' . $row['correo'] . '</td>
                    <td>' . $row['telefono'] . '</td>
                    <td>' . $row['cargo'] . '</td>
                    <td>' . $row['sexo'] . '</td>

                </tr>
                
            </tbody>';
            }
        } else {
            $output .= '
                <tr>
                    <td colspan="6">No hay informacion</td>
                </tr> 
            ';
        }
        $output .= '</table>';
        echo $output;
    }

    //Mostrar los datos del cliente en una tabla con paginacion

    if ($_POST["action"] == 'fetch_clientes') {
        $output = '
        <table class="table caption-top">
        <caption>Lista de Usuarios</caption>
        <thead class="table-primary">
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Nombre</th>
                <th scope="col">Apellido</th>
                <th scope="col">Cedula</th>
                <th scope="col">Ciudad</th>
                <th scope="col">Direccion</th>
                <th scope="col">Telefono</th>
                <th scope="col">Correo</th>
                <th scope="col">Sexo</th>
            </tr>
            </thead>

        ';
        $query = "SELECT * FROM clientes LIMIT $start_from,$record_per_page";
        $result = $conectar->query($query)->fetchAll(PDO::FETCH_BOTH);
        if ($result) {
            foreach ($result as $row) {
                $output .= '
                <tbody>
                <tr>
                    <td>' . $row['id'] . '</td>
                    <td>' . $row['nombre'] . '</td>
                    <td>' . $row['apellido'] . '</td>
                    <td>' . $row['cedula'] . '</td>
                    <td>' . $row['ciudad'] . '</td>
                    <td>' . $row['direccion'] . '</td>
                    <td>' . $row['telefono'] . '</td>
                    <td>' . $row['correo'] . '</td>
                    <td>' . $row['sexo'] . '</td>

                </tr>
                
            </tbody>';
            }
        } else {
            $output .= '
                <tr>
                    <td colspan="6">No hay informacion</td>
                </tr> 
            ';
        }
        $output .= '</table>';
        $page_query = "SELECT * FROM clientes";
        $page_result = $conectar->query($page_query);
        $total_record = $page_result->rowCount();
        $total_pages = ceil($total_record / $record_per_page);

        $output .= '<ul class="pagination">';

        for ($i = 1; $i <= $total_pages; $i++) {
            $active_page = '';
            if ($i == $page) {
                $active_page = 'active';
            }
            $output .= '<li class="page-item ' . $active_page . '"><span class="pagination_link" style="  position: relative;
            display: block;
            padding: 0.5rem 0.75rem;
            margin-left: -1px;
            line-height: 1.25;
            color: #4e73df;
            background-color: #fff;
            cursor:pointer;
            border: 1px solid #dddfeb;
            " id= "' . $i . '">' . $i . '</span> </li>';
        }
        echo $output;
    }

    //Buscar cliente mediante la barra de busqueda en una tabla


    if ($_POST["action"] == 'search_cliente') {
        $busc_cliente = $_POST["busc_cliente"];
        $output = '
        <table class="table caption-top">
        <caption>Lista de Usuarios</caption>
        <thead class="table-primary">
            <tr>
            <th scope="col">Id</th>
            <th scope="col">Nombre</th>
            <th scope="col">Apellido</th>
            <th scope="col">Cedula</th>
            <th scope="col">Ciudad</th>
            <th scope="col">Direccion</th>
            <th scope="col">Telefono</th>
            <th scope="col">Correo</th>
            <th scope="col">Sexo</th>
            </tr>
            </thead>

        ';
        $query = "SELECT * FROM clientes where nombre LIKE '%$busc_cliente%'";
        $result = $conectar->query($query)->fetchAll(PDO::FETCH_BOTH);
        if ($result) {
            foreach ($result as $row) {
                $output .= '
                <tbody>
                <tr>
                <td>' . $row['id'] . '</td>
                <td>' . $row['nombre'] . '</td>
                <td>' . $row['apellido'] . '</td>
                <td>' . $row['cedula'] . '</td>
                <td>' . $row['ciudad'] . '</td>
                <td>' . $row['direccion'] . '</td>
                <td>' . $row['telefono'] . '</td>
                <td>' . $row['correo'] . '</td>
                <td>' . $row['sexo'] . '</td>

                </tr>
                
            </tbody>';
            }
        } else {
            $output .= '
                <tr>
                    <td colspan="6">No hay informacion</td>
                </tr> 
            ';
        }
        $output .= '</table>';
        echo $output;
    }

    //Mostrar Lista Paquetes

    if ($_POST["action"] == 'fetch_paquetes') {
        $output = '
        <table class="table caption-top">
        <caption>Lista de Paquetes</caption>
        <thead class="table-primary">
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Peso</th>
                <th scope="col">Descripcion</th>
                <th scope="col">Detalles</th>
                <th scope="col">Reporte</th>
                
            </tr>
            </thead>

        ';
        $query = "SELECT * FROM paquetes LIMIT $start_from,$record_per_page";
        $result = $conectar->query($query)->fetchAll(PDO::FETCH_BOTH);
        if ($result) {
            foreach ($result as $row) {
                $output .= '
                <tbody>
                <tr>
                    <td>' . $row['package_id'] . '</td>
                    <td>' . $row['package_peso'] . '</td>
                    <td>' . $row['package_description'] . '</td>
                    <td> <a href="paquetes_info.php?verid=' . $row['package_id'] . '"
                    >Ver Detalles</a> </td>
                    <td> <a href="php/factura_paquete.php?verid=' . $row['package_id'] . '"
                    >Reporte    </a> </td>

                </tr>
                
            </tbody>';
            }
        } else {
            $output .= '
                <tr>
                    <td colspan="6">No hay informacion</td>
                </tr> 
            ';
        }
        $output .= '</table>';
        $page_query = "SELECT * FROM paquetes";
        $page_result = $conectar->query($page_query);
        $total_record = $page_result->rowCount();
        $total_pages = ceil($total_record / $record_per_page);

        $output .= '<ul class="pagination">';

        for ($i = 1; $i <= $total_pages; $i++) {
            $active_page = '';
            if ($i == $page) {
                $active_page = 'active';
            }
            $output .= '<li class="page-item ' . $active_page . '"><span class="pagination_link" style="  position: relative;
            display: block;
            padding: 0.5rem 0.75rem;
            margin-left: -1px;
            line-height: 1.25;
            color: #4e73df;
            background-color: #fff;
            cursor:pointer;
            border: 1px solid #dddfeb;
            " id= "' . $i . '">' . $i . '</span> </li>';
        }
        echo $output;
    }

    //Buscar paquete mediante la barra de busqueda en una tabla


    if ($_POST["action"] == 'search_paquete') {
        $busc_paquete = $_POST["busc_paquete"];
        $output = '
        <table class="table caption-top">
        <caption>Lista de Usuarios</caption>
        <thead class="table-primary">
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Peso</th>
                <th scope="col">Descripcion</th>
                <th scope="col">Detalles</th>
            </tr>
            </thead>

        ';
        $query = "SELECT * FROM paquetes where package_id LIKE '%$busc_paquete%'";
        $result = $conectar->query($query)->fetchAll(PDO::FETCH_BOTH);
        if ($result) {
            foreach ($result as $row) {
                $output .= '
                <tbody>
                <tr>
                <td>' . $row['package_id'] . '</td>
                <td>' . $row['package_peso'] . '</td>
                <td>' . $row['package_description'] . '</td>
                <a href="paquetes_info?editarid=' . $row['package_id'] . '"
                >Ver Detalles</a>

                </tr>
                
            </tbody>';
            }
        } else {
            $output .= '
                <tr>
                    <td colspan="6">No hay informacion</td>
                </tr> 
            ';
        }
        $output .= '</table>';
        echo $output;
    }


    //Revisar si el cliente existe 

    if ($_POST["action"] == "Check") {
        $Cedula = $_POST["Cedula"];
        $pdo = $conectar->prepare("SELECT * FROM clientes where cedula = '$Cedula'");
        $pdo->execute();
        $result = $pdo->fetchAll(PDO::FETCH_ASSOC);

        if ($result) {
            $respuesta = array();
            foreach ($result as $row) {
                $respuesta['cedula'] = $row['cedula'];
                $respuesta['nombre'] = $row['nombre'];
                $respuesta['correo'] = $row['direccion'];
                $respuesta['telefono'] = $row['telefono'];
                // Puedes seguir añadiendo otros campos aquí
            }
            header('Content-Type: application/json');
            echo json_encode($respuesta);
        } else {
            echo 'No existe el usuario';
        }
    }


    //Revisar si el cliente existe y continuar con el proceso

    if ($_POST["action"] == "Continuar") {

        $Cedula = $_POST["Cedula"];

        $pdo = $conectar->prepare("SELECT cedula FROM clientes where cedula = '$Cedula'");
        $pdo->execute();
        $result = $pdo->fetchColumn();

        if ($result > 0) {
            echo 'Continuar';
        } else {
            echo 'No existe el usuario';
        }
    }


    //Agregar paquete a la base de datos
    if ($_POST["action"] == "paquete_agregar") {

        $Cedula_1 = $_POST["Cedula_1"];
        $Cedula_2 = $_POST["Cedula_2"];
        $Peso = $_POST["Peso"];
        $Desc = $_POST["Desc"];
        $prefix = "PAQ";
        $unique_id = $prefix . date("YzHis");
        $unique_id = substr($unique_id, 0, 20);

        $filepath = 'qr/';
        $filename = $unique_id . '.png';
        $tamaño = 10;
        $level = 'M';
        $frame_size = 3;
        $contenido = $unique_id;

        QRcode::png($contenido, $filename, $level, $tamaño, $frame_size);

        $QR = file_get_contents($filename);


        try {
            $pdo = $conectar->prepare("INSERT INTO paquetes (package_id,package_remitente_id,package_consignatario_id,package_peso,package_description,package_qr_code) 
            VALUES (?,?,?,?,?,?)");
            $pdo->bindParam(1, $unique_id);
            $pdo->bindParam(2, $Cedula_1);
            $pdo->bindParam(3, $Cedula_2);
            $pdo->bindParam(4, $Peso);
            $pdo->bindParam(5, $Desc);
            $pdo->bindParam(6, $QR);

            $pdo->execute();
            echo 'Se insertaron los datos correctamente';
            unlink($filename); // Eliminar el archivo del código QR del directorio 'qr'
        } catch (PDOException $error) {
            echo 'Error';
        }
    }

    //Agregar cliente a la base de datos



    if ($_POST["action"] == "registrar_cliente") {

        $nombre = $_POST["nombre"];
        $apellido = $_POST["apellido"];
        $cedula = $_POST["cedula"];
        $email = $_POST["email"];
        $ciudad = $_POST["ciudad"];
        $direccion = $_POST["direccion"];
        $sexo = $_POST["sexo"];


        try {
            $pdo = $conectar->prepare("INSERT INTO clientes (nombre,apellido,cedula,correo,ciudad,direccion,sexo) 
                    VALUES (?,?,?,?,?,?,?)");
            $pdo->bindParam(1, $nombre);
            $pdo->bindParam(2, $apellido);
            $pdo->bindParam(3, $cedula);
            $pdo->bindParam(4, $email);
            $pdo->bindParam(5, $ciudad);
            $pdo->bindParam(6, $direccion);
            $pdo->bindParam(7, $sexo);

            $pdo->execute();
            echo 'Se insertaron los datos correctamente';
        } catch (PDOException $error) {
            echo 'Error';
        }
    }

    //Agregar empleado a la base de datos

    if ($_POST["action"] == "empleado_registrar") {

        $nombre = $_POST["nombre"];
        $apellido = $_POST["apellido"];
        $cedula = $_POST["cedula"];
        $email = $_POST["email"];
        $sucursal = $_POST["sucursal"];
        $direccion = $_POST["direccion"];
        $cargo = $_POST["cargo"];
        $sexo = $_POST["sexo"];
        $contra = $_POST["contra"];
        $telefono = $_POST["telefono"];


        try {
            $pdo = $conectar->prepare("INSERT INTO empleados (nombre,apellido,clave,sucursal,direccion,correo,telefono,cedula,sexo,cargo) 
                VALUES (?,?,?,?,?,?,?,?,?,?)");
            $pdo->bindParam(1, $nombre);
            $pdo->bindParam(2, $apellido);
            $pdo->bindParam(3, $contra);
            $pdo->bindParam(4, $sucursal);
            $pdo->bindParam(5, $direccion);
            $pdo->bindParam(6, $email);
            $pdo->bindParam(7, $telefono);
            $pdo->bindParam(8, $cedula);
            $pdo->bindParam(9, $sexo);
            $pdo->bindParam(10, $cargo);

            $pdo->execute();
            echo 'Se insertaron los datos correctamente';
        } catch (PDOException $error) {
            echo 'Error';
        }
    }
}
