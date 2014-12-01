<html>
<?php
print '<table>';
print '<tr><td> Clave </td><td>Valor</td> </tr>';
$servidor = array('clave1' => 3,'clave2' => 3,'clave3' => 3,'clave4' => 3);
foreach ($servidor as $clave => $valor) {
    echo "<tr><td> $clave </td><td>$valor</td> </tr>\n";
}
print '</table>';
?>
</html>