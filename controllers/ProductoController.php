<?php
require_once 'models/producto.php';


class productoController{
  public function index(){
        $producto = new Producto();
        $productos = $producto->getRandom(6);
        //Renderizar una Vista
        require_once 'views/producto/destacados.php';
      }

  public function ver(){
    if (isset($_GET['id'])) {
        $id=$_GET['id'];

        $producto= new Producto();
        $producto->setId($id);

        $product = $producto->getOne();
    }
        require_once 'views/producto/ver.php';
  }

  public function gestion(){
        Utils::isAdmin();
        $producto = new Producto();

        $productos = $producto->getAll();
        require_once 'views/producto/gestion.php';
  }

  public function crear(){
        Utils::isAdmin();
        $producto = new Producto();
        require_once 'views/producto/crear.php';
  }

  public function save(){
          Utils::isAdmin();

          if (isset($_POST)) {
            $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
            $descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : false;
            $precio = isset($_POST['precio']) ? $_POST['precio'] : false;
            $stock = isset($_POST['stock']) ? $_POST['stock'] : false;
            $categoria_id = isset($_POST['categoria_id']) ? $_POST['categoria_id'] : false;
            //$imagen = isset($_POST['imagen']) ? $_POST['imagen'] : false;

            if ($nombre && $descripcion && $precio && $stock && $categoria_id) {
              $producto = new Producto;
              $producto->setNombre($nombre);
              $producto->setDescripcion($descripcion);
              $producto->setPrecio($precio);
              $producto->setStock($stock);
              $producto->setCategoria_id($categoria_id);

              //Guardar la imagen
              if(isset($_FILES['imagen'])){
                    $file = $_FILES['imagen']; //Variable superglobal en la que va a estar el archivo de imagen cargada
                    $filename = $file['name']; //Nombre del archivo
                    $mimetype = $file['type']; //Formato del archivo

                    if ($mimetype == "image/jpg" || $mimetype == "image/jpeg" || $mimetype == "image/png" || $mimetype == "image/gif") { //Compruebo que el tipo de archivo sea correcto
                        if (!is_dir('uploads/images')) {
                         mkdir('uploads/images', 0777, true);
                        }
                        move_uploaded_file($file['tmp_name'],'uploads/images/'.$file['name']);
                        $producto->setImagen($filename);
                    }
              }
              if(isset($_GET['id'])){   //Si llega un GET es porque se debe editar
                $id = $_GET['id'];
                $producto->setId($id);
                $save = $producto->edit();
              }else{
                  $save = $producto->save();
              }

              if ($save) {
                $_SESSION['producto'] = 'complete';
              }else {
                $_SESSION['producto'] = 'filed';
              }

            }else {
              $_SESSION['producto'] = 'filed';
            }
          }else {
            $_SESSION['producto'] = 'filed';
          }
          header("Location:".base_url."producto/gestion");
  }

  public function editar(){
    Utils::isAdmin();
    if (isset($_GET['id'])) {
        $id=$_GET['id'];
        $edit=true;

        $producto= new Producto();
        $producto->setId($id);

        $pro = $producto->getOne();

        require_once 'views/producto/crear.php';
    }else {
      header("Location:".base_url."producto/gestion");
    }
  }


  public function eliminar(){
        Utils::isAdmin();

        if (isset($_GET['id'])) {
          $id=$_GET['id'];
          $producto=new Producto();
          $producto->setId($id);

          $delete = $producto->delete();
          if (isset($delete)) {
            $_SESSION['delete'] = 'complete';
          }else {
            $_SESSION['delete'] = 'filed';
          }
        }else {
          $_SESSION['delete'] = 'filed';
        }
        header("Location:".base_url."producto/gestion");
  }




}


 ?>
