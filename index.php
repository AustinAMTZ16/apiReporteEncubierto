<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB"
        crossorigin="anonymous"> -->

    <title>Reporte en cubierto</title>
</head>

<body>

    <div class="container my-5">
        <h1>Funcionalidades:</h1>
        <ul>
            <li><a href="/ReporteEncubierto/accesoReporteEncubierto.php">Acceso reporte encubierto</a></li>
            <li><a href="/ReporteEncubierto/catalogoSucursales.php">Catalogo sucursales</a></li>
            <li><a href="/ReporteEncubierto/catalogoTiposReporte.php">Catalogo tipos de reporte</a></li>
            <li><a href="/ReporteEncubierto/getAllReporteEncubierto.php">Listado reporte encubierto</a></li>
            <li><a href="/ReporteEncubierto/insertReporteEncubierto.php">Crear reporte en cubierto</a></li>
            <li><a href="/ReporteEncubierto/updateReporteEncubierto.php">Modificar reporte en cubierto</a></li>     
            <li><a href="/ReporteEncubierto/deleteReporteEncubierto.php">Eliminar el reporte</a></li>
        </ul>
    </div>

    <script>
        const d = document,
        $form = d.querySelector(".crud-form");

        const ajax = (options) => {
            let {url, method, success, error, data} = options;
            const xhr = new XMLHttpRequest();

            xhr.addEventListener("readystatechange", e =>{
                if(xhr.readyState !== 4)return;

                if(xhr.status >= 200 && xhr.status < 300) {
                    let json = JSON.parse(xhr.responseText);
                    success(json);

                }else{
                    let message = xhr.statusText || "Ocurrio un error";
                    error(`Error ${xhr.status}: ${message}`);
                }
            });

            xhr.open(method || "GET", url);

            xhr.setRequestHeader("Content-type","application/json; charset=utf-8");
            xhr.send(JSON.stringify(data));
            
        }

       d.addEventListener("submit", e => {
            if(e.target === $form) {
                e.preventDefault();
                if(!e.target.id.value) {
                    //Create POST
                    ajax({
                        url: "https://leadapi.institutok29.com/prospecto/agregar.php",
                        method: "POST",
                        success: (res) => location.reload(),
                        error: () => $form.insertAdjacentHTML("aftered", `<p><b>${err}</b></p>`),
                        data:{
                            nombre:e.target.nombre.value,
                            apellidoPaterno:e.target.apellidoPaterno.value,
                            apellidoMaterno:e.target.apellidoMaterno.value,
                            telefono:e.target.telefono.value,
                            correo:e.target.correo.value,
                            asunto:e.target.asunto.value,
                            mensaje:e.target.mensaje.value,
                            dominioOrigen:e.target.dominioOrigen.value,
                            giroDominio:e.target.giroDominio.value,
                            categoriaProspecto:e.target.categoriaProspecto.value,
                            estadoSistema:e.target.estadoSistema.value,
                            conversacion:e.target.conversacion.value
                        }

                    });
                }else{
                    //Update PUT
                }
            }
       });
    </script>

</body>

</html>