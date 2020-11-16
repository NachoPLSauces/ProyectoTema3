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
                 * Ejercicio: 1. Inicializar variables de los distintos tipos de datos básicos(string, int, float, bool) y mostrar los datos por pantalla 
                 * (echo, print, printf, print_r,var_dump).
                 */
                //Rellenar variables de los distintos tipos para mostrar
                $cadena = "Hola";
                $entero = 2;
                $decimal = 3.14;
                $logico = true;
                
                //Mostrar variables con echo
                echo "Se muestran las variables con 'echo':<br>";
                echo "Variable tipo string -> $cadena<br>";
                echo "Variable tipo int -> $entero<br>";
                echo "Variable tipo float -> $decimal<br>";
                echo "Variable tipo boolean -> $logico<br>";
                
                echo "<br><br>";
                
                //Mostrar variables con print
                echo "Se muestran las variables con 'print':<br>";
                print "Variable tipo string -> $cadena<br>";
                print "Variable tipo int -> $entero<br>";
                print "Variable tipo float -> $decimal<br>";
                print "Variable tipo boolean -> $logico<br>";
                
                echo "<br><br>";
                
                //Mostrar variables formateando la salida con printf
                echo "Se muestran las variables con 'printf':<br>";
                printf ("Variable tipo string -> %s<br>", $cadena);
                printf ("Variable tipo int -> %d<br>", $entero);
                printf ("Variable tipo float -> %f<br>", $decimal);
                printf ("Variable tipo boolean -> %s<br>", $logico);
                 
                echo "<br><br>";
                
                //Mostrar las variables con print_r
                echo "Se muestran las variables con 'print_r':<br>";
                print_r ("Variable tipo string -> $cadena<br>");
                print_r ("Variable tipo int -> $entero<br>");
                print_r ("Variable tipo float -> $decimal<br>");
                print_r ("Variable tipo boolean -> $logico<br>");
                 
                echo "<br><br>";
                
                //Mostrar variables con var_dump
                echo "Se muestran las variables con 'var_dump':<br>";
                var_dump ("Variable tipo string -> $cadena<br>");
                var_dump ("Variable tipo int -> $entero<br>");
                var_dump ("Variable tipo float -> $decimal<br>");
                var_dump ("Variable tipo boolean -> $logico<br>");
            ?>
        </p>
    </body>
</html>


