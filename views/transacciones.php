<?php
// Incluir la lógica
require_once 'api/transacciones/pago.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Pagar con Nequi</title>
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- referencia de stylos-->
    <link rel="stylesheet" href="assets/css/transaccionescss.css">
</head>
<body class="bg-light">
<div class="container py-5">
    <h1 class="fw-bold fs-1 mb-4">Formulario de Pago</h1>

    <!-- Formulario -->
    <form method="POST" class="card p-4 shadow-sm bg-white">
        <div class="mb-3">
            <label class="form-label">Teléfono (Nequi):</label>
            <input type="text" name="phoneNumber" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Monto:</label>
            <input type="number" name="amount" class="form-control" required step="1000" min="1000">
        </div>

        <div class="mb-3">
            <label class="form-label">Referencia:</label>
            <input type="text" name="reference" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success">Pagar</button>
    </form>

    <!-- Resultado del pago -->
    <?php if($result): ?>
        <div class="mt-4 card p-3 shadow-sm">
            <h4>Resultado del pago</h4>
            <?php if(isset($result['status']) && $result['status'] == "success"): ?>
                <p class="text-success">¡Pago realizado con éxito!</p>
                <p>Referencia: <?php echo htmlspecialchars($result['reference']); ?></p>
            <?php else: ?>
                <p class="text-danger">Hubo un error en el pago.</p>
                <pre><?php print_r($result); ?></pre>
            <?php endif; ?>
        </div>
    <?php endif; ?>
</div>
</body>
</html>
