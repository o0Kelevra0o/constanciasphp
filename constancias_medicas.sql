CREATE DATABASE IF NOT EXISTS constancias_medicas;
USE constancias_medicas;

CREATE TABLE unidades (
    ID VARCHAR(2) PRIMARY KEY,
    nombre VARCHAR(50)
);

-- Insertar datos en la tabla de unidades
INSERT INTO unidades (ID, nombre) VALUES
('CU', 'Cuauhtémoc'),
('TA', 'Tasqueña'),
('TI', 'Ticomán'),
('ZA', 'Zaragoza'),
('SU', 'Salauno'),
('TH', 'Theraclinic'),
('OL', 'Olab'),
('AZ', 'Azura');

-- Crear las tablas de constancias médicas para cada unidad
CREATE TABLE Constancias_Cuauhtemoc (
    consecutivo INT AUTO_INCREMENT PRIMARY KEY,
    Folio VARCHAR(8),
    Ape_pat VARCHAR(50),
    Ape_Mat VARCHAR(50),
    Nombres VARCHAR(50),
    Expediente VARCHAR(50),
    hora_llegada TIME,
    hora_salida TIME,
    Elaboro VARCHAR(50)
);

CREATE TABLE Constancias_Tasquena (
    consecutivo INT AUTO_INCREMENT PRIMARY KEY,
    Folio VARCHAR(8),
    Ape_pat VARCHAR(50),
    Ape_Mat VARCHAR(50),
    Nombres VARCHAR(50),
    Expediente VARCHAR(50),
    hora_llegada TIME,
    hora_salida TIME,
    Elaboro VARCHAR(50)
);

CREATE TABLE Constancias_Ticoman (
    consecutivo INT AUTO_INCREMENT PRIMARY KEY,
    Folio VARCHAR(8),
    Ape_pat VARCHAR(50),
    Ape_Mat VARCHAR(50),
    Nombres VARCHAR(50),
    Expediente VARCHAR(50),
    hora_llegada TIME,
    hora_salida TIME,
    Elaboro VARCHAR(50)
);

CREATE TABLE Constancias_Zaragoza (
    consecutivo INT AUTO_INCREMENT PRIMARY KEY,
    Folio VARCHAR(8),
    Ape_pat VARCHAR(50),
    Ape_Mat VARCHAR(50),
    Nombres VARCHAR(50),
    Expediente VARCHAR(50),
    hora_llegada TIME,
    hora_salida TIME,
    Elaboro VARCHAR(50)
);

CREATE TABLE Constancias_Salauno (
    consecutivo INT AUTO_INCREMENT PRIMARY KEY,
    Folio VARCHAR(8),
    Ape_pat VARCHAR(50),
    Ape_Mat VARCHAR(50),
    Nombres VARCHAR(50),
    Expediente VARCHAR(50),
    hora_llegada TIME,
    hora_salida TIME,
    Elaboro VARCHAR(50)
);

CREATE TABLE Constancias_Theraclinic (
    consecutivo INT AUTO_INCREMENT PRIMARY KEY,
    Folio VARCHAR(8),
    Ape_pat VARCHAR(50),
    Ape_Mat VARCHAR(50),
    Nombres VARCHAR(50),
    Expediente VARCHAR(50),
    hora_llegada TIME,
    hora_salida TIME,
    Elaboro VARCHAR(50)
);

CREATE TABLE Constancias_Olab (
    consecutivo INT AUTO_INCREMENT PRIMARY KEY,
    Folio VARCHAR(8),
    Ape_pat VARCHAR(50),
    Ape_Mat VARCHAR(50),
    Nombres VARCHAR(50),
    Expediente VARCHAR(50),
    hora_llegada TIME,
    hora_salida TIME,
    Elaboro VARCHAR(50)
);

CREATE TABLE Constancias_Azura (
    consecutivo INT AUTO_INCREMENT PRIMARY KEY,
    Folio VARCHAR(8),
    Ape_pat VARCHAR(50),
    Ape_Mat VARCHAR(50),
    Nombres VARCHAR(50),
    Expediente VARCHAR(50),
    hora_llegada TIME,
    hora_salida TIME,
    Elaboro VARCHAR(50)
);