<?php
require "php/conexion.php";
include("php/session.php");


$id = $_GET['verid'];
$query = "SELECT * FROM empleados WHERE id_empleado = '$id'";
$result = $conectar->query($query)->fetchAll(PDO::FETCH_BOTH);
foreach ($result as $row) {
    $Cedula = $row['cedula'];
    $Nombre = $row['nombre'];
    $Apellido = $row['apellido'];
    $Correo = $row['correo'];
    $Telefono = $row['telefono'];
    $Sucursal = $row['sucursal'];
    $Direccion = $row['direccion'];
    $Sucursal = $row['sucursal'];
}

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="">

    <title>Editar Empleado <?php echo $Nombre ?></title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        <?php include("sidebar.php"); ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->

                <?php include("toolbar.php"); ?>

                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->


                    <div class="container">
                        <i class="fas fa-arrow-left fa-2x text-secondary" role="button" aria-pressed="true" onclick="history.back()"></i>

                        <div class="main-body">
                            <div class="col-lg-8">
                                <div class="card">
                                    <div class="card-body">
                                        <h1>Editar datos del empleado <?php echo $Nombre ?></h1>

                                        <div class="row mb-3">
                                            <div class="col-sm-3">
                                                <input type="hidden" id="id" name='id' type="text" readonly class="form-control" value="<?php echo $id ?>">
                                                <h6 class="mb-0">Nombre</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <input id="Nombre_cliente_editar" name='Nombre_cliente_editar' type="text" class="form-control" value="<?php echo $Nombre ?>">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Apellido</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <input id="Apellido_cliente_editar" name='Apellido_cliente_editar' type="text" class="form-control" value="<?php echo $Apellido ?>">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Cedula</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <input id="Cedula_cliente_editar" name='Cedula_cliente_editar' type="text" class="form-control" value="<?php echo $Cedula ?>">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Correo</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <input id="Correo_cliente_editar" name='Correo_cliente_editar' type="text" class="form-control" value="<?php echo $Correo ?>">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Telefono</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <input id="Telefono_cliente_editar" name='Telefono_cliente_editar' type="text" class="form-control" value="<?php echo $Telefono ?>">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Direccion</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <input id="Direccion_cliente_editar" name='Direccion_cliente_editar' type="text" class="form-control" value="<?php echo $Direccion ?>">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-3"></div>
                                            <div class="col-sm-9 text-secondary">
                                                <input type="hidden" name="action" id="action">
                                                <a id="update_empleado" name="update_empleado" class="btn btn-primary px-4">Guardar cambios</a>
                                            </div>
                                        </div>
                                        <!--<div class="form-group row">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <label for="sucursal">Sucursal</label>
                                                <select class="form-control" placeholder="Sucursal" name="sucursal" id="sucursal">
                                                    <option selected value="<?php echo $Sucursal ?>"><?php echo $Sucursal ?> </option>
                                                    <option value="1">Caracas</option>
                                                    <option value="2">Maracaibo</option>
                                                    <option value="3">Valencia</option>
                                                </select>
                                            </div>
                                        </div>-->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>

        </div>

    </div>
    <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->
    </div>
    <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <?php include("logout.php"); ?>


    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

<script>
    $(document).ready(function() {


        $(document).on(' click', '#update_empleado', function() {
            $('#action').val('update_empleado');
            var id = $('#id').val();
            var Nombre_cliente_editar = $('#Nombre_cliente_editar').val();
            var Apellido_cliente_editar = $('#Apellido_cliente_editar').val();
            var Cedula_cliente_editar = $('#Cedula_cliente_editar').val();
            var Correo_cliente_editar = $('#Correo_cliente_editar').val();
            var Telefono_cliente_editar = $('#Telefono_cliente_editar').val();
            var Direccion_cliente_editar = $('#Direccion_cliente_editar').val();
            var action = $('#action').val();
            if (Nombre_cliente_editar != '' && Apellido_cliente_editar != '' && Cedula_cliente_editar != '' && Correo_cliente_editar != '' && Telefono_cliente_editar != '' && Direccion_cliente_editar != '') {
                $.ajax({
                    url: "php/action.php",
                    type: "POST",
                    data: {
                        id: id,
                        Nombre_cliente_editar: Nombre_cliente_editar,
                        Apellido_cliente_editar: Apellido_cliente_editar,
                        Cedula_cliente_editar: Cedula_cliente_editar,
                        Correo_cliente_editar: Correo_cliente_editar,
                        Telefono_cliente_editar: Telefono_cliente_editar,
                        Direccion_cliente_editar: Direccion_cliente_editar,
                        action: action
                    },
                    success: function(data) {
                        if (data == "Continuar") {
                            alert("Datos actualizados")
                        } else if (data == "Error") {
                            alert("Datos incorrectos")
                        }
                    }
                })
            } else {
                alert("Ingresa todos los datos");
            }
        });
    });
</script>

</html>