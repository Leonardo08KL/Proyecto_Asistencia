create database asistencia;

use asistencia;

show tables;

create table catalogo_laboratorio(
	cve_catalogo_laboratorio int not null PRIMARY KEY,
    nombre_laboratorio varchar(100)
);

describe catalogo_laboratorio;


create table materia(
	cve_materia int not null PRIMARY KEY,
    materia varchar(100)
);
describe materia;


ALTER TABLE materia
MODIFY materia VARCHAR(50);


create table horario(
	cve_horario int not null PRIMARY KEY,
    dia varchar(50),
    hora_entrada DATE,
    hora_salida DATE
);
describe horario;


create table catalogo_usuario(
	cve_catalogo_usuario int not null PRIMARY KEY,
    tipo_usuario varchar(50)
);
describe catalogo_usuario;


create table cuenta(
	cve_cuenta int not null PRIMARY KEY,
    correo varchar(50),
    contrasena varchar(32)
);
describe cuenta;


create table usuario(
	cve_usuario int not null PRIMARY KEY,
    nombre varchar(50),
    apellido_paterno varchar(50),
    apellido_materno varchar(50),
   	cve_catalogo_usuario int not null,
	constraint fk1_usuario foreign key(cve_catalogo_usuario) references catalogo_usuario(cve_catalogo_usuario),
	cve_cuenta int not null,
	constraint fk2_usuario foreign key(cve_cuenta) references cuenta(cve_cuenta)
);
describe usuario;


create table grupos(
	cve_grupo int not null PRIMARY KEY,
    grupo varchar(100),
    cve_catalogo_laboratorio int not null,
	constraint fk1_grupos foreign key(cve_catalogo_laboratorio) references catalogo_laboratorio(cve_catalogo_laboratorio),
	cve_materia int not null,
	constraint fk2_grupos foreign key(cve_materia) references materia(cve_materia),
	cve_horario int not null,
	constraint fk3_grupos foreign key(cve_horario) references horario(cve_horario),
	cve_usuario int not null,
	constraint fk4_grupos foreign key(cve_usuario) references usuario(cve_usuario)
);
describe grupos;

create table asistencia(
	cve_asistencia int NOT NULL PRIMARY KEY,
    asistencia varchar(50),
    hora_entrada DATE,
    hora_salida DATE,
    cve_grupo int not null,
	constraint fk1_asistencia foreign key(cve_grupo) references grupos(cve_grupo),
	cve_usuario int not null,
	constraint fk2_asistencia foreign key(cve_usuario) references usuario(cve_usuario)
);
describe asistencia;