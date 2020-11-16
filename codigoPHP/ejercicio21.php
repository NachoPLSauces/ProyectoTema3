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
                 * @since: 14/10/2020
                 * Ejercicio: 21. Construir un formulario para recoger un cuestionario realizado a una persona y enviarlo a una página 
                 * Tratamiento.php para que muestre las preguntas y las respuestas recogidas
                 */
                
              
            ?>
            
        <form name="input" action="./tratamiento.php" method="post">
            Nombre: <input type="text" name="nombre"/><br>
            Primer apellido: <input type="text" name="apellido1"/><br>
            Segundo apellido: <input type="text" name="apellido2"/><br>
            <input type="submit" value="Enviar"/>
        </form>
    </body>
</html>