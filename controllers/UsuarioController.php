<?php
require_once 'models/usuario.php';

class usuarioController{

    public function index(){
            echo "controlador usuarios accion index funciona";
    }

    public function registro(){
            require_once 'views/usuario/registro.php';
    }

    public function save(){
            if (isset($_POST)) {
              $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false; //Validacion de datos
              $apellido = isset($_POST['apellido']) ? $_POST['apellido'] : false;
              $email = isset($_POST['email']) ? $_POST['email'] : false;
              $password = isset($_POST['password']) ? $_POST['password'] : false;
              //El proyecto anterior tiene una validacion mas precisa

              if($nombre && $apellido && $email && $password){
                      $usuario = new Usuario();
                      $usuario->setNombre($nombre); //Le paso los datos a los metos set del modelo usuario.php
                      $usuario->setApellido($apellido);
                      $usuario->setEmail($email);
                      $usuario->setPassword($password);

                      $save = $usuario->save(); //Llama al metodo save en el modelo usuario.php y guarda los datos en la DB
                      if($save){
                        $_SESSION['register'] = "completed";
                      }else{
                        $_SESSION['register'] = "failed";
                      }
                }else {
                  $_SESSION['register'] = "failed";
                }
            }else {
              $_SESSION['register'] = "failed";
              header("Location:".base_url.'usuario/registro');
            }
          header("Location:".base_url.'usuario/registro');
    }

    public function login(){
            if (isset($_POST)) {
              //Identificar al usuario
              //Consulta a la base de datos
              $usuario = new Usuario();
              $usuario->setEmail($_POST['email']);
              $usuario->setPassword($_POST['password']);

              $identity = $usuario->login();
                //Crear un asesion
              if ($identity && is_object($identity)) {  //si me llega $identity y ademas es un objeto
                $_SESSION['identity'] = $identity;  //Creo la sesion de usuario con todos sus datos;

                  if($identity->rol == 'admin'){ //Creo una sesion especifica para el usuario administrador
                    $_SESSION['admin'] = true;
                  }
              }else {
                $_SESSION['error_login'] = 'Identificacion fallida';
              }
            }
            header("Location:".base_url);
    }

    public function logout(){
        if(isset($_SESSION['identity'])){
           Utils::deleteSession('identity');
        }
        if(isset($_SESSION['admin'])){
           Utils::deleteSession('admin');
        }
        header("Location:".base_url);
    }
}//Fin de la clase usuarioController


 ?>
