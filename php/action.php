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
                <th scope="col">Editar</th>
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
                    <td> <a href="../empleados_editar.php?verid=' . $row['id_empleado'] . '"
                    ><i class="fa fa-edit"></i></a> </td>

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
                <th scope="col">Editar</th>

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
                    <td> <a href="../clientes_editar.php?verid=' . $row['id'] . '"
                    ><i class="fa fa-edit"></i></a> </td>

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
                <th scope="col">Historial</th>
                
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
                    <td> <a href="paquetes_historial.php?verid=' . $row['package_id'] . '"
                    >Historial    </a> </td>

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
                <th scope="col">Reporte</th>

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
        echo $output;
    }

    if ($_POST["action"] == 'fetch_historial_paquetes') {
        $output = '
        <table class="table caption-top">
        <caption>Historial Paquete</caption>
        <thead class="table-primary">
            <tr>
                <th scope="col">Id Paquee</th>
                <th scope="col">Status</th>
                <th scope="col">Empleado que efectuo el cambio</th>
                <th scope="col">Fecha de realizacion del cambio</th>
                
            </tr>
            </thead>
            ';
        $id = $_POST['id'];
        $query = "SELECT * FROM paquetes_historial WHERE id_pac = '$id' ORDER BY id DESC";
        $result = $conectar->query($query)->fetchAll(PDO::FETCH_BOTH);
        foreach ($result as $row) {
            switch ($row['status']) {
                case 1:
                    $row['status'] = 'En espera';
                    break;
                case 2:
                    $row['status'] = 'En camino';
                    break;
                case 3:
                    $row['status'] = 'Entregado';
                    break;
                case 4:
                    $row['status'] = 'Devuelto';
                    break;
            }
            $query_name = "SELECT empleados.nombre, empleados.apellido
                      FROM paquetes_historial
                      INNER JOIN empleados ON paquetes_historial.id_emp = empleados.id_empleado
                      WHERE paquetes_historial.id = " . $row['id'];

            // Ejecutar la consulta para obtener el nombre del empleado
            $result_name = $conectar->query($query_name)->fetch(PDO::FETCH_ASSOC);

            // Verificar si se encontró el nombre del empleado
            if ($result_name && isset($result_name['nombre'])) {
                $nombre_empleado = $result_name['nombre'] .  ' ' . $result_name['apellido'];;
            } else {
                $nombre_empleado = 'Desconocido';
            }
            $output .= '
                <tbody>
                <tr>
                <td>' . $row['id_pac'] . '</td>
                ';
            $output .= '
                <td>' . $row['status'] . '</td>
                <td>' . $nombre_empleado . '</td>
                <td>' . $row['fecha_camb'] . '</td>

                </tr>
                
            </tbody>';
        }
        $output .= '</table>';
        echo $output;
    }


    //Mostrar lista de pagos


    if ($_POST["action"] == 'fetch_pagos') {
        $output = '
        <table class="table caption-top">
        <caption>Lista de Usuarios</caption>
        <thead class="table-primary">
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Numero de referencia</th>
                <th scope="col">Banco</th>
                <th scope="col">Fecha</th>
                <th scope="col">Monto</th>
                <th scope="col">Id dle paquete</th>
            </tr>
            </thead>

        ';
        $query = "SELECT * FROM pagos LIMIT $start_from,$record_per_page";
        $result = $conectar->query($query)->fetchAll(PDO::FETCH_BOTH);
        if ($result) {
            foreach ($result as $row) {
                $output .= '
                <tbody>
                <tr>
                    <td>' . $row['id_pago'] . '</td>
                    <td>' . $row['numero_referencia'] . '</td>
                    <td>' . $row['monto_pago'] . '</td>
                    <td>' . $row['fecha_pago'] . '</td>
                    <td>' . $row['banco'] . '</td>
                    <td>' . $row['id_paquete'] . '</td>

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
        $page_query = "SELECT * FROM pagos";
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

    //Buscar pago mediante la barra de busqueda en una tabla


    if ($_POST["action"] == 'search_pago') {
        $busc_pagos = $_POST["busc_pagos"];
        $output = '
        <table class="table caption-top">
        <caption>Lista de Usuarios</caption>
        <thead class="table-primary">
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Numero de referencia</th>
                <th scope="col">Banco</th>
                <th scope="col">Fecha</th>
                <th scope="col">Monto</th>
                <th scope="col">Id dle paquete</th>
            </tr>
        </thead>

        ';
        $query = "SELECT * FROM pagos where numero_referencia LIKE '%$busc_pagos%'";
        $result = $conectar->query($query)->fetchAll(PDO::FETCH_BOTH);
        if ($result) {
            foreach ($result as $row) {
                $output .= '
                <tbody>
                <tr>
                    <td>' . $row['id_pago'] . '</td>
                    <td>' . $row['numero_referencia'] . '</td>
                    <td>' . $row['monto_pago'] . '</td>
                    <td>' . $row['fecha_pago'] . '</td>
                    <td>' . $row['banco'] . '</td>
                    <td>' . $row['id_paquete'] . '</td>

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
    //Reporte de


    if ($_POST["action"] == 'fetch_reporte_paq') {
        $output = '
        <table class="table caption-top">
        <caption>Lista de Usuarios</caption>
        <thead class="table-primary">
            <tr>
                <th scope="col">Paquete</th>
                <th scope="col">Cliente</th>
                <th scope="col">Descripcion</th>
                <th scope="col">Fecha</th>
                <th scope="col">Categoria</th>
            </tr>
            </thead>

        ';
        $query = "SELECT atencion.*, clientes.nombre AS cliente_nombre
        FROM atencion
        INNER JOIN clientes ON atencion.cliente_id = clientes.id
        LIMIT $start_from,$record_per_page";
        $result = $conectar->query($query)->fetchAll(PDO::FETCH_BOTH);
        if ($result) {
            foreach ($result as $row) {
                $output .= '
                <tbody>
                <tr>
                    <td>' . $row['paquete_id'] . '</td>
                    <td>' . $row['cliente_nombre'] . '</td>
                    <td>' . $row['descripcion_problema'] . '</td>
                    <td>' . $row['fecha_hora_registro'] . '</td>
                    <td>' . $row['categoria'] . '</td>
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
        $page_query = "SELECT * FROM atencion";
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


    if ($_POST["action"] == 'search_reporte_paq') {
        $busc_reporte_paq = $_POST["busc_reporte_paq"];
        $output = '
        <table class="table caption-top">
        <thead class="table-primary">
            <tr>
            <th scope="col">Paquete</th>
            <th scope="col">Cliente</th>
            <th scope="col">Descripcion</th>
            <th scope="col">Fecha</th>
            <th scope="col">Categoria</th>
            </tr>
            </thead>

        ';
        $query = "SELECT atencion.*, clientes.nombre AS cliente_nombre
        FROM atencion
        INNER JOIN clientes ON atencion.cliente_id = clientes.id where paquete_id LIKE '%$busc_reporte_paq%'";
        $result = $conectar->query($query)->fetchAll(PDO::FETCH_BOTH);
        if ($result) {
            foreach ($result as $row) {
                $output .= '
                <tbody>
                <tr>
                <td>' . $row['paquete_id'] . '</td>
                <td>' . $row['cliente_nombre'] . '</td>
                <td>' . $row['descripcion_problema'] . '</td>
                <td>' . $row['fecha_hora_registro'] . '</td>
                <td>' . $row['categoria'] . '</td>
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
    if ($_POST["action"] == "paquete_agregar_1") {

        $Cedula_1 = $_POST["Cedula_1"];
        $Cedula_2 = $_POST["Cedula_2"];
        $Peso = $_POST["Peso"];
        $Desc = $_POST["Desc"];
        $Sucursal_Origen = $_POST["Sucursal_Origen"];
        $Sucursal_Destino = $_POST["Sucursal_Destino"];
        $prefix = "PAQ";
        $unique_id = $prefix . date("YzHis");
        $unique_id = substr($unique_id, 0, 20);

        $Banco = $_POST["Banco"];
        $Referencia = $_POST["Referencia"];
        $Monto = $_POST["Monto"];
        $Fecha = $_POST["Fecha_pago"];

        $uploadDir = 'capturas/';
        $uploadedFile = '';
        $fileName = basename($_FILES["Captura"]["name"]);
        $targetFilePath = $uploadDir . $fileName;
        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
        move_uploaded_file($_FILES["Captura"]["tmp_name"], $targetFilePath);
        $uploadedFile = $fileName;



        $filepath = 'qr/';
        $filename = $unique_id . '.png';
        $tamaño = 10;
        $level = 'M';
        $frame_size = 3;
        $contenido = $unique_id;
        $status = 2;

        QRcode::png($contenido, $filename, $level, $tamaño, $frame_size);

        $QR = file_get_contents($filename);


        try {
            $pdo = $conectar->prepare("INSERT INTO paquetes (package_id,package_sucursal_origen_id,package_sucursal_destino_id,package_remitente_id,package_consignatario_id,package_peso,package_description,package_qr_code) 
            VALUES (?,?,?,?,?,?,?,?)");
            $pdo->bindParam(1, $unique_id);
            $pdo->bindParam(2, $Sucursal_Origen);
            $pdo->bindParam(3, $Sucursal_Destino);
            $pdo->bindParam(4, $Cedula_1);
            $pdo->bindParam(5, $Cedula_2);
            $pdo->bindParam(6, $Peso);
            $pdo->bindParam(7, $Desc);
            $pdo->bindParam(8, $QR);
            unlink($filename); // Eliminar el archivo del código QR del directorio 'qr'


            $pdo->execute();

            $pdo_2 = $conectar->prepare("INSERT INTO pagos (numero_referencia,banco,fecha_pago,monto_pago,imagen_pago,id_paquete) 
                    VALUES (?,?,?,?,?,?)");
            $pdo_2->bindParam(1, $Referencia);
            $pdo_2->bindParam(2, $Banco);
            $pdo_2->bindParam(3, $Fecha);
            $pdo_2->bindParam(4, $Monto);
            $pdo_2->bindParam(5, $uploadedFile);
            $pdo_2->bindParam(6, $unique_id);
            $pdo_2->execute();

            $pdo_3 = $conectar->prepare("INSERT INTO paquetes_historial (id_pac,status_pac,id_emp) 
                    VALUES (?,?,?)");
            $pdo_3->bindParam(1, $unique_id);
            $pdo_3->bindParam(2, $status);
            $pdo_3->bindParam(3, $_SESSION['usuario']);
            $pdo_3->execute();



            echo 'Se insertaron los datos correctamente';
        } catch (PDOException $error) {
            echo 'Error';
        }
    }


    //Agregar paquete a la base de datos
    if ($_POST["action"] == "paquete_agregar_2") {

        $Cedula_1 = $_POST["Cedula_1"];
        $Cedula_2 = $_POST["Cedula_2"];
        $Peso = $_POST["Peso"];
        $Desc = $_POST["Desc"];
        $Sucursal_Origen = $_POST["Sucursal_Origen"];
        $Sucursal_Destino = $_POST["Sucursal_Destino"];
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
            $pdo = $conectar->prepare("INSERT INTO paquetes (package_id,package_sucursal_origen_id,package_sucursal_destino_id,package_remitente_id,package_consignatario_id,package_peso,package_description,package_qr_code) 
            VALUES (?,?,?,?,?,?,?,?)");
            $pdo->bindParam(1, $unique_id);
            $pdo->bindParam(2, $Sucursal_Origen);
            $pdo->bindParam(3, $Sucursal_Destino);
            $pdo->bindParam(4, $Cedula_1);
            $pdo->bindParam(5, $Cedula_2);
            $pdo->bindParam(6, $Peso);
            $pdo->bindParam(7, $Desc);
            $pdo->bindParam(8, $QR);

            $pdo->execute();

            $pdo_2 = $conectar->prepare("INSERT INTO paquetes_historial (id_pac,status,id_emp) 
                    VALUES (?,?,?)");
            $pdo_2->bindParam(1, $unique_id);
            $pdo_2->bindParam(2, 1);
            $pdo_2->bindParam(3, $_SESSION['usuario']);
            $pdo_2->execute();

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

    if ($_POST["action"] == "update_cliente") {

        $id = $_POST["id"];
        $Nombre_cliente_editar = $_POST["Nombre_cliente_editar"];
        $Correo_cliente_editar = $_POST["Correo_cliente_editar"];
        $Telefono_cliente_editar = $_POST["Telefono_cliente_editar"];
        $Direccion_cliente_editar = $_POST["Direccion_cliente_editar"];

        $pdo = $conectar->prepare("UPDATE clientes SET nombre = '$Nombre_cliente_editar',correo = '$Correo_cliente_editar',
        telefono = '$Telefono_cliente_editar',direccion = '$Direccion_cliente_editar' WHERE id = '$id'");
        $pdo->execute();

        if ($pdo) {
            echo 'Continuar';
        } else {
            echo 'No existe el usuario';
        }
    }

    if ($_POST["action"] == "update_empleado") {

        $id = $_POST["id"];
        $Nombre_cliente_editar = $_POST["Nombre_cliente_editar"];
        $Correo_cliente_editar = $_POST["Correo_cliente_editar"];
        $Telefono_cliente_editar = $_POST["Telefono_cliente_editar"];
        $Direccion_cliente_editar = $_POST["Direccion_cliente_editar"];

        $pdo = $conectar->prepare("UPDATE empleados SET nombre = '$Nombre_cliente_editar',correo = '$Correo_cliente_editar',
        telefono = '$Telefono_cliente_editar',direccion = '$Direccion_cliente_editar' WHERE id_empleado = '$id'");
        $pdo->execute();

        if ($pdo) {
            echo 'Continuar';
        } else {
            echo 'No existe el usuario';
        }
    }


    //Historial paquetes

}
