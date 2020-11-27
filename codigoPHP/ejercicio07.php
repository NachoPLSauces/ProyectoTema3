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
                 * Ejercicio: 7. Mostrar el nombre del fichero que se está ejecutando
                 */
                
                /* Mostrar nombre del fichero */
                echo "<h3>Mostrar el nombre del fichero que se está ejecutando</h3><p>";
                //__FILE__ devuelve la ruta completa del fichero. Utilizando basename, devuelve solo el nombre del fichero
                $fichero = basename(__FILE__);
                echo $fichero;
            ?>
        </p>
    </body>
</html>