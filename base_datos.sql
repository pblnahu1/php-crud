CREATE DATABASE bdd_ntws;

USE proyecto_crud;

CREATE TABLE datos_usuarios(
	id_usuario INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	nombre_usuario VARCHAR(40) NOT NULL,
	apellido_usuario VARCHAR(40) NOT NULL,
	edad_usuario INT(11) NOT NULL,
	email_usuario VARCHAR(50) NOT NULL,
	clave_usuario VARCHAR(50) NOT NULL,
	provincia_usuario TEXT NOT NULL,
	fecha_ingreso DATE NOT NULL
);
