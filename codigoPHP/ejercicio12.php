<!DOCTYPE html>
<html>
    <head>
        <title>Ejercicios Tema 3</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    
    <body>
        <p>
            <?php
                /*
                 * @author: Nacho del Prado Losada
                 * @since: 12/10/2020
                 * Ejercicio: 12. Mostrar el contenido de las variables superglobales (utilizando print_r() y foreach()).
                 */
                
                /* Mostrar contenido de las variables superglobales */
                echo "<h3>Contenido de \$_COOKIE</h3><p>";
                foreach ($_COOKIE as $clave => $valor){
                    print_r($clave . ": " . $valor . "<br>");
                }
                
                echo "<h3>Contenido de \$_ENV</h3><p>";
                foreach ($_ENV as $clave => $valor){
                    print_r($clave . ": " . $valor . "<br>");
                }
                
                echo "<h3>Contenido de \$_FILES</h3><p>";
                foreach ($_FILES as $clave => $valor){
                    print_r($clave . ": " . $valor . "<br>");
                }
                
                echo "<h3>Contenido de \$_GET</h3><p>";
                foreach ($_GET as $clave => $valor){
                    print_r($clave . ": " . $valor . "<br>");
                }
                
                echo "<h3>Contenido de \$_POST</h3><p>";
                foreach ($_POST as $clave => $valor){
                    print_r($clave . ": " . $valor . "<br>");
                }
                echo "<h3>Contenido de \$_REQUEST</h3><p>";
                foreach ($_REQUEST as $clave => $valor){
                    print_r($clave . ": " . $valor . "<br>");
                }
                
                echo "<h3>Contenido de \$_SERVER</h3><p>";
                foreach ($_SERVER as $clave => $valor){
                    print_r($clave . ": " . $valor . "<br>");
                }
                
                echo "<h3>Contenido de \$_SESSION</h3><p>";
                foreach ($_SESSION as $clave => $valor){
                    print_r($clave . ": " . $valor . "<br>");
                }
                
            ?>
        </p>
    </body>
</html>