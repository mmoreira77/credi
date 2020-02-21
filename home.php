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

                <div id='map' style='width: 400px; height: 300px;'></div>

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

<script>
    $('#detalleCliente').hide();

    $('#btnConsultar').click(function() {
        let textEmpleado = $('#txtCliente').val();
        if (textEmpleado.length > 4) {
            $('#detalleCliente').show(2000);
        }
    });

    setTimeout(function() {
        $('#detalleCliente').hide();
    }, 70000);

    let ubicacion = () => {
        let latitud = 0;
        let longitud = 0;

        //Si el navegador soporta geolocalizacion
        if (!!navigator.geolocation) {
            //Pedimos los datos de geolocalizacion al navegador
            navigator.geolocation.getCurrentPosition(
                //Si el navegador entrega los datos de geolocalizacion los imprimimos
                function(position) {
                    latitud = position.coords.latitude;
                    longitud = position.coords.longitude
                },
                //Si no los entrega manda un alerta de error
                function() {
                    console.log('Ubicación no se pudo determinar');

                }
            );
        }
        $('#detalleCliente').html(latitud + '  ' + longitud);
        $('#detalleCliente').show();
        console.log('Latitud: ' + latitud + '  Longitud: ' + longitud);

    }

    ubicacion();
</script>

<script>
    mapboxgl.accessToken = 'pk.eyJ1IjoibW1vcmVpcmE3NyIsImEiOiJjazZ3bXc2cmYwMGNhM2RqdXhmMGI1bnhsIn0.GJjM6rd0aEaRrOSL8dzTiw';
    var map = new mapboxgl.Map({
        container: 'map',
        style: 'mapbox://styles/mapbox/streets-v11'
    });
</script>

<?php
include_once './template/head.php';
?>