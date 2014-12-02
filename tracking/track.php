<?php
  // Definimos el nombre del fichero de registro
  define('FICHERO_LOG', 'registro.txt');

  /**
   * Realiza el log del acceso al enlace
   * @param date $fecha Hora de la petición
   * @param type $IP_remota Dirección IP del cliente
   * @param type $URI_origen URI de origen
   * @param type $URI_destino URL de destino
   */
  function registro($fecha, $IP_remota, $URI_origen, $URI_destino)
  {
      $cadena = $fecha.' : '.$IP_remota.' : ';
      $cadena .= $URI_origen.' : '.$URI_destino."\r\n";
    // abrimos el fichero en modo append
    $fichero = @fopen(FICHERO_LOG, 'a') or
            die("No puedo abrir ".FICHERO_LOG);
      fwrite($fichero, $cadena);
      fclose($fichero);

      return TRUE;
  }

  // A trabajar!: registramos el acceso
  $fecha_actual = date("d-m-Y H:i:s");
  $IP_remota   = filter_input(INPUT_SERVER, 'REMOTE_ADDR');
  $URI_origen  = filter_input(INPUT_SERVER, 'HTTP_REFERER');
  $URI_destino = filter_input(INPUT_GET, 'url');
  if (!stristr($URI_destino, 'http://')) {
      $URI_destino = 'http://'.$URI_destino;
  }
  registro($fecha_actual, $IP_remota, $URI_origen, $URI_destino);

  // Generamos el campo Location de la cabecera
  header("Location: $URI_destino");
