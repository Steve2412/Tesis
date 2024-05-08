<?php
require "php/conexion.php";
$id = $_GET['verid'];
$query = "SELECT * FROM paquetes WHERE package_id = '$id'";
$result = $conectar->query($query)->fetchAll(PDO::FETCH_BOTH);
foreach ($result as $row) {
    $package_peso = $row['package_peso'];
    $package_description = $row['package_description'];
    $package_qr_code = $row['package_qr_code'];
    $package_status = $row['package_status'];
}

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Document</title>

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


                    <div class="row2">
                        <div class="col-auto mt-3">
                            <i class="fas fa-arrow-left fa-2x text-secondary" role="button" aria-pressed="true" onclick="history.back()"></i>
                        </div>
                        <div class="col-lg-8 shadow p-3">
                            <!-- Default Card Example -->
                            <div class="card mb-4" id="card-paquete">
                                <div class="card-header">
                                    Informacion del paquete
                                </div>
                                <div class="card-body text-center">
                                    <p class="mb-3">Id</p>
                                    <?php
                                    echo $id;
                                    ?>
                                    <p class="mb-3">Sucursal</p>
                                    <p class="mb-3">peso</p>
                                    <?php
                                    echo $package_peso;
                                    ?>
                                    <p class="mb-3">description</p>
                                    <?php
                                    echo $package_description;
                                    ?>
                                    <p class="mb-3">Status</p>
                                    <?php
                                    echo $package_status;
                                    ?>
                                    <br>
                                    <img src="data:image/png;base64,<?php echo base64_encode($package_qr_code); ?>" alt="Código QR del paquete" class="mt-3">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="more-actions">
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generar Reporte</a>
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
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Cierre de Sesion</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Presiona "Salir" para cerrar tu sesion</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                    <a class="btn btn-danger" href="login.html">Salir</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>