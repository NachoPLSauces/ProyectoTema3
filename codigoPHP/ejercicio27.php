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
             * @since: 29/10/2020
             * Ejercicio: 27.(Aplicación de recogida de datos y análisis de resultados) podamos utilizar para recoger las respuestas 
             * auna encuesta de varias preguntas realizada a 3-5 personas, el usuario de la página web tecleará lasrespuestas y 
             * recibirá como respuesta un resumen con algún tipo de calculo, resumen o tratamiento sobrelas respuestas a al encuesta.
             * Entre las respuestas tienen que haber, respuestas textuales, respuestas si/no, fechas, números enteros,números 
             * decimales,...
             */
            //Llamada a la librería de validación
            require_once '../core/201020libreriaValidacion.php';
            
            //Variable obligatorio inicializada a 1
            define("OBLIGATORIO", 1);
            
            //Varible de entrada correcta inicializada a true
            $entradaOK = true;           
            
            //Con un for se recorren 3 veces el array de errores y el array de respuestas
            for($formulario=1;$formulario<=3;$formulario++){
                //Array de errores inicializado a null
                $aErrores[$formulario] = ["nombre".$formulario => null,
                             "apellido1".$formulario => null,
                             "apellido2".$formulario => null,
                             "email".$formulario => null,
                             "fecha".$formulario => null,
                             "dni".$formulario => null,
                             "codigoPostal".$formulario => null,
                             "password".$formulario => null,
                             "confirmarPassword".$formulario => null];

                //Array de respuestas inicializado a null
                $aRespuestas[$formulario] = ["nombre".$formulario => null,
                             "apellido1".$formulario => null,
                             "apellido2".$formulario => null,
                             "email".$formulario => null,
                             "fecha".$formulario => null,
                             "dni".$formulario => null,
                             "codigoPostal".$formulario => null,
                             "password".$formulario => null,
                             "confirmarPassword".$formulario => null];

            }
            if(isset($_REQUEST['enviar'])){
                
                //Recorrer el array de errores 3 veces
                for($formulario=1;$formulario<=3;$formulario++){
                    //Comprobar que el campo nombre se ha rellenado con alfabéticos
                    $aErrores[$formulario]["nombre".$formulario] = validacionFormularios::comprobarAlfabetico($_REQUEST['nombre'.$formulario], 200, 1, OBLIGATORIO);
                    
                    //Comprobar que el campo apellido1 se ha rellenado con alfabéticos
                    $aErrores[$formulario]["apellido1".$formulario] = validacionFormularios::comprobarAlfabetico($_REQUEST['apellido1'.$formulario], 200, 1, OBLIGATORIO);
                    
                    //Comprobar que el campo apellido2 se ha rellenado con alfabéticos
                    $aErrores[$formulario]["apellido2".$formulario] = validacionFormularios::comprobarAlfabetico($_REQUEST['apellido2'.$formulario], 200, 1, OBLIGATORIO);
                    
                    //Comprobar que el campo email se ha rellenado con un email con formato correcto
                    $aErrores[$formulario]["email".$formulario] = validacionFormularios::validarEmail($_REQUEST['email'.$formulario], OBLIGATORIO);
                    
                    //Comprobar que el campo fecha se ha rellenado con una fecha correcta
                    $aErrores[$formulario]["fecha".$formulario] = validacionFormularios::validarFecha($_REQUEST['fecha'.$formulario], "01/01/2200", "01/01/1900", OBLIGATORIO);
                    
                    //Comprobar que el campo dni se ha rellenado con un dni correcto
                    $aErrores[$formulario]["dni".$formulario] = validacionFormularios::validarDni($_REQUEST['dni'.$formulario], OBLIGATORIO);
                    
                    //Comprobar que el campo codigoPostal se ha rellenado con un código postal correcto
                    $aErrores[$formulario]["codigoPostal".$formulario] = validacionFormularios::validarCp($_REQUEST['codigoPostal'.$formulario], OBLIGATORIO);
                    
                    //Comprobar que el campo password se ha rellenado con una contraseña válida
                    $aErrores[$formulario]["password".$formulario] = validacionFormularios::validarPassword($_REQUEST['password'.$formulario], 5, OBLIGATORIO);
                    
                    //Comprobar que el campo password se ha rellenado con una contraseña válida
                    $aErrores[$formulario]["confirmarPassword".$formulario] = validacionFormularios::confirmarPassword($_REQUEST['confirmarPassword'.$formulario], $_REQUEST['password'.$formulario], OBLIGATORIO);
                }
                
                //Comprobar si algún campo del array de errores ha sido rellenado
                foreach ($aErrores as $clave => $valor) {
                    //Comprobar si el campo ha sido rellenado
                    if($valor!=null){
                        $_REQUEST[$clave] = "";
                        $entradaOK = false;
                    }
                }
                
                
            }
            else{
                $entradaOK = false;
            }
            
            if($entradaOK){
                //Si los datos han sido introducidos correctamente
                
                for($formulario=1;$formulario<=3;$formulario++){
                    $aRespuestas[$formulario] = ["nombre".$formulario => $_REQUEST['nombre'.$formulario],
                                    "apellido1".$formulario => $_REQUEST['apellido1'.$formulario],
                                    "apellido2".$formulario => $_REQUEST['apellido2'.$formulario],
                                    "email".$formulario => $_REQUEST['email'.$formulario],
                                    "fecha".$formulario => $_REQUEST['fecha'.$formulario],
                                    "dni".$formulario => $_REQUEST['dni'.$formulario],
                                    "codigoPostal".$formulario => $_REQUEST['codigoPostal'.$formulario],
                                    "password".$formulario => $_REQUEST['password'.$formulario],
                                    "confirmarPassword".$formulario => $_REQUEST['confirmarPassword'.$formulario]
                                    ];
                }
                
                //Mostrar datos de cada usuario
                for($formulario=1;$formulario<=3;$formulario++){
                    echo "<h3>Datos del usuario $formulario introducidos correctamente.</h3>";
                    echo "Nombre: " . $aRespuestas[$formulario]['nombre'.$formulario] . "<br>";
                    echo "Primer apellido: " . $aRespuestas[$formulario]['apellido1'.$formulario] . "<br>";
                    echo "Segundo apellido: " . $aRespuestas[$formulario]['apellido2'.$formulario] . "<br>";
                    echo "Correo electrónico: " . $aRespuestas[$formulario]['email'.$formulario] . "<br>";
                    echo "Fecha: " . $aRespuestas[$formulario]['fecha'.$formulario] . "<br>";
                    echo "DNI: " . $aRespuestas[$formulario]['dni'.$formulario] . "<br>";
                    echo "Código postal: " . $aRespuestas[$formulario]['codigoPostal'.$formulario] . "<br>";
                    echo "Contraseña: " . $aRespuestas[$formulario]['password'.$formulario] . "<br>";
                }
            }
            else{
        ?>
            
        <form name="input" action="<?php $_SERVER['PHP_SELF']?>" method="post">
            <?php
                for($formulario=1;$formulario<=3;$formulario++){
            ?>
            <fieldset style="width: 30%;float:left;">
                <legend>Rellene el formulario del usuario <?php echo $formulario; ?></legend>
                <div>
                    <p>Nombre: </p>
                    <input type="text" name="nombre" placeholder="Nombre" value="<?php 
                        //Devuelve el campo nombre si se había introducido correctamente
                        if(isset($_REQUEST['nombre'.$formulario]) && $aErrores[$formulario]["nombre".$formulario] == null){
                            echo $_REQUEST['nombre'.$formulario];
                        }
                    ?>"/>
                    
                    <span style="color:red">
                        <?php
                        //Imprime el error en el caso de que se introduzca mal el nombre
                        if($aErrores[$formulario]["nombre".$formulario] != null){
                            echo $aErrores[$formulario]['nombre'.$formulario];
                        }
                        ?> 
                    </span>
                     
                </div>

                <div>
                    <p>Apellido 1: </p>
                    <input type="text" name="apellido1" placeholder="Primer apellido" value="<?php 
                        //Devuelve el campo apellido1 si se había introducido correctamente
                        if(isset($_REQUEST['apellido1'.$formulario]) && $aErrores[$formulario]["apellido1".$formulario] == null){
                            echo $_REQUEST['apellido1'.$formulario];
                        }
                    ?>"/>
                    
                    <span style='color:red'>
                        <?php
                        //Imprime el error en el caso de que se introduzca mal el apellido1
                        if($aErrores[$formulario]["apellido1".$formulario] != null){
                            echo $aErrores[$formulario]['apellido1'.$formulario];
                        }
                        ?> 
                    </span>
                     
                </div>

                <div>
                    <p>Apellido 2: </p>
                    <input type="text" name="apellido2" placeholder="Segundo apellido" value="<?php 
                        //Devuelve el campo apellido2 si se había introducido correctamente
                        if(isset($_REQUEST['apellido2'.$formulario]) && $aErrores[$formulario]["apellido2".$formulario] == null){
                            echo $_REQUEST['apellido2'.$formulario];
                        }
                    ?>"/>
                    
                    <span style='color:red'>
                        <?php
                        //Imprime el error en el caso de que se introduzca mal el apellido2
                        if($aErrores[$formulario]["apellido2".$formulario] != null){
                            echo $aErrores[$formulario]['apellido2'.$formulario];
                        }
                        ?> 
                    </span>
                     
                </div>
                
                <div>
                    <p>Correo electrónico: </p>
                    <input type="text" name="email" placeholder="nombre@gmail.com" value="<?php 
                        //Devuelve el campo email si se había introducido correctamente
                        if(isset($_REQUEST['email'.$formulario]) && $aErrores[$formulario]["email".$formulario] == null){
                            echo $_REQUEST['email'.$formulario];
                        }
                    ?>"/>
                    
                    <span style='color:red'>
                        <?php
                        //Imprime el error en el caso de que se introduzca mal el email
                        if($aErrores[$formulario]["email".$formulario] != null){
                            echo $aErrores[$formulario]['email'.$formulario];
                        }
                        ?> 
                    </span>
                     
                </div>

                <div>
                    <p>Fecha: </p>
                    <input type="text" name="fecha" placeholder="Formato (2000-01-01)" value="<?php 
                        //Devuelve el campo fecha si se había introducido correctamente
                        if(isset($_REQUEST['fecha'.$formulario]) && $aErrores[$formulario]["fecha".$formulario] == null){
                            echo $_REQUEST['fecha'.$formulario];
                        }
                    ?>"/>
                    
                    <span style='color:red'>
                        <?php
                        //Imprime el error en el caso de que se introduzca mal la fecha
                        if($aErrores[$formulario]["fecha".$formulario] != null){
                            echo $aErrores[$formulario]['fecha'.$formulario];
                        }
                        ?> 
                    </span>
                     
                </div>

                <div>
                    <p>DNI: </p>
                    <input type="text" name="dni" placeholder="12345678X" value="<?php 
                        //Devuelve el campo dni si se había introducido correctamente
                        if(isset($_REQUEST['dni'.$formulario]) && $aErrores[$formulario]["dni".$formulario] == null){
                            echo $_REQUEST['dni'.$formulario];
                        }
                    ?>"/>
                    
                    <span style='color:red'>
                        <?php
                        //Imprime el error en el caso de que se introduzca mal el dni
                        if($aErrores[$formulario]["dni".$formulario] != null){
                            echo $aErrores[$formulario]['dni'.$formulario];
                        }
                        ?> 
                    </span>
                     
                </div>
                
                <div>
                    <p>Código postal: </p>
                    <input type="text" name="codigoPostal" placeholder="Código postal" value="<?php 
                        //Devuelve el campo dni si se había introducido correctamente
                        if(isset($_REQUEST['codigoPostal'.$formulario]) && $aErrores[$formulario]["codigoPostal".$formulario] == null){
                            echo $_REQUEST['codigoPostal'.$formulario];
                        }
                    ?>"/>
                    
                    <span style='color:red'>
                        <?php
                        //Imprime el error en el caso de que se introduzca mal el dni
                        if($aErrores[$formulario]["codigoPostal".$formulario] != null){
                            echo $aErrores[$formulario]['codigoPostal'.$formulario];
                        }
                        ?> 
                    </span>
                     
                </div>
                
                <div>
                    <p>Contraseña: </p>
                    <input type="password" name="password" placeholder="Introduzca una contraseña" value="<?php 
                        //Devuelve el campo dni si se había introducido correctamente
                        if(isset($_REQUEST['password'.$formulario]) && $aErrores[$formulario]["password".$formulario] == null){
                            echo $_REQUEST['password'.$formulario];
                        }
                    ?>"/>
                    
                    <span style='color:red'>
                        <?php
                        //Imprime el error en el caso de que se introduzca mal el dni
                        if($aErrores[$formulario]["password".$formulario] != null){
                            echo $aErrores[$formulario]['password'.$formulario];
                        }
                        ?> 
                    </span>
                     
                </div>

                <div>
                    <p>Confirmar contraseña: </p>
                    <input type="password" name="confirmarPassword" placeholder="Introduzca de nuevo la contraseña" value="<?php 
                        //Devuelve el campo dni si se había introducido correctamente
                        if(isset($_REQUEST['confirmarPassword'.$formulario]) && $aErrores[$formulario]["confirmarPassword".$formulario] == null){
                            echo $_REQUEST['confirmarPassword'.$formulario];
                        }
                    ?>"/>
                    
                    <span style='color:red'>
                        <?php
                        //Imprime el error en el caso de que se introduzca mal el dni
                        if($aErrores[$formulario]["confirmarPassword".$formulario] != null){
                            echo $aErrores[$formulario]['confirmarPassword'.$formulario];
                        }
                        ?> 
                    </span>
                     
                </div>
            </fieldset>
            
            <?php
                }
            ?>
            <br>
            <fieldset>
                <legend>Envíe los datos introducidos</legend>
                <input type="submit" value="Enviar" name="enviar"/>
                <input type="reset" value="Borrar"/>
            </fieldset>
        </form>
        
        <?php
            }
        ?>
    </body>
</html>