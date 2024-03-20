<?php
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


    //Revisar si el cliente existe 

    if ($_POST["action"] == "Check") {

        $Cedula = $_POST["Cedula"];

        $pdo = $conectar->prepare("SELECT cedula FROM clientes where cedula = '$Cedula'");
        $pdo->execute();
        $result = $pdo->fetchColumn();

        if ($result > 0) {
            $pdo = $conectar->prepare("SELECT nombre FROM clientes where cedula = '$Cedula'");
            $pdo->execute();
            $result = $pdo->fetchColumn();

            echo $result;
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

        try {
            $pdo = $conectar->prepare("INSERT INTO paquetes (package_remitente_id,package_consignatario_id,package_peso,package_description) 
            VALUES (?,?,?,?)");
            $pdo->bindParam(1, $Cedula_1);
            $pdo->bindParam(2, $Cedula_2);
            $pdo->bindParam(3, $Peso);
            $pdo->bindParam(4, $Desc);

            $pdo->execute();
            echo 'Se insertaron los datos correctamente';
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
