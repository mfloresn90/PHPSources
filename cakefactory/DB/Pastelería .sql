/****************Creacion de la db en oracle**************************************/
SQL*Plus: Release 11.2.0.2.0 Production on Vie Nov 22 13:33:41 2013
Copyright (c) 1982, 2010, Oracle.  All rights reserved.
SQL> CONNECT SYSTEM
Enter password:
Connected.
SQL> CREATE USER pasteleria IDENTIFIED BY factorycake;
User created.
SQL> CREATE ROLE grupo IDENTIFIED BY grupo;
Role created.
SQL> GRANT CREATE SESSION TO grupo;
Grant succeeded.
SQL> GRANT grupo TO pasteleria;
Grant succeeded.
SQL> CREATE TABLESPACE passcake DATAFILE 'C:\cakefactory.dbf' SIZE 10M;
Tablespace created.
SQL> GRANT CREATE SESSION TO pasteleria;
Grant succeeded.
SQL> GRANT CREATE TABLE, CREATE TYPE, DBA TO pasteleria;
Grant succeeded.
SQL> ALTER USER pasteleria IDENTIFIED BY factorycake DEFAULT TABLESPACE passcake
 QUOTA UNLIMITED ON passcake;
User altered.
SQL>
DB = pasteleria
PASS = factorycake

/****************Fin de la creacion de la db***************************************/

/*********************Tablas******************************************************/
CREATE TABLE Empleados (
	Id_Empleado NUMERIC,
	Nombre VARCHAR2(20),
	Apellidos VARCHAR2(20),
	Direccion VARCHAR2 (20),
	Password VARCHAR2 (100),
	Typuser VARCHAR2 (20),
	Telefono NUMERIC,
	CONSTRAINT pk_Id_Empleado PRIMARY KEY(Id_Empleado)
);

CREATE TABLE Baja_Empleados (
	Id_Baja NUMERIC,
	Nombre VARCHAR2(50),
	Concepto VARCHAR2(180),
	CONSTRAINT pk_Id_Baja PRIMARY KEY(Id_Baja)
);

CREATE TABLE Proveedor (
	Id_Proveedor NUMERIC,
	Nombre VARCHAR2 (50),
	Direccion VARCHAR2(20),
	RFC VARCHAR2(20),
	Telefono NUMERIC,
	CONSTRAINT pk_Id_Proveedor PRIMARY KEY(Id_Proveedor)
);

CREATE TABLE Materia_Prima (
	Id_Mprima NUMERIC,
	Nombre VARCHAR2(20),
	Cantidad NUMERIC,
	Unidad VARCHAR2(10),
	CONSTRAINT pk_Id_Mprima PRIMARY KEY(Id_Mprima)
);

CREATE TABLE Productos (
	Id_Producto NUMERIC,
	Nombre VARCHAR2(20),
	Precio NUMERIC,
	CONSTRAINT pk_Id_Producto PRIMARY KEY(Id_Producto)
);

CREATE TABLE Facturas (
	Id_Factura NUMERIC,
	Id_Empleado NUMERIC,
	Producto VARCHAR2(20),
	Monto_Total NUMERIC,
	Fecha VARCHAR2(100),
	CONSTRAINT pk_Id_Factura PRIMARY KEY(Id_Factura)
);



CREATE TABLE Egresos (
Id_Egreso NUMERIC PRIMARY KEY,
Id_Compra NUMERIC,
Id_Empleado NUMERIC,
Monto_Total NUMBER 
);


CREATE TABLE Merma (
Id_Merma NUMERIC PRIMARY KEY,
Id_Producto NUMERIC,
Id_Tipo_Producto NUMERIC,
Motivo VARCHAR2(150),
Fecha DATE,
Cantidad NUMERIC
);

CREATE TABLE Ventas(
Id_Venta NUMERIC PRIMARY KEY,
Id_Cliente NUMERIC,
Id_Empleado NUMERIC,
Id_Tipo_Producto NUMERIC,
Fecha_Venta DATE
);



CREATE TABLE Compras (
Id_Compra NUMERIC PRIMARY KEY,
Id_Proveedor NUMERIC,
Id_Producto NUMERIC,
Fecha DATE,
Monto_Total NUMBER
);






CREATE TABLE Ingresos (
Id_Ingreso NUMERIC PRIMARY KEY,
Id_Venta NUMERIC,
Monto NUMBER,
Monto_Total NUMBER
);

/*********************Tablas******************************************************/

/*********************ForeingKeys*****************************************************/

ALTER TABLE Empleado
	ADD CONSTRAINT Id_Empleado FOREIGN KEY (Id_Empleado) REFERENCES Egresos (Id_Empleado),
	ADD CONSTRAINT Id_Empleado FOREIGN KEY (Id_Empleado) REFERENCES Ventas (Id_Empleado),
	ADD CONSTRAINT Id_Empleado FOREIGN KEY (Id_Empleado) REFERENCES Facturas (Id_Empleado);
	
ALTER TABLE Ventas
	ADD CONSTRAINT Id_Venta FOREIGN KEY (Id_Venta) REFERENCES Facturas (Id_Venta),
	ADD CONSTRAINT Id_Venta FOREIGN KEY (Id_Venta) REFERENCES Ingresos (Id_Venta);

ALTER TABLE Tipo_Producto
	ADD CONSTRAINT Id_Tipo_Producto FOREIGN KEY (Id_Tipo_Producto) REFERENCES Merma (Id_Tipo_Producto),
	ADD CONSTRAINT Id_Tipo_Producto FOREIGN KEY (Id_Tipo_Producto) REFERENCES Ventas (Id_Tipo_Producto);


ALTER TABLE Compras
	ADD  Id_Compra FOREIGN KEY (Id_Compra) REFERENCES Egresos (Id_Compra);

ALTER TABLE Proveedor
	ADD CONSTRAINT Id_Proveedor FOREIGN KEY (Id_Proveedor) REFERENCES Producto (Id_Proveedor),
	ADD CONSTRAINT Id_Proveedor FOREIGN KEY (Id_Proveedor) REFERENCES Compras (Id_Proveedor);

ALTER TABLE Producto
	ADD CONSTRAINT Id_Producto FOREIGN KEY (Id_Producto) REFERENCES Merma (Id_Producto),
	ADD CONSTRAINT Id_Producto FOREIGN KEY (Id_Producto) REFERENCES Almacen (Id_Producto),
	ADD CONSTRAINT Id_Producto FOREIGN KEY (Id_Producto) REFERENCES Compras (Id_Producto);
	
/*********************ForeingKeys*****************************************************/
	
	
/**************Autoincrementos****************************************************/
CREATE SEQUENCE empleados_sequence
START WITH 1
INCREMENT BY 1
minvalue 1
maxvalue 10000;

CREATE SEQUENCE bajaemp_sequence
START WITH 1
INCREMENT BY 1
minvalue 1
maxvalue 10000;

CREATE SEQUENCE proveedor_sequence
START WITH 1
INCREMENT BY 1
minvalue 1
maxvalue 10000;

CREATE SEQUENCE mprima_sequence
START WITH 1
INCREMENT BY 1
minvalue 1
maxvalue 10000;

CREATE SEQUENCE productos_sequence
START WITH 1
INCREMENT BY 1
minvalue 1
maxvalue 10000;

CREATE SEQUENCE factura_sequence
START WITH 1
INCREMENT BY 1
minvalue 1
maxvalue 10000;

/**************Autoincrementos****************************************************/