<?php
session_start();
include_once './clases/app.php';
include_once './clases/sesiones.php';
include_once './helpers/helperagencia.php';
$objCredi = new App();
$objSesion = new Sesiones();
$helperAgencia = new HelperAgencia();
$objCredi->validateSession();
$selectAgencia = $helperAgencia->userAgenciaConsulta($objCredi->userAgenciaConsulta());
if ($selectAgencia == '') {
    $userAgencia = $objCredi->usuarioAgenciaGet();
    $agenciaNombre = $objCredi->agenciaNombreGet($userAgencia[0]['agencia']);
    $objSesion->setAgenciaSession($userAgencia[0]['agencia']);
}
//Impresion de cabecera html y menu
include_once './template/head.php';
// echo '<pre>';
// print_r($_SESSION);
// echo '</pre>';
?>

<div class="container">
    <div class="row">
        <div class="col-6">
            <span>Empleado:</span>
            <p class="text-info"><b><?php echo $_SESSION['nombreUser']; ?></b></p>
        </div>
        <div class="col-6">
            <span>Agencia: </span>
            <p class="text-info"><b><?php echo $agenciaNombre[0]['NOMBRE']; ?></b></p>
        </div>
    </div>

    <?php
    echo $selectAgencia;
    ?>
    <hr>
    <h4 class="text-center">Consulta de créditos</h4>
    <input type="text" name="txtCliente" id="txtCliente" placeholder="Código o nombre de cliente" class="form-control">
    <div id="sugerencias"></div>
    <button id="btnConsultar" type="button" class="btn btn-primary btn-block"> Consultar</button>
    <div class="row">
        <div class="col-12" id="detalleCliente"></div>
    </div>
    <hr>
    <p class="text-right text-warning">.: CREDIMASTER :.</p>
</div>
<hr>
<script>
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

    $('#selectAgencia').change(function() {
        let agencia = $('#selectAgencia').val();
        if (agencia != 'default') {
            $.ajax({
                method: 'POST',
                url: './operaciones/ope.php',
                data: {
                    ope: 3,
                    agencia
                }
            }).done(function(data) {
                location.reload(true);
            });
        } else {
            $('#sugerencias').html('<br><span class="text-danger"><b> Seleccione una agencia</b></span>');

        }
        console.log(agencia);

    });
</script>


<?php
include_once './template/head.php';
?>