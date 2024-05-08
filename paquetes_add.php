<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Blank</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>


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
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 mx-auto cf-container">
                            <h2>Hola</h2>
                            <p>Por favor, ingrese los datos solicitados a continuacion para poder añadir el paquete</p>
                            <div>
                                <form>
                                    <div id="Cedula_remitente_form" class="cf-cover">
                                        <div class="session-title row">
                                        </div>
                                        <p>Ingrese la cedula del remitente</p>
                                        <div class="form-row row">
                                            <div class="col-md-12">
                                                <label id="cedula_remitente_nombre" for="">Cedula</label>
                                                <input oninput="this.value = this.value.replace(/[^0-9-]/g, '').replace(/(\..*?)\..*/g, '$1');" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="10" type="text" placeholder="Ingrese la cedula del remitente" name="cedula_remitente" id="cedula_remitente" class="form-control">
                                            </div>
                                        </div>

                                        <div class="form-row row">
                                            <div class="col-md-12">
                                                <label for="">Nombre</label>
                                                <input readonly type="text" placeholder="Nombre" id="nombre_remitente" name='nombre_remitente' class="form-control">
                                            </div>
                                        </div>

                                        <div class="form-row row">
                                            <div class="col-md-12">
                                                <label for="">Direccion</label>
                                                <input readonly type="text" placeholder="Direccion" id="direccion_remitente" name='direccion_remitente' class="form-control">
                                            </div>
                                        </div>

                                        <div class="form-row row">
                                            <div class="col-md-12">
                                                <label for="">Numero</label>
                                                <input readonly type="text" placeholder="Numero" id="numero_remitente" name='numero_remitente' class="form-control">
                                            </div>
                                        </div>
                                        <br>
                                        <div class="form-row row">
                                            <div class="col-md-12">
                                                <a class="btn btn-info" name="Check_1" id="Check_1">Check</a>
                                                <a class="btn btn-primary" name="continuar_1" id="continuar_1">Continuar</a>
                                            </div>
                                        </div>
                                </form>


                            </div>
                            <div id="cedula_consignario_form" class="cf-cover">
                                <div class="session-title row">
                                </div>
                                <p>Ingrese la cedula del consignario</p>

                                <div class="form-row row">
                                    <div class="col-md-12">
                                        <label for="">Cedula</label>
                                        <input oninput="this.value = this.value.replace(/[^0-9-]/g, '').replace(/(\..*?)\..*/g, '$1');" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="10" type="text" placeholder="Ingrese la cedula del consignario" name="consignario" id="consignario" class="form-control">
                                    </div>
                                </div>

                                <div class="form-row row">
                                    <div class="col-md-12">
                                        <label for="">Nombre</label>
                                        <input readonly type="text" placeholder="Nombre" name='nombre_consignnario' class="form-control">
                                    </div>
                                </div>

                                <div class="form-row row">
                                    <div class="col-md-12">
                                        <label for="">Direccion</label>
                                        <input readonly type="text" placeholder="Direccion" name='direccion_consignnario' class="form-control">
                                    </div>
                                </div>

                                <div class="form-row row">
                                    <div class="col-md-12">
                                        <label for="">Numero</label>
                                        <input readonly type="text" placeholder="Numero" name='numero_consignnario' class="form-control">
                                    </div>
                                </div>


                                <div class="form-row row">
                                    <div class="col-md-12">
                                        <label for="">Seleccione la sucursal de destino</label>

                                        <select class="form-control" name="sucursal_destino" id="sucursal_destino">
                                            <option value="CONAVENCA MARACAIBO">CONAVENCA MARACAIBO</option>
                                            <option value="CONAVENCA CARACAS">CONAVENCA CARACAS</option>
                                            <option value="CONAVENCA VALENCIA">CONAVENCA VALENCIA</option>
                                        </select>
                                    </div>

                                </div>
                                <br>

                                <div class="form-row row">
                                    <div class="col-md-12">
                                        <a class="btn btn-info" name="Check_2" id="Check_2">Check</a>
                                        <a class="btn btn-info" name="continuar_2" id="continuar_2">Continuar</a>
                                    </div>
                                </div>
                            </div>

                            <div id="paquete_form">
                                <div class="cf-cover">
                                    <div class="session-title row">
                                    </div>
                                    <div class="form-row row">
                                        <div class="col-md-12">
                                            <label for="">Peso</label>
                                            <input oninput="this.value = this.value.replace(/[^0-9-]/g, '').replace(/(\..*?)\..*/g, '$1');" type="text" placeholder="Ingresa el Peso del producto" id="peso" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-row row">
                                        <div class="col-md-12">
                                            <label for="">Descripcion</label>
                                            <textarea placeholder="Añade una breve descripcion del producto" id="descripcion" rows="3" class="form-control"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-row row agre">
                                    </div>
                                    <br>
                                    <div class="form-row row">
                                        <div class="col-md-12">
                                            <button class="btn btn-primary w-100" id="Confirm" name="Confirm">Confirmar</button>
                                            <input type="hidden" name="action" id="action">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="confirmation_form" style="display: none;">
                                <h1>Datos del remitente</h1>
                                <table class="table caption-top">
                                    <thead class="table-primary">
                                        <tr>
                                            <th scope="col">Cedula Remitente</th>
                                            <th scope="col">Nombre Remitente</th>
                                            <th scope="col">Direccion Remitente</th>
                                            <th scope="col">Numero Remitente</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td id='cedula_remitente_confirm'></td>
                                            <td id='nombre_remitente_confirm'></td>
                                            <td id='dirrecion_remitente_confirm'></td>
                                            <td id='numero_remitente_confirm'></td>
                                </table>
                                <h1>Datos del consignario</h1>
                                <table class="table caption-top">
                                    <thead class="table-primary">
                                        <tr>
                                            <th scope="col">Cedula consignario</th>
                                            <th scope="col">Nombre consignario</th>
                                            <th scope="col">Direccion consignario</th>
                                            <th scope="col">Numero consignario</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td id='cedula_consignario_confirm'></td>
                                            <td id='nombre_consignario_confirm'></td>
                                            <td id='dirrecion_consignario_confirm'></td>
                                            <td id='numero_consignario_confirm'></td>
                                </table>
                                <h1>Datos del Paquete</h1>
                                <table id='confirm_paquete' class="table caption-top">
                                    <thead class="table-primary">
                                        <tr>
                                            <th scope="col">Peso</th>
                                            <th scope="col">Descripcion</th>
                                            <th scope="col">Precio envio</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td id='peso_confirm'></td>
                                            <td id='descripcion_confirm'></td>
                                            <td id='precio_confirm'></td>
                                </table>

                                <button class="btn btn-primary w-100" id="Agregar" name="Agregar">Agregar</button>

                            </div>


                            <div>

                            </div>


                            <form method="post">

                            </form>

                            <form action="" method="post">

                            </form>
                        </div>
                    </div>
                </div>
                <!-- End of Page Content -->

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

    <script>
        function agregarNombreATabla() {
            // Obtener el valor del input
            var peso = document.querySelector("#peso").value;
            var descripcion = document.querySelector("#descripcion").value;

            // Crear una fila y una celda
            var fila = document.querySelector("#confirm_paquete").insertRow();

            var celdaPeso = fila.insertCell(0);
            celdaPeso.innerHTML = peso;

            var celdaDescripcion = fila.insertCell(1);
            celdaDescripcion.innerHTML = descripcion;
        }
        /* REFRESCAR */
        /* window.addEventListener('beforeunload', function (e) {
          // Cancel the event
          e.preventDefault(); // If you prevent default behavior in Mozilla Firefox prompt will always be shown
          // Chrome requires returnValue to be set
          e.returnValue = '';
        }); */

        var Continuar_1 = document.querySelector("#continuar_1");
        Continuar_1.disabled = "true";


        var Cedula_remitente_form = document.querySelector("#Cedula_remitente_form");
        var cedula_consignario_form = document.querySelector("#cedula_consignario_form");
        var paquete_form = document.querySelector("#paquete_form");

        Cedula_remitente_form.style.display = "block";
        cedula_consignario_form.style.display = "none";
        paquete_form.style.display = "none";





        $(document).ready(function() {

            $(document).on('click', '#Check_1', function() {

                $('#action').val('Check');
                var Cedula = $('#cedula_remitente').val();
                var action = $('#action').val();
                if (Cedula != '') {
                    $.ajax({
                        url: "php/action.php",
                        type: "POST",
                        data: {
                            Cedula: Cedula,
                            action: action
                        },
                        success: function(data) {
                            $('#cedula_remitente_confirm').text(data.cedula); // Agregar ID a la tabla
                            $('#nombre_remitente_confirm').text(data.nombre);
                            $('#dirrecion_remitente_confirm').text(data.correo);
                            $('#numero_remitente_confirm').text(data.telefono);
                            $('input[name="nombre_remitente"]').val(data.nombre);
                            $('input[name="direccion_remitente"]').val(data.correo);
                            $('input[name="numero_remitente"]').val(data.telefono);
                        }
                    })

                } else {
                    alert("Ingresa el dato solicitado");
                }

            });

            $(document).on('click', '#continuar_1', function() {
                $('#action').val('Continuar');
                var Cedula = $('#cedula_remitente').val();
                var action = $('#action').val();
                if (Cedula != '') {
                    $.ajax({
                        url: "php/action.php",
                        type: "POST",
                        data: {
                            Cedula: Cedula,
                            action: action
                        },
                        success: function(data) {
                            if (data == "Continuar") {
                                Cedula_remitente_form.style.display = 'none';
                                cedula_consignario_form.style.display = 'block';
                            } else if (data == "No existe el usuario") {
                                alert(data);
                            }
                        }
                    })

                } else {
                    alert("Ingresa el dato solicitado");
                }

            });

            $(document).on('click', '#Check_2', function() {
                $('#action').val('Check');
                var Cedula = $('#consignario').val();
                var action = $('#action').val();
                if (Cedula != '') {
                    $.ajax({
                        url: "php/action.php",
                        type: "POST",
                        data: {
                            Cedula: Cedula,
                            action: action
                        },
                        success: function(data) {
                            $('#cedula_consignario_confirm').text(data.cedula); // Agregar ID a la tabla
                            $('#nombre_consignario_confirm').text(data.nombre);
                            $('#dirrecion_consignario_confirm').text(data.correo);
                            $('#numero_consignario_confirm').text(data.telefono);
                            $('input[name="nombre_consignnario"]').val(data.nombre);
                            $('input[name="direccion_consignnario"]').val(data.correo);
                            $('input[name="numero_consignnario"]').val(data.telefono);
                        }
                    })

                } else {
                    alert("Ingresa el dato solicitado");
                }

            });

            $(document).on('click', '#continuar_2', function() {
                $('#action').val('Continuar');
                var Cedula = $('#consignario').val();
                var action = $('#action').val();
                if (Cedula != '') {
                    $.ajax({
                        url: "php/action.php",
                        type: "POST",
                        data: {
                            Cedula: Cedula,
                            action: action
                        },
                        success: function(data) {
                            if (data == "Continuar") {
                                cedula_consignario_form.style.display = "none";
                                paquete_form.style.display = 'block';
                            } else if (data == "No existe el usuario") {
                                alert(data);
                            }
                        }
                    })

                } else {
                    alert("Ingresa el dato solicitado");
                }

            });
            $(document).on('click', '#Confirm', function() {

                    paquete_form.style.display = "none";


                    $('#confirmation_form').show();
                    agregarNombreATabla();

                }

            );

            $(document).on('click', '#Agregar', function() {
                $('#action').val('paquete_agregar');
                var Cedula_1 = $('#cedula_remitente').val();
                var Cedula_2 = $('#consignario').val();
                var Peso = $('#peso').val();
                var Desc = $('#descripcion').val();
                var action = $('#action').val();
                if (Peso != '' || Desc != '') {
                    $.ajax({
                        url: "php/action.php",
                        type: "POST",
                        data: {
                            Cedula_1: Cedula_1,
                            Cedula_2: Cedula_2,
                            Peso: Peso,
                            Desc: Desc,
                            action: action
                        },
                        success: function(data) {
                            alert(data);
                        }
                    })

                } else {
                    alert("Ingresa el dato solicitado");
                }

            });

        });
    </script>
</body>

</html>