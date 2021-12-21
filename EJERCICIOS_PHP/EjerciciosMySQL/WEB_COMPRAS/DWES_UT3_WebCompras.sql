DROP DATABASE IF EXISTS COMPRASWEB;
CREATE DATABASE COMPRASWEB;
USE COMPRASWEB;

CREATE TABLE CLIENTE
(NIF VARCHAR(9),
 NOMBRE VARCHAR(40),
 APELLIDO VARCHAR(40),
 CP VARCHAR(5),
 DIRECCION VARCHAR(40),
 CIUDAD VARCHAR(40)) ENGINE=InnoDB;
 
ALTER TABLE CLIENTE ADD CONSTRAINT PK_CLIENTE PRIMARY KEY (NIF); 

CREATE TABLE CATEGORIA
(ID_CATEGORIA VARCHAR(5),
 NOMBRE VARCHAR(40)) ENGINE=InnoDB;
 
ALTER TABLE CATEGORIA ADD CONSTRAINT PK_CATEGORIA PRIMARY KEY (ID_CATEGORIA); 

CREATE TABLE ALMACEN
(NUM_ALMACEN INTEGER,
 LOCALIDAD VARCHAR(40)) ENGINE=InnoDB;
 
ALTER TABLE ALMACEN ADD CONSTRAINT PK_ALMACEN PRIMARY KEY (NUM_ALMACEN); 


CREATE TABLE PRODUCTO
(ID_PRODUCTO VARCHAR(5),
 NOMBRE      VARCHAR(40),
 PRECIO      DOUBLE,
 ID_CATEGORIA VARCHAR(5)) ENGINE=InnoDB;

ALTER TABLE PRODUCTO ADD CONSTRAINT PK_PRODUCTO PRIMARY KEY (ID_PRODUCTO); 

ALTER TABLE PRODUCTO ADD CONSTRAINT FK_PROD_CAT FOREIGN KEY (ID_CATEGORIA) REFERENCES CATEGORIA(ID_CATEGORIA); 

CREATE TABLE COMPRA
(NIF VARCHAR(9),
 ID_PRODUCTO VARCHAR(5),
 FECHA_COMPRA DATE,
 UNIDADES INTEGER) ENGINE=InnoDB;
 
ALTER TABLE COMPRA ADD CONSTRAINT PK_COMPRA PRIMARY KEY (NIF,ID_PRODUCTO,FECHA_COMPRA);  
 
ALTER TABLE COMPRA ADD CONSTRAINT FK_COM_CLI FOREIGN KEY (NIF) REFERENCES CLIENTE(NIF);  

ALTER TABLE COMPRA ADD CONSTRAINT FK_COM_PRO FOREIGN KEY (ID_PRODUCTO) REFERENCES PRODUCTO(ID_PRODUCTO); 

CREATE TABLE ALMACENA
(NUM_ALMACEN INTEGER,
 ID_PRODUCTO VARCHAR(5),
 CANTIDAD INTEGER) ENGINE=InnoDB;

ALTER TABLE ALMACENA ADD CONSTRAINT PK_ALMACENA PRIMARY KEY (NUM_ALMACEN,ID_PRODUCTO); 

ALTER TABLE ALMACENA ADD CONSTRAINT FK_ALM_ALM FOREIGN KEY (NUM_ALMACEN) REFERENCES ALMACEN(NUM_ALMACEN);  

ALTER TABLE ALMACENA ADD CONSTRAINT FK_ALM_PRO FOREIGN KEY (ID_PRODUCTO) REFERENCES PRODUCTO(ID_PRODUCTO); 







