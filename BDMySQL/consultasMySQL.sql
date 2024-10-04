-- ==========================
-- ELIMINAR TABLAS SI EXISTEN
-- ==========================
DROP TABLE IF EXISTS Propiedad;
DROP TABLE IF EXISTS Persona;
DROP TABLE IF EXISTS Usuario;

-- ==========================
-- TRUNCAR TABLAS
-- ==========================
TRUNCATE TABLE Propiedad;
TRUNCATE TABLE Usuario;
ALTER TABLE Persona AUTO_INCREMENT = 1;


-- ==========================
-- VACIAR TABLAS
-- ==========================
DELETE FROM Usuario;
DELETE FROM Persona;
DELETE FROM Propiedad;


-- ==========================
-- CREAR TABLA USUARIO
-- ==========================
CREATE TABLE Usuario (
    id_usuario INT AUTO_INCREMENT PRIMARY KEY,
    ci VARCHAR(20) UNIQUE,  
    password VARCHAR(255),
    rol VARCHAR(50)
);

-- ==========================
-- CREAR TABLA PERSONA
-- ==========================
CREATE TABLE Persona (
    id_persona INT AUTO_INCREMENT PRIMARY KEY,
    ci VARCHAR(50) UNIQUE,
    nombres VARCHAR(50),
    aPaterno VARCHAR(50),
    aMaterno VARCHAR(50)  
);

-- ==========================
-- CREAR TABLA PROPIEDAD
-- ==========================
CREATE TABLE Propiedad (
    id INT AUTO_INCREMENT PRIMARY KEY,
    codCatastral VARCHAR(10),
    direccion VARCHAR(255),
    distrito INT,
    zona VARCHAR(100),
    superficie DECIMAL(10, 2),
    xIni DECIMAL(10, 2),
    yIni DECIMAL(10, 2),
    xFin DECIMAL(10, 2),
    yFin DECIMAL(10, 2),
    tipoPropiedad VARCHAR(50),
    valor DECIMAL(15, 2),
    id_persona INT,
    FOREIGN KEY (id_persona) REFERENCES Persona(id_persona) ON DELETE CASCADE
);


INSERT INTO Usuario (ci, password, rol) VALUES
('4288316', '4288316', 'funcionario');  

INSERT INTO Persona (ci, nombres, aPaterno, aMaterno) VALUES
('4288316', 'Christian', 'Medina', 'Juarez');
-- ==========================
-- INSERTAR DATOS EN LA TABLA USUARIO
-- ==========================
INSERT INTO Usuario (ci, password, rol) VALUES
('12345678', '12345678', 'persona'),  -- Juan Pérez
('87654321', '87654321', 'persona'),  -- María García
('11223344', '11223344', 'persona'),  -- Carlos Martínez
('44332211', '44332211', 'persona'),  -- Ana Torres
('55667788', '55667788', 'persona'),  -- Luis Ramírez
('99887766', '99887766', 'persona'),  -- Laura Fernández
('22334455', '22334455', 'persona'),  -- Sofía Mendoza
('33445566', '33445566', 'persona'),  -- Fernando Bermúdez
('44556677', '44556677', 'persona'),  -- Pedro Reyes
('66778899', '66778899', 'persona');  -- Claudia Cruz

-- ==========================
-- INSERTAR DATOS EN LA TABLA PERSONA
-- ==========================
INSERT INTO Persona (ci, nombres, aPaterno, aMaterno) VALUES
('12345678', 'Juan', 'Pérez', 'Gómez'),        -- 2 propiedades
('87654321', 'María', 'García', 'López'),      -- 2 propiedades
('11223344', 'Carlos', 'Martínez', 'Hernández'), -- 1 propiedad
('44332211', 'Ana', 'Torres', 'Suárez'),       -- 1 propiedad
('55667788', 'Luis', 'Ramírez', 'Alvarez'),     -- 1 propiedad
('99887766', 'Laura', 'Fernández', 'Jiménez'),  -- 1 propiedad
('22334455', 'Sofía', 'Mendoza', 'Ríos'),       -- 1 propiedad
('33445566', 'Fernando', 'Bermúdez', 'Soto'),   -- 1 propiedad
('44556677', 'Pedro', 'Reyes', 'Márquez'),      
('66778899', 'Claudia', 'Cruz', 'Salazar');      

