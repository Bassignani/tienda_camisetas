<?php

class Usuario{
//Agrego tantos atributos como campos tenga en la tabla de la base de datos de Usuarios

        private $id;
        private $nombre;
        private $apellido;
        private $email;
        private $password;
        private $rol;
        private $imagen;
        private $db;

        public function __construct(){
            $this->db = Database::connect();//Conexion a la bade de datos
        }

        function getId(){
          return $this->id;
        }

        function getNombre(){
          return $this->nombre;
        }

        function getApellido(){
          return $this->apellido;
        }

        function getEmail(){
          return $this->email;
        }

        function getPassword(){
          return password_hash($this->db->real_escape_string($this->password),PASSWORD_BCRYPT,['cost' => 4]); //Ademas de escapar los datos cifro la contraseña 4 veces
        }       //Si lo hago en el SET me falla cuando intento logear

        function getRol(){
          return $this->rol;
        }

        function getImagen(){
          return $this->imagen;
        }

        function setId($id){
          $this->id = $id;
        }

        function setNombre($nombre){
          $this->nombre = $this->db->real_escape_string($nombre);   //Esto es para escapar los caracteres que se ingresan por Formulario
        }                                                           //asi no generan conflictos al insertarlos a la DB por sentencia SQL


        function setApellido($apellido){
          $this->apellido = $this->db->real_escape_string($apellido);
        }


        function setEmail($email){
          $this->email = $this->db->real_escape_string($email);
        }


        function setPassword($password){
          $this->password =  $password;
        }


        function setRol($rol){
          $this->rol = $rol;
        }


        function setImagen($imagen){
          $this->imagen = $imagen;
        }

        public function save(){
          $sql = "INSERT INTO usuarios VALUES(NULL, '{$this->getNombre()}', '{$this->getApellido()}', '{$this->getEmail()}', '{$this->getPassword()}', 'user', NULL)";
          $save = $this->db->query($sql);

          $result = false;
          if ($save) {
            $result=true;
          }
          return $result;
        }

        public function login(){
          $result = false;
          $email = $this->email;
          $password = $this->password;
          //Comprobar si existe el usuario
          $sql = "SELECT * FROM usuarios WHERE email='$email'";
          $login = $this->db->query($sql);

          if ($login && $login->num_rows == 1) {
              $usuario = $login->fetch_object();

              //Verifico la password
              $verify = password_verify($password, $usuario->password);

              if ($verify) {
                $result = $usuario;
              }
          }
          return $result;
        }
}


 ?>
