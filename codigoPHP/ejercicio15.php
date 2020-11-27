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
                 * Ejercicio: 15. Crear e inicializar un array con el sueldo percibido 
                 * de lunes a domingo. Recorrer el array para calcular el sueldo 
                 * percibido durante la semana. (Array asociativo con los nombres de los 
                 * días de la semana).
                 */
                
                /* Inicializar array */
                $dias = [
                    "Lunes" => 25, 
                    "Martes" => 30, 
                    "Miércoles" => 15,
                    "Jueves" => 18, 
                    "Viernes" => 25, 
                    "Sabado" => 40,
                    "Domingo" => 0
                    ];
                
                /* Recorrer array */
                $sueldoTotal = 0;
                
                foreach ($dias as $dia => $sueldo) {
                    print_r ($dia . ": " . $sueldo . "<br>");
                    $sueldoTotal += $sueldo;
                }
                
                echo "<p>El sueldo total de la semana es: " . $sueldoTotal . "</p>";
                
            ?>
        </p>
    </body>
</html>