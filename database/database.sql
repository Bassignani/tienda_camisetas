/*BASE DE DATOS

                                LINEAS_PEDIDO
                PEDIDOS           +id
USUARIOS        +id <-------------+pedido_id        PRODUCTOS
+id  <----------+usuario_id       +producto_id ------>+id
+nombre         +provincia        +unidades           +nombre
+apellido       +localidad                            +descripcion
+email          +direccion                            +precio
+rol            +coste                                +stock
+imagen         +estado                               +ofecta
+password       +fecha                                +fecha
                +hora                                 +imagen           CATEGORIAs
                                                      +categoria_id ----->+id
                                                                          +nombre
*/

CREATE DATABASE tienda_master;

USE tienda_master;

CREATE TABLE usuarios(
  id int(255) auto_increment not null,
  nombre varchar(100) not null,
  apellido varchar(255) not null,
  email varchar(255) not null,
  password varchar(255) not null,
  rol varchar(20),
  imagen varchar(255),
  CONSTRAINT pk_usuarios PRIMARY KEY(id),
  CONSTRAINT uq_email UNIQUE(email)
)ENGINE=InnoDB;

INSERT INTO usuarios VALUES(null, 'Admin','Admin', 'admin@admin.com' , 'contraseña', 'admin',null);

CREATE TABLE categorias(
  id int(255) auto_increment not null,
  nombre varchar(100) not null,
  CONSTRAINT pk_categorias PRIMARY KEY(id)
)ENGINE=InnoDB;

INSERT INTO categorias VALUES(null, 'Manga corta');
INSERT INTO categorias VALUES(null, 'Tirantes');
INSERT INTO categorias VALUES(null, 'Manga larga');
INSERT INTO categorias VALUES(null, 'Musculosa');

CREATE TABLE productos(
  id int(255) auto_increment not null,
  categoria_id int(255) not null,
  nombre varchar(100) not null,
  descripcion TEXT,
  precio float(100,2) not null,
  stock int(255) not null,
  ofertas varchar(2),
  fecha date not null,
  imagen varchar(255),
  CONSTRAINT pk_productos PRIMARY KEY(id),
  CONSTRAINT fk_pruducto_categoria FOREIGN KEY (categoria_id) REFERENCES categorias(id)
)ENGINE=InnoDB;


CREATE TABLE pedidos(
  id int(255) auto_increment not null,
  usuario_id int(255) not null,
  privincia varchar(255) not null,
  localidad varchar(255) not null,
  direccion varchar(255) not null,
  coste float(200,2) not null,
  estado varchar(20) not null,
  fecha date,
  hota time,
  CONSTRAINT pk_pedidos PRIMARY KEY(id),
  CONSTRAINT fk_pedido_usuario FOREIGN KEY (usuario_id) REFERENCES usuarios(id)
)ENGINE=InnoDB;

CREATE TABLE lineas_pedidos(
  id int(255) auto_increment not null,
  pedido_id int(255) not null,
  producto_id int(255) not null,
  unidades int(255) not null,
  CONSTRAINT pk_lineas_pedidos PRIMARY KEY(id),
  CONSTRAINT fk_linea_pedido FOREIGN KEY (pedido_id) REFERENCES pedidos(id),
  CONSTRAINT fk_linea_producto FOREIGN KEY (producto_id) REFERENCES productos(id)  
)ENGINE=InnoDB;