-- ==========================
-- INSERTAR DATOS EN LA TABLA PROPIEDAD
-- ==========================
INSERT INTO Propiedad (codCatastral, direccion, distrito, zona, superficie, xIni, yIni, xFin, yFin, tipoPropiedad, valor, id_persona) VALUES
('CP001', 'Av. Siempre Viva 742', 1, 'Zona Norte', 120.50, 50.00, 50.00, 100.00, 100.00, 'Casa', 150000.00, 1),  -- Juan Pérez (valor bajo)
('CP002', 'Calle Los Olivos 123', 1, 'Zona Norte', 250.75, 100.00, 100.00, 200.00, 200.00, 'Terreno', 250000.00, 1),  -- Juan Pérez (valor medio)
('CP003', 'Calle de la Paz 456', 2, 'Zona Sur', 180.00, 30.00, 30.00, 90.00, 90.00, 'Casa', 180000.00, 2),  -- María García (valor alto)
('CP002', 'Av. Libertador 789', 2, 'Zona Sur', 300.00, 110.00, 110.00, 200.00, 200.00, 'Terreno', 320000.00, 2),  -- María García (valor medio)
('CP003', 'Calle Central 123', 3, 'Zona Este', 150.00, 40.00, 40.00, 90.00, 90.00, 'Casa', 220000.00, 3),  -- Carlos Martínez (valor alto)
('CP001', 'Calle Secundaria 321', 3, 'Zona Este', 220.50, 60.00, 60.00, 130.00, 130.00, 'Departamento', 250000.00, 4),  -- Ana Torres (valor alto)
('CP002', 'Calle Nueva 234', 4, 'Zona Oeste', 300.00, 50.00, 50.00, 150.00, 150.00, 'Casa', 200000.00, 5),  -- Luis Ramírez (valor medio)
('CP001', 'Av. del Sol 987', 4, 'Zona Oeste', 450.00, 80.00, 80.00, 200.00, 200.00, 'Terreno', 500000.00, 6),  -- Laura Fernández (valor alto)
('CP001', 'Calle La Paz 111', 5, 'Zona Centro', 160.00, 20.00, 20.00, 80.00, 80.00, 'Casa', 170000.00, 7),  -- Sofía Mendoza (valor bajo)
('CP001', 'Calle del Mercado 222', 5, 'Zona Centro', 200.00, 25.00, 25.00, 90.00, 90.00, 'Departamento', 190000.00, 8);  -- Fernando Bermúdez (valor medio)

-- ==========================
-- CONSULTAS
-- ==========================
SELECT b.ci, a.rol, b.nombres, b.aPaterno, b.aMaterno 
FROM Usuario a 
INNER JOIN Persona b ON a.ci = b.ci
WHERE a.ci = '12345678' AND a.password = 'holaMundo';

SELECT b.ci, a.rol, b.nombres, b.aPaterno, b.aMaterno 
FROM Usuario a 
INNER JOIN Persona b ON a.ci = b.ci
WHERE a.ci = '4288316' AND (a.rol != 'funcionario' OR a.rol IS NULL);

SELECT * FROM Usuario;
SELECT * FROM Persona;
SELECT * FROM Propiedad;


SELECT * FROM Persona AS a 
INNER JOIN Propiedad AS b ON a.id_persona = b.id_persona 
WHERE a.id_persona = 1;

SELECT * FROM Propiedad a 
WHERE a.id_persona = '7';

SELECT * FROM Persona AS a 
INNER JOIN Propiedad AS b ON a.id_persona = b.id_persona 
WHERE a.id_persona = '2';

SELECT 
    p.aPaterno AS ApellidoPaterno,
    p.nombres AS Nombres,
    prop.codCatastral,
    prop.direccion,
    prop.distrito,
    prop.zona,
    prop.superficie,
    prop.xIni,
    prop.yIni,
    prop.xFin,
    prop.yFin,
    prop.tipoPropiedad,
    prop.valor
FROM 
    Persona p
LEFT JOIN 
    Propiedad prop ON p.id_persona = prop.id_persona
ORDER BY 
    p.aPaterno;

SELECT a.* FROM Persona a 
JOIN Usuario b ON a.ci = b.ci 
WHERE b.rol != 'funcionario';

SELECT a.* FROM Persona a 
LEFT JOIN Usuario b ON a.ci = b.ci 
WHERE b.rol != 'funcionario';

SELECT * FROM Persona a 
INNER JOIN Propiedad b ON a.id_persona = b.id_persona 
WHERE a.id_persona = '2';

SELECT a.*, b.codCatastral 
FROM Persona a 
INNER JOIN Propiedad b ON a.id_persona = b.id_persona 
WHERE a.id_persona = '2';


-- ==========================
-- PIVOTE
-- ==========================
select
	a.id_persona,
	a.ci,
	a.nombres,
	a.aPaterno,
	a.aMaterno,
	MAX(case when right(b.codCatastral, 1) = '1' then 1 else 0 end) as Alto,
	MAX(case when right(b.codCatastral, 1) = '2' then 1 else 0 end) as Medio,
	MAX(case when right(b.codCatastral, 1) = '3' then 1 else 0 end) as Bajo
from
	persona a
left join 
        propiedad b on
	a.id_persona = b.id_persona
group by
	a.id_persona,
	a.ci,
	a.nombres,
	a.aPaterno,
	a.aMaterno;
