<?php
include_once './clases/credimaster.php';
$objCredi = new Credimaster();
$objCredi->validateSession();
//Impresion de cabecera html y menu
include_once './template/head.php';
?>

<div class="container">
    <span>Empleado:</span>
    <p class="text-info"><b><?php echo $_SESSION['nombreUser']; ?></b></p>
    <h3>Consulta de créditos</h3>
    <br>
    <input type="text" name="txtCliente" id="txtCliente" placeholder="Código o nombre de cliente" class="form-control">
    <div id="sugerencias"></div>
    <button id="btnConsultar" type="button" class="btn btn-primary btn-block"> Consultar</button>
    <div class="row">

        <div class="col-12" id="detalleCliente">
            <hr>
            <h4>Consulta de préstamo</h4>
            <div class="col-12 text-center">
                <img src="img/photo.jpg" class="rounded" style="width: 150px;">
            </div>
            <hr>
            <div class="row">
                <!-- <div class="col-12 float-left">
                        <img src="img/photo.jpg" style="width: 100px;">
                    </div> -->
                <div class="col-12">
                    <p class="text-info"><b>Código: 020230042505</b> | <b>Nombre: JOSE ALEXANDER HENRIQUEZ</b></p>
                </div>

                <!-- <div id='map' style='width: 400px; height: 300px;'></div> -->

            </div>
            <div class="row">
                <div class="col-12">
                    <table class="table">
                        <tr>
                            <td>Total:</td>
                            <td>3,728.18</td>
                        </tr>
                        <tr>
                            <td>Pagado:</td>
                            <td>0.0</td>
                        </tr>
                        <tr>
                            <td>Deb al día:</td>
                            <td>3,920.18</td>
                        </tr>
                        <tr>
                            <td>En mora:</td>
                            <td>3,920.18</td>
                        </tr>
                        <tr>
                            <td>Forma de pago:</td>
                            <td>Mensual</td>
                        </tr>
                        <tr>
                            <td>Total cuotas:</td>
                            <td>171.64</td>
                        </tr>
                        <tr>
                            <td>Para esta al día:</td>
                            <td>5,968.9</td>
                        </tr>
                        <tr>
                            <td>Plazos en meses:</td>
                            <td>24</td>
                        </tr>
                        <tr>
                            <td>Cuotas:</td>
                            <td>24</td>
                        </tr>
                        <tr>
                            <td>Por mora:</td>
                            <td>389.85</td>
                        </tr>
                        <tr>
                            <td>Cuotas en mora:</td>
                            <td>23</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<hr>
<hr>
<!-- <script src="https://mmoreira77.github.io/credi/geolocalizacion.js"></script> -->
<script>
    $('#detalleCliente').hide();

    $('#btnConsultar').click(function() {
        let textEmpleado = $('#txtCliente').val();
        if (textEmpleado.length > 4) {
            consulta(textEmpleado);
        }
    });

    let consulta = (codigo) => {
        $.ajax({
            method: 'POST',
            url: './operaciones/ope.php',
            data: {
                ope: 0,
                data: codigo
            },
            beforeSend: function() {
                $('#detalleCliente').html('<br><span class="text-warning"><b> CARGANDO DATOS POR FAVOR ESPERE ...</b></span>');
            }
        }).done(function(data) {
            $('#detalleCliente').show(2000);
            $('#detalleCliente').html(data);
        });
    }

    $('#txtCliente').keyup(function() {
        let textEmpleado = $('#txtCliente').val();
        if (textEmpleado.length > 2) {
            if (+textEmpleado.substr(0, 1) >= 0 && textEmpleado.substr(0, 1) <= 9) {
                buscarCodigo(textEmpleado);
            } else {
                buscarNombre(textEmpleado);
            }
        } else {
            $('#sugerencias').html('');
        }
    });

    let buscarCodigo = (cod) => {
        $.ajax({
            method: 'POST',
            url: './operaciones/ope.php',
            data: {
                ope: 1,
                cod
            },
            beforeSend: function() {
                $('#sugerencias').html('<br><span class="text-primary"><b> CARGANDO DATOS POR FAVOR ESPERE ...</b></span>');
            }
        }).done(function(data) {
            $('#sugerencias').html(data);
        });
    }

    let buscarNombre = (cod) => {
        $.ajax({
            method: 'POST',
            url: './operaciones/ope.php',
            data: {
                ope: 2,
                cod
            },
            beforeSend: function() {
                $('#sugerencias').html('<br><span class="text-primary"><b> CARGANDO DATOS POR FAVOR ESPERE ...</b></span>');
            }
        }).done(function(data) {
            $('#sugerencias').html(data);
        });
    }

    $('#sugerencias').on('click', '.prestamo', function() {
        let cod = $(this).attr('codigo');
        $('#txtCliente').val(cod);
        $('#sugerencias').html('');
        if ($('#txtCliente').val().length === 11) {
            $('#btnConsultar').trigger('click');
        } else {
            buscarCodigo($('#txtCliente').val());
        }
    });
</script>


<?php
include_once './template/head.php';
?>