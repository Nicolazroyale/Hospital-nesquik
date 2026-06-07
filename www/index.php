<?php
require 'db.php';

$search = $_GET['search'] ?? '';

if ($search) {
    $stmt = $pdo->prepare("SELECT * FROM pacientes WHERE 
        nombre LIKE ? OR 
        apellido LIKE ? OR 
        dni LIKE ? OR 
        nro_historia_clinica LIKE ?");
    $stmt->execute(["%$search%", "%$search%", "%$search%", "%$search%"]);
} else {
    $stmt = $pdo->query("SELECT * FROM pacientes ORDER BY fecha_creacion DESC");
}

$pacientes = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Hospital - Gestión de Pacientes</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Gestión de Pacientes</h1>
        
        <div class="search-container">
            <form action="index.php" method="GET">
                <input type="text" name="search" placeholder="Buscar por nombre, DNI o HC..." value="<?= htmlspecialchars($search) ?>">
                <button type="submit" class="btn btn-primary">Buscar</button>
                <a href="index.php" class="btn btn-warning">Limpiar</a>
                <a href="paciente.php" class="btn btn-success" style="float: right;">+ Nuevo Paciente</a>
            </form>
        </div>

        <table>
            <thead>
                <tr>
                    <th>HC</th>
                    <th>Nombre y Apellido</th>
                    <th>DNI</th>
                    <th>Edad</th>
                    <th>Obra Social</th>
                    <th>Grupo Sang.</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($pacientes as $p): ?>
                <tr>
                    <td><?= htmlspecialchars($p['nro_historia_clinica']) ?></td>
                    <td><?= htmlspecialchars($p['nombre'] . ' ' . $p['apellido']) ?></td>
                    <td><?= htmlspecialchars($p['dni']) ?></td>
                    <td><?= htmlspecialchars($p['edad']) ?></td>
                    <td><?= htmlspecialchars($p['obra_social']) ?></td>
                    <td><?= htmlspecialchars($p['grupo_sanguineo']) ?></td>
                    <td class="actions">
                        <a href="paciente.php?id=<?= $p['id'] ?>" class="btn btn-primary">Editar</a>
                        <a href="procesar.php?action=delete&id=<?= $p['id'] ?>" class="btn btn-danger" onclick="return confirm('¿Eliminar paciente?')">Eliminar</a>
                    </td>
                </tr>
                <?php endforeach; ?>
                <?php if (empty($pacientes)): ?>
                <tr>
                    <td colspan="7" style="text-align: center;">No se encontraron pacientes.</td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
