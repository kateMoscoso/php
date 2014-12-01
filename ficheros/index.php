<?php
print '<pre>';
$fp = fopen('datos.txt', 'r') or die ('No puedo abrir el fichero');
while ($linea = fgets($fp)) {
    print htmlentities($linea) ;
   
}
fclose($fp);
print '</pre>';
?>
