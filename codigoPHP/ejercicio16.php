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
                 * Fecha: 12/10/2020
                 * Ejercicio: 16. Recorrer el array anterior utilizando funciones 
                 * para obtener el mismo resultado.
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
                
                while(key($dias)!=null){
                    $sueldoTotal += current($dias);
                    next($dias);
                }
                
                echo "<p>El sueldo total de la semana es: " . $sueldoTotal . "</p>"; 
            ?>
        </p>
    </body>
</html>