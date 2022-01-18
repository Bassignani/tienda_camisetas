<?php

class Utils{

  public static function deleteSession($name){
      if (isset($_SESSION[$name])) {
        $_SESSION[$name] = null;
        unset($_SESSION[$name]);
      }
      return $name;
  }

  public static function isAdmin(){  //Compruebo si el usuario es administrador
    if (!isset($_SESSION['admin'])) { //Si no es admin
      header("Location:".base_url);  //Me redirige a la pantalla principal
    }
    return true;
  }

  public static function isIdentity(){  //Compruebo si el usuario esta logueado
    if (!isset($_SESSION['identity'])) { //Si no
      header("Location:".base_url);  //Me redirige a la pantalla principal
    }
    return true;
  }

  public static function showCategorias(){
    require_once 'models/categoria.php';
    $categoria = new Categoria();
    $categorias = $categoria->getAll();
    return $categorias;
  }

  public static function statsCarrito(){
    $stats=array(
      'count'=>0,
      'total'=>0
    );
    if(isset($_SESSION['carrito'])){
      //$stats['count']=count($_SESSION['carrito']);
      foreach ($_SESSION['carrito'] as  $cantidad) {
        $stats['count'] += $cantidad['unidades'];  //El operador += suma lo que habia en total mas el nuevo producto que estamos recorriendo
      }

      foreach ($_SESSION['carrito'] as  $producto) {
        $stats['total'] += $producto['precio']*$producto['unidades'];  //El operador += suma lo que habia en total mas el nuevo producto que estamos recorriendo
      }
    }
    return $stats;
  }


  public static function showStatus($status){
    $value="pendiente";
    if ($status=="confirm") {
      $value="pendiente";
    }elseif ($status=="preparation") {
      $value="En preparacion";
    }elseif ($status=="ready") {
      $value="Listo para enviar";
    }elseif ($status=="sended") {
      $value="Enviado";
    }
    return $value;
  }

}


 ?>
