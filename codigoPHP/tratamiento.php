<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$nombre = $_POST['nombre'];
$apellido1 = $_POST['apellido1'];
$apellido2 = $_POST['apellido2'];

echo "<p>Nombre: " . $nombre . "</p>";
echo "<p>Primer apellido: " . $apellido1 . "</p>";
echo "<p>Segundo apellido: " . $apellido2 . "</p>";
?>