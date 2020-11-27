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
                 * Ejercicio: 9. Mostrar el path donde se encuentra el fichero que se está ejecutando.
                 */
                
                /* Mostrar fichero que se está ejecutando */
                echo "<h3>Fichero que se está ejecutando</h3><p>";
                //Acceso al valor del atributo SCRIPT_FILENAME de $_SERVER
                echo "Path del fichero: {$_SERVER['SCRIPT_FILENAME']}</p>";
            ?>
        </p>
    </body>
</html>