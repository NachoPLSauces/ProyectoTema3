<html>
    <head>
        <meta charset="UTF-8">
        <title>Ejercicio 28</title>
        <style>
            .error{
                color: red;
                font-weight: bold;
            }
            
            legend{
                color: black;
                font-weight: bold;
            }
            input{
                padding: 5px;
                border-radius: 10px;
            }
            .obligatorio input{
                background-color: #ccc;
            }
        </style>
    </head>
    <body>
        <?php
        /*
         * @author: Nacho del Prado Losada
         * @since: 22/10/2020
         * @description: 28. Encuesta de satisfacción utilizando una plantilla.
         */

        setlocale(LC_ALL, "es_ES.utf-8");
                
        date_default_timezone_set('Europe/Madrid');
        
        //Declaramos la variables
        require_once '../core/201020libreriaValidacion.php'; //Importamos la librería 
        $entradaOK = true;
        
        $arrayErrores = [ //Recoge los errores del formulario
            'nombreApellidos' => null,
            'fechaNacimento' => null,
            'estadoAnimo' => null,
            'estadoCurso' => null,
            'vacaciones' => null,
            'describirAnimo' => null,
            
        ]; 
        
        $arrayFormulario = [ //Recoge los datos del formulario
            'nombreApellidos' => null,
            'fechaNacimento' => null,
            'estadoAnimo' => null,
            'estadoCurso' => null,
            'vacaciones' => null,
            'describirAnimo' => null,
            
        ];  


        if (isset($_POST['enviar'])) { //Código que se ejecuta cuando se envía el formulario
            
            #OBLIGATORIOS
            $arrayErrores['nombreApellidos'] = validacionFormularios::comprobarAlfabetico($_POST['nombreApellidos'], 20, 1, 1);  //Máximo, mínimo y opcionalidad
            $arrayErrores['fechaNacimento'] = validacionFormularios::validarFecha($_POST['fechaNacimento'], "01/01/2200", "01/01/1900", 1); //Opcionalidad
            if(!isset($_POST['estadoAnimo'])){$arrayErrores['estadoAnimo'] = "Debe marcarse un valor";}
            $arrayErrores['estadoCurso'] = validacionFormularios::comprobarEntero($_POST['estadoCurso'], 10, 1, 1); //Máximo, mínimo y opcionalidad
            $arrayErrores['vacaciones'] = validacionFormularios::validarElementoEnLista($_POST['vacaciones'], array("ni idea", "con la familia", "de fiesta", "trabajando", "estudiando DWES")); //Opciones de la lista
            $arrayErrores['describirAnimo'] = validacionFormularios::comprobarAlfaNumerico($_POST['describirAnimo'], 500, 1, 1); //Máximo, mínimo y opcionalidad;}
            
            
            
            foreach ($arrayErrores as $campo => $error) { //Recorre el array en busca de mensajes de error
                if ($error != null) { //Si lo encuentra vacia el campo y cambia la condiccion
                    $entradaOK = false; //Cambia la condiccion de la variable
                }
            }
        } else {
            $entradaOK = false;
        }


        if ($entradaOK) { // Si el formulario se ha rellenado correctamente
         
            #OBLIGATORIOS
            // Cargamos en el $arrayFormulario el valos de aquellos campos que se han rellenado correctamente
            
            $arrayFormulario['nombreApellidos'] = $_POST['nombreApellidos'];
            $arrayFormulario['fechaNacimento'] = $_POST['fechaNacimento'];
            $arrayFormulario['estadoAnimo'] = $_POST['estadoAnimo'];
            $arrayFormulario['estadoCurso'] = $_POST['estadoCurso'];
            $arrayFormulario['vacaciones'] = $_POST['vacaciones'];
            $arrayFormulario['describirAnimo'] = $_POST['describirAnimo'];
            
            // Mostramos los valores de cada campo obligatorio
            $fecha = new DateTime();
            echo "<h3>INFORME DE SATISFACCIÓN PERSONAL</h3>";
            echo "Hoy " . $fecha->format('D-d-m') . " a las " . $fecha->format('h:i') . "<br>"; 
            echo "D. " . $arrayFormulario['nombreApellidos'] . " nacido hace " . date('Y', strtotime($arrayFormulario['fechaNacimento'], $fecha)) . " años se siente " . $arrayFormulario['estadoAnimo'] . "<br>";
            echo "Valora su curso actual con un  " . $arrayFormulario['estadoCurso'] . " sobre 10.<br>";
            echo "Estas navidades las dedicará a " . $arrayFormulario['vacaciones'] . "<br>";
            echo "Y además opina que " . $arrayFormulario['describirAnimo'] . ".";
            
            
            
        } else { //Código que se ejecuta antes de rellenar el formulario
            ?>
            <form action = "<?php echo $_SERVER['PHP_SELF']; ?>" method = "post">
                <fieldset>
                    <legend>ENCUESTA DE SATISFACCÓN PERSONAL :D</legend>
                    <div class="obligatorio">
                        <label>Nombre y apellidos </label>
                        <input type = "text" name = "nombreApellidos"
                               value="<?php if($arrayErrores['nombreApellidos'] == NULL && isset($_POST['nombreApellidos'])){ echo $_POST['nombreApellidos'];} ?>"><br>
                    </div>
                    <div class="error">
                    <?php
                    if ($arrayErrores['nombreApellidos'] != NULL) {
                        echo $arrayErrores['nombreApellidos']; //Mensaje de error que tiene el $arrayErrores
                    }
                    ?>
                    </div>
                    
                    <br>
                    
                    <div>
                        <label>Fecha de nacimiento </label>
                        <input type = "text" name = "fechaNacimento"
                               value="<?php if($arrayErrores['fechaNacimento'] == NULL && isset($_POST['fechaNacimento'])){ echo $_POST['fechaNacimento'];} ?>"><br>
                    </div>
                    <div class="error">
                    <?php
                    if ($arrayErrores['fechaNacimento'] != NULL) {
                        echo $arrayErrores['fechaNacimento']; //Mensaje de error que tiene el $arrayErrores
                    }
                    ?>
                    </div>
                    
                    <br> 
                    
                    <div>
                        <label>¿Cómo te sientes hoy? </label><br><br>
                        <input type="radio" id="RO1" name="estadoAnimo" value="Muy mal" <?php if(isset($_POST['estadoAnimo']) && $_POST['estadoAnimo'] == "Muy mal"){ echo 'checked';} ?>> <!--//Recuerda la selección-->
                            <label for="RO1">Muy mal</label><br/>
                        <input type="radio" id="RO2" name="estadoAnimo" value="Mal" <?php if(isset($_POST['estadoAnimo']) && $_POST['estadoAnimo'] == "Mal"){ echo 'checked';} ?>> <!--//Recuerda la selección-->
                            <label for="RO2">Mal</label><br>
                        <input type="radio" id="RO3" name="estadoAnimo" value="Regular" <?php if(isset($_POST['estadoAnimo']) && $_POST['estadoAnimo'] == "Regular"){ echo 'checked';} ?>> <!--//Recuerda la selección-->
                            <label for="RO3">Regular</label><br>
                        <input type="radio" id="RO4" name="estadoAnimo" value="Bien" <?php if(isset($_POST['estadoAnimo']) && $_POST['estadoAnimo'] == "Bien"){ echo 'checked';} ?>> <!--//Recuerda la selección-->
                            <label for="RO4">Bien</label><br>
                        <input type="radio" id="RO5" name="estadoAnimo" value="Muy bien" <?php if(isset($_POST['estadoAnimo']) && $_POST['estadoAnimo'] == "Muy bien"){ echo 'checked';} ?>> <!--//Recuerda la selección-->
                            <label for="RO5">Muy bien</label>
                    </div>
                    <div class="error">
                    <?php
                    if ($arrayErrores['estadoAnimo'] != NULL) {
                        echo $arrayErrores['estadoAnimo']; //Mensaje de error que tiene el $arrayErrores
                    }
                    ?>
                    </div>
                    
                    <br>
                    
                    <div class="obligatorio">
                        <label>¿Cómo va el curso? (1 - muy mal, 10 - muy bien) [1--10] </label>
                        <input type = "number" name = "estadoCurso"
                               value="<?php if($arrayErrores['estadoCurso'] == NULL && isset($_POST['estadoCurso'])){ echo $_POST['estadoCurso'];} ?>"><br>
                    </div>
                    <div class="error">
                    <?php
                    if ($arrayErrores['estadoCurso'] != NULL) {
                        echo $arrayErrores['estadoCurso']; //Mensaje de error que tiene el $arrayErrores
                    }
                    ?>
                    </div>
                    
                    <br>
                    
                    <div>
                        <label>¿Cómo se presentan las vacaciones de Navidad? </label>
                        <select name="vacaciones">
                            <option value="ni idea" <?php if(isset($_POST['vacaciones'])){if($arrayErrores['vacaciones'] == NULL && $_POST['vacaciones'] == "ni idea"){ echo "selected";}} ?>>Ni idea</option>
                            <option value="con la familia" <?php if(isset($_POST['vacaciones'])){if($arrayErrores['vacaciones'] == NULL && $_POST['vacaciones'] == "con la familia"){ echo "selected";}} ?>>Con la familia 2</option>
                            <option value="de fiesta" <?php if(isset($_POST['vacaciones'])){if($arrayErrores['vacaciones'] == NULL && $_POST['vacaciones'] == "de fiesta"){ echo "selected";}} ?>>De fiesta</option>
                            <option value="trabajando" <?php if(isset($_POST['vacaciones'])){if($arrayErrores['vacaciones'] == NULL && $_POST['vacaciones'] == "trabajando"){ echo "selected";}} ?>>Trabajando</option>
                            <option value="estudiando DWES" <?php if(isset($_POST['vacaciones'])){if($arrayErrores['vacaciones'] == NULL && $_POST['vacaciones'] == "estudiando DWES"){ echo "selected";}} ?>>Estudiando DWES</option>
                        </select>
                    </div>
                    <div class="error">
                    <?php
                    if ($arrayErrores['vacaciones'] != NULL) {
                        echo $arrayErrores['vacaciones']; //Mensaje de error que tiene el $arrayErrores
                    }
                    ?>
                    </div>
                    
                    <br>
                        
                    <div>
                        <label>Describe brevemente tu estado de ánimo: </label>
                        <textarea name="describirAnimo" placeholder="Maximo 500 caracteres" value="<?php if($arrayErrores['describirAnimo'] == NULL && isset($_POST['describirAnimo'])){ echo $_POST['describirAnimo'];} ?>"></textarea>
                    </div>
                    <div class="error">
                    <?php
                    if ($arrayErrores['describirAnimo'] != NULL) {
                        echo $arrayErrores['describirAnimo']; //Mensaje de error que tiene el $arrayErrores
                    }
                    ?>
                    </div>
                    
                    <br>
                    <div>
                        <br><input type = "submit" name = "enviar" value = "Conclusión">
                    </div>
                </fieldset>
            </form>
        <?php } ?>
    </body>
</html>