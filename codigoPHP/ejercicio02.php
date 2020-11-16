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
                 * @since: 06/10/2020
                 * Ejercicio: 2. Inicializar y mostrar una variable heredoc
                 */
                
                
                $prueba1 = <<<EOD
                    Esto es una prueba
                        para mostrar una variable heredoc.
                EOD;
                
                $numero = 4556.234;
                $prueba2 = <<<EOD
                        <br>Esto es un número -> $numero,
                        esto es otro heredoc -> $prueba1
                EOD;
                
                echo $prueba1;
                echo $prueba2;
            ?>
        </p>
    </body>
</html>



