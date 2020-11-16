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
             * Ejercicio: 23. Construir un formulario para recoger un cuestionario realizado a una persona y mostrar en la misma página las preguntas 
             * y las respuestas recogidas; en el caso de que alguna respuesta esté vacía o errónea volverá a salir el formulario con el mensaje correspondiente..
             */

            if(!empty($_POST['nombre']) && !empty($_POST['apellido1']) && !empty($_POST['apellido2'])){
                $nombre = $_POST['nombre'];
                $apellido1 = $_POST['apellido1'];
                $apellido2 = $_POST['apellido2'];

                echo "Nombre: " . $nombre . "<br>";
                echo "Primer apellido: " . $apellido1 . "<br>";
                echo "Segundo apellido: " . $apellido2 . "<br>";
            }
            else{
        ?>
            
        <form name="input" action="<?php $_SERVER['PHP_SELF']?>" method="post">
            Nombre: <input type="text" name="nombre"/>
            <?php 
                if(isset($_POST['enviar']) && empty($_POST['nombre'])){
                    echo "<span style='color:red'> &lt;-- Debe introducir un nombre!!</span>";
                }
            ?><br>
            
            Primer apellido: <input type="text" name="apellido1"/>
            <?php 
                if(isset($_POST['enviar']) && empty($_POST['apellido1'])){
                    echo "<span style='color:red'> &lt;-- Debe introducir su primer apellido!!</span>";
                }
            ?><br>
            
            Segundo apellido: <input type="text" name="apellido2"/>
            <?php 
                if(isset($_POST['enviar']) && empty($_POST['apellido2'])){
                    echo "<span style='color:red'> &lt;-- Debe introducir su segundo apellido!!</span>";
                }
            ?><br>
            
            <input type="submit" value="Enviar" name="enviar"/>
        </form>
        
        <?php
            }
        ?>
    </body>
</html>