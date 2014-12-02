
<!DOCTYPE html>
<head> 
    <title>
        Número secreto
    </title>
</head>
<body
<p> Contador de Accesos</p>

<?php

 $fecha_actual = date("d-m-Y H:i:s");
echo "La fecha actual es: $fecha_actual";
// cookie will expire when the browser closes
$value = "Miw";  
setcookie("myCookie", $value);

// cookie will expire in 1 hour
setcookie("myCookie", $value, time()+3600);

// cookie will expire in 1 hour, and will only be available
// within the php directory + all sub-directories of php
setcookie("myCookie", $value, time()+3600, "/php/");
?>  
<html>
<body>

</body>
</html>