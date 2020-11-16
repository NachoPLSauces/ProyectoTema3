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
                 * Ejercicio: 10. Mostrar el contenido del fichero que se está ejecutando
                 */
                
                /* Mostrar contenido del fichero que se está ejecutando */
                echo "<h3>Contenido del fichero que se está ejecutando</h3>";
                //Acceso al valor del atributo SCRIPT_FILENAME de $_SERVER
                print highlight_file($_SERVER['SCRIPT_FILENAME']);
            ?>
        </p>
    </body>
</html>