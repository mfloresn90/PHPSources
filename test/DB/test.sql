CREATE DATABASE testfelysil;
USE testfelysil;

CREATE TABLE usuarios (
	id_usuarios INT NOT NULL AUTO_INCREMENT,
	nombre VARCHAR(100),
	password VARCHAR(20),
	ncuenta INT(10),
	nacimiento DATE,
	sexo VARCHAR(5),
	email VARCHAR(50),
	carrera VARCHAR(3),
	tipuser VARCHAR(10),
	PRIMARY KEY(id_usuarios)
);

CREATE TABLE resultados (
	id_resultados INT NOT NULL AUTO_INCREMENT,
	id_usuarios INT,
	eval VARCHAR(5),
	descripcion VARCHAR(1000),
	PRIMARY KEY(id_resultados)
);

INSERT INTO usuarios (nombre, password, ncuenta, nacimiento, sexo, email, carrera, tipuser)
	VALUES ('Rosa', '123456', 1234567, '2013-11-05', 'F', 'correo@correo.com', 'ICO', 'admin');