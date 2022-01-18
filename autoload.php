<?php
function controllers_autoload($classname){
$class_rep = str_replace('\\', '/', $classname);     //OPCION 1
require_once 'controllers/' . $class_rep . '.php';   //OPCION 1, van juntas las dos lineas de codigo
//include 'controllers/' . $classname . '.php';  //OPCION 2

}
spl_autoload_register('controllers_autoload');
 ?>
