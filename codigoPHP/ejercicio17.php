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
                 * Ejercicio: 17. Inicializar un array (bidimensional con dos índices numéricos) donde 
                 * almacenamos el nombre de las personas que tienen reservado el asiento en un teatro de 
                 * 20 filas y 15 asientos por fila. (Inicializamos el array ocupando únicamente 5 asientos). 
                 * Recorrer el array condistintas técnicas (foreach(), while(), for()) para mostrar los asientos 
                 * ocupados en cada fila y las personas que lo ocupan.
                 */
                
                /* 
                 * Inicializar array. Establecemos todos los asientos a null 
                 * Se recorre el array con for para darle valores                 
                 */
            
                // Asientos del 02/10/2020
                for($aFila=1;$aFila<=20;$aFila++){
                    for($aAsiento=1;$aAsiento<=15;$aAsiento++){
                        $aTeatro["02/10/2020"][$aFila][$aAsiento] = null;
                    }
                }
                
                // Asientos del 09/10/2020
                for($aFila=1;$aFila<=20;$aFila++){
                    for($aAsiento=1;$aAsiento<=15;$aAsiento++){
                        $aTeatro["09/10/2020"][$aFila][$aAsiento] = null;
                    }
                }
                
                // Asientos del 16/10/2020
                for($aFila=1;$aFila<=20;$aFila++){
                    for($aAsiento=1;$aAsiento<=15;$aAsiento++){
                        $aTeatro["16/10/2020"][$aFila][$aAsiento] = null;
                    }
                }
                
                /*
                 * Asignamos los asientos a las personas perteneciendo cada una a un asiento de una fila y una fecha 
                 * determinadas
                 */
                $aTeatro["02/10/2020"][4][15] = "Manuel";
                $aTeatro["02/10/2020"][20][1] = "Laura";
                $aTeatro["02/10/2020"][3][9] = "Sergio";
                $aTeatro["02/10/2020"][12][7] = "David";
                $aTeatro["02/10/2020"][8][10] = "Lucia";
                
                $aTeatro["09/10/2020"][7][3] = "Manuel";
                $aTeatro["09/10/2020"][18][5] = "Laura";
                $aTeatro["09/10/2020"][4][7] = "Sergio";
                $aTeatro["09/10/2020"][1][2] = "David";
                $aTeatro["09/10/2020"][1][9] = "Lucia";
                
                $aTeatro["16/10/2020"][8][14] = "Manuel";
                $aTeatro["16/10/2020"][6][4] = "Laura";
                $aTeatro["16/10/2020"][9][9] = "Sergio";
                $aTeatro["16/10/2020"][13][5] = "David";
                $aTeatro["16/10/2020"][8][5] = "Lucia";
                
                
                /* Recorrer array con foreach*/
                echo "<h3>Recorrer array con foreach.</h3>";
                
                foreach ($aTeatro as $fecha => $fila) {
                    echo "<h4>$fecha</h4><p>";
                    foreach ($fila as $asiento => $nombre) {
                        if($nombre!=null){
                            echo "<p>Fila " . $fila . ", Asiento " . $asiento . " => " . $nombre . "</p>";
                        }
                    }
                    echo "</p><br>";
                }

                /* Recorrer array con for*/
                echo "<br><h3>Recorrer array con for.</h3>";
                
                foreach ($aTeatro as $fecha => $fila) {
                    echo "<h4>$fecha</h4>";
                    for($fila=1;$fila<=20;$fila++){
                        for($asiento=1;$asiento<=15;$asiento++){
                            if($aTeatro[$fecha][$fila][$asiento]!=null){
                                echo "<p>Fila " . $fila . ", Asiento " . $asiento . " => " . $aTeatro[$fecha][$fila][$asiento] . "</p>";
                            }
                        }
                    }
                }
                
                /* Recorrer array con while*/
                echo "<br><h3>Recorrer array con while.</h3>";
                
                foreach ($aTeatro as $fecha => $fila) {
                    echo "<h4>$fecha</h4>";
                    $fila=1;
                    while($fila<=20){
                        $asiento=1;
                        while($asiento<=15){
                            if($aTeatro[$fecha][$fila][$asiento]!=null){
                                echo "<p>Fila " . $fila . ", Asiento " . $asiento . " => " . $aTeatro[$fecha][$fila][$asiento] . "</p>";
                            }
                            $asiento++;
                        }
                        $fila++;
                    }
                }
            ?>
        </p>
    </body>
</html>