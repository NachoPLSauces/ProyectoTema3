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
                 * Ejercicio: 6. Operar con fechas: calcular la fecha y el día de la semana de dentro de 60 días
                 */
                
                /* Fecha y hora formateadas */
                echo "<h3>Mostrar fecha</h3><p>";
                $fecha = new DateTime();
                echo $fecha->format('Y-m-d, h:i:s') . "</p>";
            
                /* Suma */
                echo "<h3>Mostrar fecha dentro de 60 días</h3><p>";
                $sumaFecha = new DateInterval(P60D);
                date_add($fecha, $sumaFecha);
                echo $fecha->format('Y-m-d, h:i:s') . "</p>";
            ?>
        </p>
    </body>
</html>