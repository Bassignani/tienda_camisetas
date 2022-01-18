<?php

require_once 'models/categoria.php';
require_once 'models/producto.php';

class categoriaController{

  public function index(){
    Utils::isAdmin();
    $categoria = new Categoria();
    $categorias = $categoria->getAll();

    require_once 'views/categoria/index.php';
  }

  public function ver(){
    if (isset($_GET['id'])) {
      $id = $_GET['id'];
      //conseguir categoria
      $categoria = new Categoria();
      $categoria->setId($id);
      $categoria = $categoria->getOne();

      //Conseguir PRODUCTOS
      $producto= new Producto();
      $producto->setCategoria_id($id);
      $productos=$producto->getAllCategory();
    }
    require_once 'views/categoria/ver.php';
  }

  public function crear(){
    Utils::isAdmin();   //llamo a esta funcion cuando estas solo puede ser vista o utilizada por el administrador
    require_once 'views/categoria/crear.php';
  }

  public function save(){
      Utils::isAdmin();

      //Guardar la categoria en la base de datos
      $categoria = new Categoria();
      if (isset($_POST)) {
        $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false; //Validacion de datos
        $categoria->setNombre($nombre);
        $categoria->save();
      }
      header("Location:".base_url."categoria/index.php");
  }


}


 ?>
