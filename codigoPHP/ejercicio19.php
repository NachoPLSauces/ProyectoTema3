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
                 * @since: 14/10/2020
                 * Ejercicio: 19. Construir una librería de funciones de validación de campos de formularios 
                 * (LibreríaValidacionFormularios.php) para utilizarla en los siguientes ejercicios.
                 */
                
                /* Comprobar librerias */
                require '../core/libreriaCalculadora.php';
                
                echo "<h3>Uso de funciones creadas en un librería</h3>";
                
                /* Uso de librerías para realizar operaciones */
                echo "<p>Suma de 8 y 4 -> " . sumar(8, 4) . "</p>";
                echo "<p>Resta de 8 y 4 -> " . restar(8, 4) . "</p>";
                echo "<p>Multiplicación de 8 y 4 -> " . multiplicar(8, 4) . "</p>";
                echo "<p>División de 8 y 4 -> " . dividir(8, 4) . "</p>";
            ?>
        </p>
    </body>
</html>