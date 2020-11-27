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
                 * Ejercicio: 5. Inicializar y mostrar una variable que tiene una marca de tiempo (timestamp)
                 */
                
                /* Fecha y hora formateadas */
                echo "<h3>Mostrar fecha sin cambiar timestamp</h3><p>";
                $fecha = new DateTime();
                echo $fecha->format('Y-m-d, h:i:s') . "</p>";
            
                /* Timestamp */
                echo "<h3>Mostrar fecha cambiando timestamp</h3><p>";
                date_timestamp_set($fecha, 1189395432);
                echo $fecha->getTimestamp() . "</p>";
                echo $fecha->format('Y-m-d, h:i:s') . "</p>";
                
                echo "<h3>Mostrar timestamp del 12 de octubre de 1492</h3><p>";
                date_date_set($fecha, 1492, 9, 12);
                echo $fecha->format('Y-m-d') . "</p>";
                echo $fecha->getTimestamp() . "</p>";
            ?>
        </p>
    </body>
</html>