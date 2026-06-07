-- Creación de la tabla de pacientes
CREATE TABLE IF NOT EXISTS pacientes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nro_historia_clinica VARCHAR(20) UNIQUE NOT NULL,
    nombre VARCHAR(100) NOT NULL,
    apellido VARCHAR(100) NOT NULL,
    dni VARCHAR(15) UNIQUE NOT NULL,
    fecha_nacimiento DATE NOT NULL,
    edad INT,
    direccion VARCHAR(255),
    telefono VARCHAR(50),
    obra_social VARCHAR(100),
    grupo_sanguineo VARCHAR(5),
    alergias TEXT,
    antecedentes_relevantes TEXT,
    fecha_creacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Inserción de datos de ejemplo
INSERT INTO pacientes (
    nro_historia_clinica, 
    nombre, 
    apellido, 
    dni, 
    fecha_nacimiento, 
    edad, 
    direccion, 
    telefono, 
    obra_social, 
    grupo_sanguineo, 
    alergias, 
    antecedentes_relevantes
) VALUES (
    'HC-001', 
    'Juan', 
    'Pérez', 
    '12345678', 
    '1985-05-15', 
    41, 
    'Calle Falsa 123, Ciudad', 
    '555-0101', 
    'OSDE', 
    'A+', 
    'Penicilina', 
    'Hipertensión arterial controlada.'
), (
    'HC-002', 
    'María', 
    'García', 
    '87654321', 
    '1992-10-20', 
    33, 
    'Avenida Siempre Viva 742', 
    '555-0202', 
    'Swiss Medical', 
    '0-', 
    'Ninguna conocida', 
    'Asma en la infancia.'
);
