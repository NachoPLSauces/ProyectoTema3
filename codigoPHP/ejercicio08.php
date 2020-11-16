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
                 * Ejercicio: 8. Mostrar la dirección IP del equipo desde el que estás accediendo.
                 */
                
                /* Mostrar IP */
                echo "<h3>Mostrar ip del equipo desde el que se accede</h3><p>";
                //Acceso al valor del atributo REMOTE_ADDR de $_SERVER
                echo "Tu IP es: {$_SERVER['REMOTE_ADDR']}</p>";
            ?>
        </p>
    </body>
</html>