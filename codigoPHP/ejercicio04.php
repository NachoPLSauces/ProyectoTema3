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
                 * @since: 07/10/2020
                 * Ejercicio: 4. Mostrar en tu página index la fecha y hora actual en Oporto formateada en portugués.
                 */
                
                /* Fecha y hora formateadas */
                echo "<h3>Mostrar fecha y hora con format</h3><p>";
                //Creación de un objeto DateTime estableciendo su zona horaria en Europa/Lisboa
                $fecha = new DateTime("now", new DateTimeZone('Europe/Lisbon'));
                echo $fecha->format('Y-m-d, h:i:s') . "</p>";
                
                /* Timestamp */
                echo "<h3>Mostrar timestamp con getTimestamp()</h3><p>";
                echo $fecha->getTimestamp() . "</p>";
                
                echo "<h3>Mostrar timestamp y fecha con format</h3><p>";
                echo $fecha->format('U = Y-m-d, h:i:s') . "</p>";
                
                /* Cambiar fecha con Timestamp */
                echo "<h3>Fecha cambiando el timestamp</h3><p>";
                date_timestamp_set($fecha, 1189395432);
                echo $fecha->format('U = Y-m-d, h:i:s') . "</p>";
            ?>
        </p>
    </body>
</html>




