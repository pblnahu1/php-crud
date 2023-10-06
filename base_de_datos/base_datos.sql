
-- Creo la base de datos `database_project_ntws`
CREATE DATABASE database_project_ntws;
USE database_project_ntws;

-- Para borrar la base de datos
DROP DATABASE database_project_ntws;

-- Creo la tabla `datos_usuarios`
CREATE TABLE datos_usuarios(
	id_usuario INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	nombre_usuario VARCHAR(40) NOT NULL,
	apellido_usuario VARCHAR(40) NOT NULL,
	edad_usuario INT(11) NOT NULL,
	email_usuario VARCHAR(50) NOT NULL,
	clave_usuario VARCHAR(50) NOT NULL,
	provincia_usuario TEXT NOT NULL,
	fecha_ingreso VARCHAR(20) NOT NULL
);

-- Agrego datos para probar la tabla (no es obligatorio ejecutar esta consulta)
INSERT INTO datos_usuarios(nombre_usuario, apellido_usuario, edad_usuario, email_usuario, clave_usuario, provincia_usuario, fecha_ingreso) 
VALUES ("Juan Perez", "Rodriguez", 23, "rodriguezperez@gmail.com", "1234", "Buenos Aires", "2023-10-05"),
("Ana García", "López", 30, "anagarcia@gmail.com", "5678", "Córdoba", "2023-10-05"),
("Pedro López", "Gómez", 28, "pedrolopez@gmail.com", "abcd", "Mendoza", "2023-10-05"),
("Laura Fernández", "Martínez", 25, "laurafernandez@gmail.com", "efgh", "San Juan", "2023-10-05"),
("Carlos Sánchez", "Díaz", 35, "carlossanchez@gmail.com", "ijkl", "Tucumán", "2023-10-05"),
("María Rodríguez", "Gutiérrez", 29, "mariarodriguez@gmail.com", "mnop", "Santa Fe", "2023-10-05"),
("José Pérez", "Fernández", 22, "joseperez@gmail.com", "qrst", "Salta", "2023-10-05"),
("Marta González", "García", 26, "martagonzalez@gmail.com", "uvwx", "Entre Ríos", "2023-10-05"),
("Antonio López", "Díaz", 27, "antoniolopez@gmail.com", "yzab", "Misiones", "2023-10-05"),
("Sofía Ramírez", "Martínez", 33, "sofiaramirez@gmail.com", "1234", "Chubut", "2023-10-05"),
("Raúl Pérez", "Gómez", 31, "raulperez@gmail.com", "5678", "La Pampa", "2023-10-05"),
("Elena Sánchez", "Gutiérrez", 24, "elenasanchez@gmail.com", "abcd", "Santiago del Estero", "2023-10-05"),
("Andrés Rodríguez", "López", 36, "andresrodriguez@gmail.com", "efgh", "La Rioja", "2023-10-05"),
("Silvia Fernández", "García", 28, "silviafernandez@gmail.com", "ijkl", "Santa Cruz", "2023-10-05"),
("Gabriel Pérez", "Martínez", 27, "gabrielperez@gmail.com", "mnop", "Tierra del Fuego", "2023-10-05");


SELECT * FROM datos_usuarios;

-- Borra todos los datos y empieza los id de a 1 (auto_increment)
TRUNCATE TABLE datos_usuarios;

-- Dropear tabla (eliminar)
DROP TABLE datos_usuarios;