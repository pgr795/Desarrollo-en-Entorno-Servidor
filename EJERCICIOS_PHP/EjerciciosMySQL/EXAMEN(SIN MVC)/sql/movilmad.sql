insert into rclientes (idcliente , nombre , apellido , email , saldo, fecha_alta, fecha_baja ) values
(1,'MARY','SMITH','mary.smith@movilmad.net',10.00,'2018-01-01',null),
(2,'LINDA','WILLIAMS','linda.williams@movilmad.net',120.50,'2018-02-01',null),
(3,'SUSAN','WILSON','susan.wilson@movilmad.net',200.85,'2018-03-01', null),
(4,'MARGARET','MOORE','margaret.moore@movilmad.net',3.15,'2018-12-31', null),
(5,'DOROTHY','TAYLOR','dorothy.taylor@movilmad.net',6.00,'2019-01-01','2021-03-02');


DROP TABLE IF EXISTS rvehiculos;

create table rvehiculos (matricula varchar(7), marca varchar(40), modelo varchar(40), kms integer(8), fecha_matriculacion date,
preciobase float(5), disponible varchar(1)) ENGINE=InnoDB DEFAULT CHARSET=latin1;;

alter table rvehiculos add constraint pk_rvehiculos primary key (matricula);


insert into rvehiculos (matricula , marca , modelo , kms , fecha_matriculacion, preciobase , disponible ) values
('4589HMK','VOLVO','A30',12400,'2018-01-25',0.30, 'S'),
('4001MKT','VOLVO','A40',125400,'2018-01-25',0.50, 'S'),
('3333JTM','VOLVO','A30',2400,'2018-11-12',0.40, 'S'),
('4545BGT','FIAT','TIPO',3500,'2018-07-15',0.20, 'N'),
('1283KTS','FIAT','TIPO',25000,'2019-01-30',0.20, 'S'),
('1647DES','RENAULT','CLIO',189754,'2018-09-02',0.30, 'S'),
('1477KLT','RENAULT','MEGANE',32564,'2018-01-25',0.30, 'S'),
('7777KLT','RENAULT','SCENIC',30000,'2018-01-01',0.30, 'S'),
('1234ABC','SEAT','CORDOBA',10000,'2018-01-01',0.20, 'S');


DROP TABLE IF EXISTS ralquileres;
create table ralquileres (idcliente integer(5), matricula varchar(7), fecha_alquiler timestamp, fecha_devolucion timestamp, preciototal float(8)) 
ENGINE=InnoDB DEFAULT CHARSET=latin1;

alter table ralquileres add constraint pk_ralquileres primary key (idcliente,matricula, fecha_alquiler);
alter table ralquileres add constraint fk_ralquileres_idcliente foreign key (idcliente) references rclientes(idcliente);
alter table ralquileres add constraint fk_ralquileres_matricula foreign key (matricula) references rvehiculos(matricula);

insert into ralquileres  (idcliente , matricula , fecha_alquiler , fecha_devolucion, preciototal) values
(1,'1477KLT','2019-01-01 13:15:00','2019-01-01 13:15:00',15*0.30),
(5,'1477KLT','2019-02-01 07:00:00','2019-02-01 07:45:20',45*0.30),
(5,'4001MKT','2019-03-03 19:02:03','2019-03-03 19:12:03',10*0.50),
(5,'4001MKT','2019-03-03 19:22:00','2019-03-03 19:42:00',20*0.50),
(3,'4545BGT','2021-03-04 10:00:00',null,null);

commit;	