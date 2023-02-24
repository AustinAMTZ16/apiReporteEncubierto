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
            <li><a href="/prospecto/seleccionar.php">Catalogo sucursales</a></li>
            <li><a href="/prospecto/seleccionar.php">Catalogo tipos de reporte</a></li>
            <li><a href="/prospecto/agregar.php">Crear reporte en cubierto</a></li>
            <li><a href="/prospecto/eliminar.php">Modificar reporte en cubierto</a></li>     
            <li><a href="/apiProspecto/prospecto/editar.php">Cambiar de estado el reporte</a></li>
            <li><a href="/apiProspecto/prospecto/editar.php">Eliminar el reporte</a></li>
        </ul>
    </div>

    <!-- <div class="container my-5">
        <h2>Formulario API</h2>
        <form class="crud-form">
            <input type="text" name="nombre" placeholder="Ingresa nombre" class="form-control my-3" required>
            <input type="text" name="apellidoPaterno" placeholder="Ingresa apellidoPaterno" class="form-control my-3" required>
            <input type="text" name="apellidoMaterno" placeholder="Ingresa apellidoMaterno" class="form-control my-3" required>
            <input type="text" name="telefono" placeholder="Ingresa telefono" class="form-control my-3" required>
            <input type="email" name="correo" placeholder="Ingresa correo" class="form-control my-3" required>
            <input type="text" name="asunto" placeholder="Ingresa asunto" class="form-control my-3" required>
            <input type="text" name="mensaje" placeholder="Ingresa mensaje" class="form-control my-3" required>
            <input type="text" name="dominioOrigen" placeholder="Ingresa dominioOrigen" class="form-control my-3" required>
            <input type="text" name="giroDominio" placeholder="Ingresa giroDominio" class="form-control my-3" required>
            <input type="text" name="categoriaProspecto" placeholder="Ingresa categoriaProspecto" class="form-control my-3" required>
            <input type="text" name="estadoSistema" placeholder="Ingresa estadoSistema" class="form-control my-3" required>
            <input type="text" name="conversacion" placeholder="Ingresa conversacion" class="form-control my-3" required>
           
            <input class="btn btn-primary" type="submit" value="Enviar">
            <input type="hidden" name="id">
        </form>
    </div> -->
   

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" 
        crossorigin="anonymous">
    </script>-->
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