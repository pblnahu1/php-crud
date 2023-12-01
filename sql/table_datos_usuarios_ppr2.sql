
# PROYECTO CRUD DE PRÁCTICAS PROFESIONALES 2

-- Creo la base de datos `database_project_crud`
CREATE DATABASE database_project_crud;
USE database_project_crud;

-- Para borrar la base de datos
DROP DATABASE database_project_crud;

-- Creo la tabla `datos_usuarios`
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

-- Agrego datos para probar la tabla (no es obligatorio ejecutar esta consulta)
INSERT INTO datos_usuarios(nombre_usuario, apellido_usuario, edad_usuario, email_usuario, clave_usuario, provincia_usuario, fecha_ingreso) 
VALUES ("Juan Perez", "Rodriguez", 23, "rodriguezperez@gmail.com", "1234", "Buenos Aires", "2023-11-25"),
("Ana García", "López", 30, "anagarcia@gmail.com", "5678", "Córdoba", "2023-11-23"),
("Pedro López", "Gómez", 28, "pedrolopez@gmail.com", "abcd", "Mendoza", "2023-11-15"),
("Laura Fernández", "Martínez", 25, "laurafernandez@gmail.com", "efgh", "San Juan", "2023-11-10"),
("Carlos Sánchez", "Díaz", 35, "carlossanchez@gmail.com", "ijkl", "Tucumán", "2023-10-25"),
("María Rodríguez", "Gutiérrez", 29, "mariarodriguez@gmail.com", "mnop", "Santa Fe", "2023-09-10"),
("José Pérez", "Fernández", 22, "joseperez@gmail.com", "qrst", "Salta", "2023-09-05"),
("Marta González", "García", 26, "martagonzalez@gmail.com", "uvwx", "Entre Ríos", "2023-08-23");

SELECT * FROM datos_usuarios;

-- Borra todos los datos y empieza los id de a 1 (auto_increment)
TRUNCATE TABLE datos_usuarios;

-- Dropear tabla (eliminar)
DROP TABLE datos_usuarios;