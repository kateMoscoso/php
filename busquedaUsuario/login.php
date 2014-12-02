<?php

require 'config.php';
$este_script = $_SERVER['SCRIPT_NAME'];

if (filter_input(INPUT_SERVER, 'REQUEST_METHOD') === 'GET')
{
  $doc = <<< __MARCA_FIN
        <form action="$este_script" method="post">
            <label for="usuario">Usuario:</label>
            <input type="text" name="usuario" id="usuario" size="10"><br>
            <label for="pclave">Contrase&ntilde;a:</label>
            <input type="password" name="passwd" id="pclave" size="10"><br>
            <input type="submit" value="Enviar">
        </form>
__MARCA_FIN;
}
elseif (filter_input(INPUT_SERVER, 'REQUEST_METHOD') === 'POST')
{
    // Capturamos los datos del formulario
    $usuario = filter_input(INPUT_POST, 'usuario');
    $pclave  = filter_input(INPUT_POST, 'passwd');

    // Abrimos el fichero (o finaliza la ejecución del script :)
    $fichero = @fopen(FICH_USUARIOS, 'r') 
               or die("Imposible abrir fichero");

    // Procesamos cada línea
    $encontrado = false;
    while (($linea = fgets($fichero)) && !$encontrado) {
        // troceamos la línea
        $trozos = explode(SEPARADOR, trim($linea));

        if (($usuario == $trozos[0]) && ($pclave == $trozos[1])) {
            $encontrado = true;
        }
    }

    // Cerramos el fichero
    fclose($fichero);
    
    // Generamos el resultado
    if ($encontrado) {
      $doc = "Bienvenido <b>$usuario</b><br>\n";
    }
    else {
      $doc = "Nombre de usuario y/o contrase&ntilde;a incorrectos<br>";
      $doc .= "Pulse <a href='$este_script'>aqu&iacute;</a> para continuar...";
    }
   
    }
else
{
  die('ERROR: el método es incorrecto');
}

?>

<!DOCTYPE html>

<html>
<head>
  <title>[PHP] Entrada al Sistema</title>
</head>
  <body>

    <?= $doc ?>
        
  </body>
</html>

