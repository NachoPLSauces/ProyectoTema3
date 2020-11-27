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
             * @since: 22/10/2020
             * @description: 25. Trabajar en PlantillaFormulario.php mi plantilla para hacer formularios como churros.
             */
            //Llamada a la librería de validación
            require_once '../core/201020libreriaValidacion.php';
            
            //Array de errores inicializado a null
            $aErrores = ["alfabetico" => null,
                         "alfanumerico" => null,
                         "entero" => null,
                         "float" => null,
                         "email" => null,
                         "url" => null,
                         "fecha" => null,
                         "dni" => null,
                         "codigoPostal" => null,
                         "password" => null,
                         "telefono" => null];
            
            //Variable obligatorio inicializada a 1
            define("OBLIGATORIO", 1);
            
            //Varible de entrada correcta inicializada a true
            $entradaOK = true;           
            
            //Array de respuestas inicializado a null
            $aRespuestas = ["nombre" => null,
                         "apellido1" => null,
                         "apellido2" => null,
                         "email" => null,
                         "fecha" => null,
                         "dni" => null,
                         "codigoPostal" => null,
                         "password" => null
                        ];
            
            if(isset($_REQUEST['enviar'])){
                //Comprobar que el campo nombre se ha rellenado con alfabéticos
                $aErrores["nombre"] = validacionFormularios::comprobarAlfabetico($_REQUEST['nombre'], 200, 1, OBLIGATORIO);
                //Comprobar que el campo apellido1 se ha rellenado con alfabéticos
                $aErrores["apellido1"] = validacionFormularios::comprobarAlfabetico($_REQUEST['apellido1'], 200, 1, OBLIGATORIO);
                //Comprobar que el campo apellido2 se ha rellenado con alfabéticos
                $aErrores["apellido2"] = validacionFormularios::comprobarAlfabetico($_REQUEST['apellido2'], 200, 1, OBLIGATORIO);
                //Comprobar que el campo email se ha rellenado con un email con formato correcto
                $aErrores["email"] = validacionFormularios::validarEmail($_REQUEST['email'], OBLIGATORIO);
                //Comprobar que el campo fecha se ha rellenado con una fecha correcta
                $aErrores["fecha"] = validacionFormularios::validarFecha($_REQUEST['fecha'], "01/01/2200", "01/01/1900", OBLIGATORIO);
                //Comprobar que el campo dni se ha rellenado con un dni correcto
                $aErrores["dni"] = validacionFormularios::validarDni($_REQUEST['dni'], OBLIGATORIO);
                //Comprobar que el campo codigoPostal se ha rellenado con un código postal correcto
                $aErrores["codigoPostal"] = validacionFormularios::validarCp($_REQUEST['codigoPostal'], OBLIGATORIO);
                //Comprobar que el campo password se ha rellenado con una contraseña válida
                $aErrores["password"] = validacionFormularios::validarPassword($_REQUEST['password'], 5, OBLIGATORIO);
                //Comprobar que el campo password se ha rellenado con una contraseña válida
                $aErrores["confirmarPassword"] = validacionFormularios::confirmarPassword($_REQUEST['confirmarPassword'], $_REQUEST['password'], OBLIGATORIO);
                
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
                $aRespuestas = ["nombre" => $_REQUEST['nombre'],
                                "apellido1" => $_REQUEST['apellido1'],
                                "apellido2" => $_REQUEST['apellido2'],
                                "email" => $_REQUEST['email'],
                                "fecha" => $_REQUEST['fecha'],
                                "dni" => $_REQUEST['dni'],
                                "codigoPostal" => $_REQUEST['codigoPostal'],
                                "password" => $_REQUEST['password'],
                                "confirmarPassword" => $_REQUEST['confirmarPassword']];
                         
                //Mostrar datos
                echo "Nombre: " . $aRespuestas['nombre'] . "<br>";
                echo "Primer apellido: " . $aRespuestas['apellido1'] . "<br>";
                echo "Segundo apellido: " . $aRespuestas['apellido2'] . "<br>";
                echo "Correo electrónico: " . $aRespuestas['email'] . "<br>";
                echo "Fecha: " . $aRespuestas['fecha'] . "<br>";
                echo "DNI: " . $aRespuestas['dni'] . "<br>";
                echo "Código postal: " . $aRespuestas['codigoPostal'] . "<br>";
                echo "Contraseña: " . $aRespuestas['password'] . "<br>";
            }
            else{
        ?>
            
        <form name="input" action="<?php $_SERVER['PHP_SELF']?>" method="post">
            <fieldset>
                <legend>Rellene el formulario</legend>
                <div>
                    <p>Nombre: </p>
                    <input type="text" name="nombre" placeholder="Nombre" value="<?php 
                        //Devuelve el campo nombre si se había introducido correctamente
                        if(isset($_REQUEST['nombre']) && $aErrores["nombre"] == null){
                            echo $_REQUEST['nombre'];
                        }
                    ?>"/>
                    
                    <span style="color:red">
                        <?php
                        //Imprime el error en el caso de que se introduzca mal el nombre
                        if($aErrores["nombre"] != null){
                            echo $aErrores['nombre'];
                        }
                        ?> 
                    </span>
                     
                </div>

                <div>
                    <p>Apellido 1: </p>
                    <input type="text" name="apellido1" placeholder="Primer apellido" value="<?php 
                        //Devuelve el campo apellido1 si se había introducido correctamente
                        if(isset($_REQUEST['apellido1']) && $aErrores["apellido1"] == null){
                            echo $_REQUEST['apellido1'];
                        }
                    ?>"/>
                    
                    <span style='color:red'>
                        <?php
                        //Imprime el error en el caso de que se introduzca mal el apellido1
                        if($aErrores["apellido1"] != null){
                            echo $aErrores['apellido1'];
                        }
                        ?> 
                    </span>
                     
                </div>

                <div>
                    <p>Apellido 2: </p>
                    <input type="text" name="apellido2" placeholder="Segundo apellido" value="<?php 
                        //Devuelve el campo apellido2 si se había introducido correctamente
                        if(isset($_REQUEST['apellido2']) && $aErrores["apellido2"] == null){
                            echo $_REQUEST['apellido2'];
                        }
                    ?>"/>
                    
                    <span style='color:red'>
                        <?php
                        //Imprime el error en el caso de que se introduzca mal el apellido2
                        if($aErrores["apellido2"] != null){
                            echo $aErrores['apellido2'];
                        }
                        ?> 
                    </span>
                     
                </div>
                
                <div>
                    <p>Correo electrónico: </p>
                    <input type="text" name="email" placeholder="nombre@gmail.com" value="<?php 
                        //Devuelve el campo email si se había introducido correctamente
                        if(isset($_REQUEST['email']) && $aErrores["email"] == null){
                            echo $_REQUEST['email'];
                        }
                    ?>"/>
                    
                    <span style='color:red'>
                        <?php
                        //Imprime el error en el caso de que se introduzca mal el email
                        if($aErrores["email"] != null){
                            echo $aErrores['email'];
                        }
                        ?> 
                    </span>
                     
                </div>

                <div>
                    <p>Fecha: </p>
                    <input type="text" name="fecha" placeholder="Formato (2000-01-01)" value="<?php 
                        //Devuelve el campo fecha si se había introducido correctamente
                        if(isset($_REQUEST['fecha']) && $aErrores["fecha"] == null){
                            echo $_REQUEST['fecha'];
                        }
                    ?>"/>
                    
                    <span style='color:red'>
                        <?php
                        //Imprime el error en el caso de que se introduzca mal la fecha
                        if($aErrores["fecha"] != null){
                            echo $aErrores['fecha'];
                        }
                        ?> 
                    </span>
                     
                </div>

                <div>
                    <p>DNI: </p>
                    <input type="text" name="dni" placeholder="12345678X" value="<?php 
                        //Devuelve el campo dni si se había introducido correctamente
                        if(isset($_REQUEST['dni']) && $aErrores["dni"] == null){
                            echo $_REQUEST['dni'];
                        }
                    ?>"/>
                    
                    <span style='color:red'>
                        <?php
                        //Imprime el error en el caso de que se introduzca mal el dni
                        if($aErrores["dni"] != null){
                            echo $aErrores['dni'];
                        }
                        ?> 
                    </span>
                     
                </div>
                
                <div>
                    <p>Código postal: </p>
                    <input type="text" name="codigoPostal" placeholder="Código postal" value="<?php 
                        //Devuelve el campo dni si se había introducido correctamente
                        if(isset($_REQUEST['codigoPostal']) && $aErrores["codigoPostal"] == null){
                            echo $_REQUEST['codigoPostal'];
                        }
                    ?>"/>
                    
                    <span style='color:red'>
                        <?php
                        //Imprime el error en el caso de que se introduzca mal el dni
                        if($aErrores["codigoPostal"] != null){
                            echo $aErrores['codigoPostal'];
                        }
                        ?> 
                    </span>
                     
                </div>
                
                <div>
                    <p>Contraseña: </p>
                    <input type="password" name="password" placeholder="Introduzca una contraseña" value="<?php 
                        //Devuelve el campo dni si se había introducido correctamente
                        if(isset($_REQUEST['password']) && $aErrores["password"] == null){
                            echo $_REQUEST['password'];
                        }
                    ?>"/>
                    
                    <span style='color:red'>
                        <?php
                        //Imprime el error en el caso de que se introduzca mal el dni
                        if($aErrores["password"] != null){
                            echo $aErrores['password'];
                        }
                        ?> 
                    </span>
                     
                </div>

                <div>
                    <p>Confirmar contraseña: </p>
                    <input type="password" name="confirmarPassword" placeholder="Introduzca de nuevo la contraseña" value="<?php 
                        //Devuelve el campo dni si se había introducido correctamente
                        if(isset($_REQUEST['confirmarPassword']) && $aErrores["confirmarPassword"] == null){
                            echo $_REQUEST['confirmarPassword'];
                        }
                    ?>"/>
                    
                    <span style='color:red'>
                        <?php
                        //Imprime el error en el caso de que se introduzca mal el dni
                        if($aErrores["confirmarPassword"] != null){
                            echo $aErrores['confirmarPassword'];
                        }
                        ?> 
                    </span>
                     
                </div>

                <input type="submit" value="Enviar" name="enviar"/>
                <input type="reset" value="Borrar"/>
            </fieldset>
        </form>
        
        <?php
            }
        ?>
    </body>
</html>