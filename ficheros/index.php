<?php
print '<pre>';
$fp = fopen('datos.txt', 'r') or die ('No puedo abrir el fichero');
$fw = fopen('datos2.txt', 'w') or die ('No puedo abrir el fichero');
while ($linea = fgets($fp)) {
    print htmlentities($linea) ;
    fwrite($fw, $linea);
   
}
fclose($fw);
fclose($fp);
print '</pre>';
?>
