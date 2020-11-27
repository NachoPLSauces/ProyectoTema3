<!DOCTYPE html>
<html>
    <head>
        <title>Ejercicios Tema 3</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    
    <body>
            <?php
                /*
                 * @author: Nacho del Prado Losada
                 * Fecha: 14/10/2020
                 * Ejercicio: 22. Construir un formulario para recoger un cuestionario realizado a una persona y mostrar 
                 * en la misma página las preguntas y las respuestas recogidas.
                 */
                
                 if(isset($_POST['enviar'])){
                    $nombre = $_POST['nombre'];
                    $apellido1 = $_POST['apellido1'];
                    $apellido2 = $_POST['apellido2'];

                    echo "<p>Nombre: " . $nombre . "</p>";
                    echo "<p>Primer apellido: " . $apellido1 . "</p>";
                    echo "<p>Segundo apellido: " . $apellido2 . "</p>";
                 }
                 else{
            ?>
            
        <form name="input" action="<?php $_SERVER['PHP_SELF']?>" method="post">
            Nombre: <input type="text" name="nombre"/><br>
            Primer apellido: <input type="text" name="apellido1"/><br>
            Segundo apellido: <input type="text" name="apellido2"/><br>
            <input type="submit" value="Enviar" name="enviar"/>
        </form>
        
        <?php
                 }
        ?>
    </body>
</html>