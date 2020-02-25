
    let latitud = 0;
    let longitud = 0;

    //Si el navegador soporta geolocalizacion
    if (!!navigator.geolocation) {
        //Pedimos los datos de geolocalizacion al navegador
        navigator.geolocation.getCurrentPosition(
            //Si el navegador entrega los datos de geolocalizacion los imprimimos
            function (position) {
                latitud = position.coords.latitude;
                longitud = position.coords.longitude
            },
            //Si no los entrega manda un alerta de error
            function () {
                console.log('Ubicación no se pudo determinar');

            }
        );
    }

    console.log(latitud);
    console.log(longitud);
    