<?php
require 'db.php';

// Eliminar paciente
if (isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['id'])) {
    $stmt = $pdo->prepare("DELETE FROM pacientes WHERE id = ?");
    $stmt->execute([$_GET['id']]);
    header("Location: index.php");
    exit;
}

// Guardar o Actualizar paciente
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'] ?? '';
    
    $data = [
        $_POST['nro_historia_clinica'],
        $_POST['nombre'],
        $_POST['apellido'],
        $_POST['dni'],
        $_POST['fecha_nacimiento'],
        $_POST['edad'],
        $_POST['direccion'],
        $_POST['telefono'],
        $_POST['obra_social'],
        $_POST['grupo_sanguineo'],
        $_POST['alergias'],
        $_POST['antecedentes_relevantes']
    ];

    if ($id) {
        // Update
        $sql = "UPDATE pacientes SET 
                nro_historia_clinica=?, nombre=?, apellido=?, dni=?, 
                fecha_nacimiento=?, edad=?, direccion=?, telefono=?, 
                obra_social=?, grupo_sanguineo=?, alergias=?, antecedentes_relevantes=? 
                WHERE id=?";
        $data[] = $id;
        $stmt = $pdo->prepare($sql);
        $stmt->execute($data);
    } else {
        // Insert
        $sql = "INSERT INTO pacientes (
                nro_historia_clinica, nombre, apellido, dni, 
                fecha_nacimiento, edad, direccion, telefono, 
                obra_social, grupo_sanguineo, alergias, antecedentes_relevantes
                ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute($data);
    }

    header("Location: index.php");
    exit;
}
?>
