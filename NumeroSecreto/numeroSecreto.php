
<!DOCTYPE html>
<head> 
    <title>
        Número secreto
    </title>
</head>
<body>
    <p> Adivina el número secreto</p>
    <form action="numeroSecreto.php" method="get">
        Introduzca un número entre 0 y 100: <input type="text" name="numero" id="numero" size="10"><br>
        <input type="submit" value="Enviar">

    </form>
    <?php
    setcookie("myCookie", 1, 1, time() + 600);
    setcookie("numCookie", 1, time() + 600);
    if (filter_input(INPUT_SERVER, 'REQUEST_METHOD') === 'GET') {
        $fecha_actual = date("d-m-Y H:i:s");
        echo "<p> La fecha actual es: $fecha_actual</p>";
        $fechaExp = mktime(0, 0, 0, 1, 1, 2016);

      //  setcookie("numCookie", $numero, $fechaExp);
        if (!isset($_COOKIE['myCookie'])){
         echo $_COOKIE['numCookie'];
        }
        else $valor = $_COOKIE['myCookie'] + 1;
        echo "Ha realizado $valor intentos el número es: ";

        setcookie("myCookie", $valor, $fechaExp);
    }
    else {

        if (!isset($_COOKIE['numCookie'])) {
            $numero = rand(0, 100);
        }
    }
    ?>

</body>
</html>