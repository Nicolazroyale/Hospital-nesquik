<?php
require 'db.php';

$id = $_GET['id'] ?? null;
$paciente = null;

if ($id) {
    $stmt = $pdo->prepare("SELECT * FROM pacientes WHERE id = ?");
    $stmt->execute([$id]);
    $paciente = $stmt->fetch();
}

$title = $id ? "Editar Paciente" : "Nuevo Paciente";
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1><?= $title ?></h1>
        <form action="procesar.php" method="POST">
            <input type="hidden" name="id" value="<?= $paciente['id'] ?? '' ?>">
            
            <div class="form-group">
                <label>Número de Historia Clínica</label>
                <input type="text" name="nro_historia_clinica" value="<?= $paciente['nro_historia_clinica'] ?? '' ?>" required>
            </div>

            <div style="display: flex; gap: 20px;">
                <div class="form-group" style="flex: 1;">
                    <label>Nombre</label>
                    <input type="text" name="nombre" value="<?= $paciente['nombre'] ?? '' ?>" required>
                </div>
                <div class="form-group" style="flex: 1;">
                    <label>Apellido</label>
                    <input type="text" name="apellido" value="<?= $paciente['apellido'] ?? '' ?>" required>
                </div>
            </div>

            <div style="display: flex; gap: 20px;">
                <div class="form-group" style="flex: 1;">
                    <label>DNI</label>
                    <input type="text" name="dni" value="<?= $paciente['dni'] ?? '' ?>" required>
                </div>
                <div class="form-group" style="flex: 1;">
                    <label>Fecha de Nacimiento</label>
                    <input type="date" name="fecha_nacimiento" value="<?= $paciente['fecha_nacimiento'] ?? '' ?>" required>
                </div>
                <div class="form-group" style="flex: 0.5;">
                    <label>Edad</label>
                    <input type="number" name="edad" value="<?= $paciente['edad'] ?? '' ?>">
                </div>
            </div>

            <div class="form-group">
                <label>Dirección</label>
                <input type="text" name="direccion" value="<?= $paciente['direccion'] ?? '' ?>">
            </div>

            <div style="display: flex; gap: 20px;">
                <div class="form-group" style="flex: 1;">
                    <label>Teléfono</label>
                    <input type="text" name="telefono" value="<?= $paciente['telefono'] ?? '' ?>">
                </div>
                <div class="form-group" style="flex: 1;">
                    <label>Obra Social</label>
                    <input type="text" name="obra_social" value="<?= $paciente['obra_social'] ?? '' ?>">
                </div>
                <div class="form-group" style="flex: 0.5;">
                    <label>Grupo Sanguíneo</label>
                    <select name="grupo_sanguineo">
                        <option value="">Seleccione...</option>
                        <?php foreach(['A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', '0+', '0-'] as $gs): ?>
                            <option value="<?= $gs ?>" <?= (isset($paciente['grupo_sanguineo']) && $paciente['grupo_sanguineo'] == $gs) ? 'selected' : '' ?>><?= $gs ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label>Alergias</label>
                <textarea name="alergias" rows="3"><?= $paciente['alergias'] ?? '' ?></textarea>
            </div>

            <div class="form-group">
                <label>Antecedentes Médicos Relevantes</label>
                <textarea name="antecedentes_relevantes" rows="5"><?= $paciente['antecedentes_relevantes'] ?? '' ?></textarea>
            </div>

            <button type="submit" class="btn btn-success">Guardar Paciente</button>
            <a href="index.php" class="btn btn-danger">Cancelar</a>
        </form>
    </div>
</body>
</html>
