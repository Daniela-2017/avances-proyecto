<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Administrador</title>
  <link rel="shortcut icon" type="image/png" href="img/cliente.png">
  <link rel="stylesheet" href="BootstrapCSS/bootstrap.min.css">
  <link href="BootstrapCSS/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="master.css">
</head>

<body>
  <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top" style="background-color:#255eb3 !important;">

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault"
      aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
      <form class="form-inline my-2 my-lg-0 ml-auto">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#formulario-actualizar-admin">
          Editar Perfil
        </button>
      </form>
    </div>
  </nav>

  <div class="admin">
    <h1 align="center">Administrador</h1>
    <form>
      <div>
        <button type="button" style="margin: 8px;background-color: blue;color: antiquewhite;font-size: larger;">Ver Empresas Registradas</button>

      </div>
    </form>
  </div>

  <!--navbar para actualizar datos de administrador-->

  <div class="modal fade" id="formulario-actualizar-admin" style="color: aliceblue" ; tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content modals">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Actualizar Administrador</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <?php
          $contenidoArchivo=file_get_contents('administrador.json');
          $administrador=json_decode($contenidoArchivo,true);
          for ($i=0; $i <  sizeof($administrador); $i++) { //buscar el indice del arreglo en el archivo donde esta ubicado el registro
            if ($administrador[$i]['correo']==$_GET['id']) {
              $indice=$i;
        }
    } 
          $nombre=$_GET['nombre'];
          $apellido=$_GET['apellido'];
          $pais=$_GET['pais'];
          $direccion=$_GET['direccion'];
          $id=$_GET['id'];
          $clave=$_GET['clave'];
          $claveConf=$_GET['claveconf'];

    echo "
      <form onsubmit='return validarAdminNuevo();' action='procesarAdmin.php' method='POST'>
        <div class='modal-body'>
          <input value=$indice name='indice' style='display:none'>
          <div>

              <input class='form-control ActualizarAdmin' type='text' id='primerNombreAdmin-nuevo' value='$nombre' placeholder='Primer Nombre' name='primerNombre'>
                <div class='valid-feedback' style='text-align:right'>Ok</div>
                <div class='invalid-feedback' style='text-align:right; margin-bottom:9px'>
                  campo no válido
                </div>
          </div>
          <br>
        <div>
            <input class='form-control ActualizarAdmin' type='text' id='primeroApellidoAdmin-nuevo' placeholder='Primer Apellido' value='$apellido' name='primerApellido'>
                <div class='valid-feedback' style='text-align:right'>Ok</div>
                <div class='invalid-feedback' style='text-align:right; margin-bottom:9px'>
                  campo no válido
                </div>
        </div>
          <br>
        <div>
          <input class='form-control ActualizarAdmin' type='text' id='identidadAdmin' placeholder='Escriba su País de Origen' name='pais' value='$pais'>
                <div class='valid-feedback' style='text-align:right'>Ok</div>
                <div class='invalid-feedback' style='text-align:right; margin-bottom:9px'>
                  campo no válido
                </div>
        </div>
          <br>
        <div>
          <textarea class='form-control ActualizarAdmin' style='width:-moz-available' id='direccionAdmin-nuevo' name='direccion' placeholder='Escriba aquí la Dirección'
            rows='3' cols='20'>$direccion</textarea>
                <div class='valid-feedback' style='text-align:right'>Ok</div>
                <div class='invalid-feedback' style='text-align:right; margin-bottom:9px'>
                  campo no válido
                </div>
        </div>
          <br>

          <div class='form-row align-items-center'>
            <div class='input-group'>
              <div class='input-group-prepend' style='height: 40px'>
                <div class='input-group-text'>@</div>
                <input type='text' id='correo-nuevo-admin' class='form-control ActualizarAdmin' name='correo' placeholder='Escriba el correo electrónico' value='$id'
                  style='width:-moz-available'>
                <div class='valid-feedback' style='text-align:right'>Ok</div>
                <div class='invalid-feedback' style='text-align:right; margin-bottom:9px'>
                  Correo no válido
                </div>
              </div>
            </div>

          </div>
          <br>
          <div>
            <input type='password' id='ClaveAdmin-nueva' class='form-control ActualizarAdmin' placeholder='Escriba una contraseña segura'
              style='width:-moz-available' value='$clave' name='clave'>
            <div class='valid-feedback' style='text-align:right'>Ok</div>
            <div class='invalid-feedback' style='text-align:right; margin-bottom:9px'>
              Las contraseñas no coinciden
            </div>
          </div>
          <br>
          <div>
            <input type='password' value='$claveConf' name='claveConfirmacion' id='ConfirmacionAdmin-nueva' class='form-control ActualizarAdmin' placeholder='Confirme su Contraseña'
              style='width:-moz-available; margin-left:auto'>
          </div>
        </div>
        <div class='modal-footer'>
          <button type='button' class='btn btn-secondary' data-dismiss='modal'>Cancelar</button>
          <button id='btn-guardar' type='submit' class='btn btn-primary' >Guardar Cambios</button>
        </div>
      </div>
    </div>
  </div>
</form>"
?>
</body>
<script src="jquery/jquery-3.4.1.min.js"></script>
<script src="popper/popper.min.js"></script>
<script src="BootstrapJS/bootstrap.min.js"></script>
<script src="BootstrapJS/all.js"></script>
<script src="controlador.js"></script>

</html>