<?php
class HelperAgencia
{
    public function userAgenciaConsulta($data = null)
    {
        $select = '';
        if ($data == 0) {
            $select = '
            <div class="form-group">
            <label for="exampleFormControlSelect1">Selecione agencia a la pertece</label>
            <select class="form-control" id="selectAgencia">
                <option value="default"> ---</option>
                <option value="01"> Santa Ana</option>
                <option value="02"> Chalchuapa</option>
                <option value="03"> Ahuachapan</option>
                <option value="04"> Sonsonate</option>
                <option value="07"> Chaltenago</option>
                <option value="08"> Lourdes Colón</option>
            </select>
            </div>
            ';
        }
        return $select;
    }
    public function sortClienteNombre($data = null)
    {
        $li = null;
        if (count($data) > 0) {
            foreach ($data as $key => $value) {
                $li .= '<li class="list-group-item list-group-item-success prestamo" codigo = "' . $value['CODIGO'] . '"> <b>' . $value['NOMBRE'] . ' ' . $value['APELLIDO'] . '</b></li>';
            }
        } else {
            $li = '<li class="list-group-item" codigo = ""> No se encuentran coindidencias</li>';
        }

        return '<ul class="list-group">' . $li . '</ul>';
    }

    public function sortSugerencias($data = null)
    {
        $li = null;
        if (count($data) > 0) {
            foreach ($data as $key => $value) {
                $li .= '<li class="list-group-item list-group-item-success prestamo" codigo = "' . $value['CODIGOPRE'] . '"> <b>' . $value['CODIGOPRE'] . '</b></li>';
            }
        } else {
            $li = '<li class="list-group-item" codigo = ""> No se encuentran coindidencias</li>';
        }

        return '<ul class="list-group">' . $li . '</ul>';
    }

    public function sortDataPrestamoCliente($data = null)
    {
        $outData = '
        <hr>
        <div class="row">
                <div class="col-12">
                    <table class="table">
                        <tr>
                            <td class="text-info">Cliente: </td>
                            <td><b>' . $data[1][0]['CODIGO'] . '</b></td>
                        </tr>
                        <tr>
                            <td class="text-info">Nombre: </td>
                            <td><b>' . $data[1][0]['NOMBRE'] . ' ' . $data[1][0]['APELLIDO'] . '</b></td>
                        </tr>                        
                        <tr>
                            <td class="text-info">DUI: </td>
                            <td><b>' . $data[1][0]['DUI'] . '</b></td>
                        </tr>
                        <tr>
                            <td class="text-info">NIT: </td>
                            <td><b>' . $data[1][0]['NIT'] . '</b></td>
                        </tr>
                        <tr>
                            <td class="text-info">Agencia: </td>
                            <td><b>' . $data[2][0]['NOMBRE'] . '</b></td>
                        </tr>
                    </table>                    
                </div>
        </div>
        <div class="row">
        <div class="col-12">
                <p class="text-success text-center">DETALLE DE PRÉSTAMO<BR><b>' . $data[0][0]['CODIGOPRE'] . '</b></p>
                <table class="table">
                    <tr>
                        <td>Total:</td>
                        <td> $' . $data[0][0]['MONTO'] . '</td>
                    </tr>
                    <tr>
                        <td>Saldo:</td>
                        <td> $' . $data[0][0]['SALDO'] . '</td>
                    </tr>
                    <tr>
                        <td>Cuota:</td>
                        <td> $' . $data[0][0]['CUOTA'] . '</td>
                    </tr>
                    <tr>
                        <td>Pagado:</td>
                        <td> $' . $data[0][0]['VALPAGADO'] . '</td>
                    </tr>
                    <tr>
                        <td>Para estar al día:</td>
                        <td> $' . $data[0][0]['VALDEBPAG'] . '</td>
                    </tr>
                    <tr>
                        <td>En mora:</td>
                        <td> $' . $data[0][0]['VALORPMOR'] . '</td>
                    </tr>
                    <tr>
                        <td>Forma de pago:</td>
                        <td> ' . $data[0][0]['TIPCUOTA'] . '</td>
                    </tr>
                    <tr>
                        <td>Apertura:</td>
                        <td> ' . $data[0][0]['APERTURA'] . '</td>
                    </tr>
                    <tr>
                        <td>Vecimiento:</td>
                        <td> ' . $data[0][0]['VENCIMENTO'] . '</td>
                    </tr>
                    <tr>
                        <td>Total cuotas:</td>
                        <td>' . $data[0][0]['NCUOTA'] . '</td>
                    </tr>
                    <tr>
                        <td>Pago esta al día:</td>
                        <td> $' . $data[0][0]['PTOTALHOY'] . '</td>
                    </tr>
                    <tr>
                        <td>Plazos en meses:</td>
                        <td>' . $data[0][0]['PLAZMESES'] . '</td>
                    </tr>
                    <tr>
                        <td>Cuotas:</td>
                        <td>' . $data[0][0]['NCUOTA'] . '</td>
                    </tr>
                    <tr>
                        <td>Por mora:</td>
                        <td>---</td>
                    </tr>
                    <tr>
                        <td>Cuotas en mora:</td>
                        <td>' . $data[0][0]['NCUOTMORA'] . '</td>
                    </tr>
                </table>
            </div>
        </div>
        ';

        return $outData;
    }
}
