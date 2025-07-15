<?php
function calcularTotalConIVA($precio, $cantidad, $aplicaIVA)
{
    $subtotal = $precio * $cantidad;
    $iva = $aplicaIVA ? $subtotal * 0.15 : 0;
    $total = $subtotal + $iva;
    return [$subtotal, $iva, $total];
}

$cliente = $_POST['cliente'];
$correo = $_POST['correo'];
$fecha = $_POST['fecha'];
$comentarios = $_POST['comentarios'];

$productos = $_POST['producto'];
$precios = $_POST['precio'];
$cantidades = $_POST['cantidad'];
$categorias = $_POST['categoria'];
$ivasMarcados = isset($_POST['iva']) ? $_POST['iva'] : [];

$subtotalGeneral = 0;
$totalIVA = 0;
$totalPagar = 0;
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Factura Generada</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>

<body class="p-4">

    <div class="container">
        <img src="img/factura.png" alt="Factura logo" width="50">
        <h2 class="text-end text-danger">#00000001</h2>
        <h2 class="mb-4">Factura Generada </h2>
        <div class=" mb-4">
            <strong>Cliente:</strong> <?= $cliente ?><br>
            <strong>Correo:</strong> <?= $correo ?><br>
            <strong>Fecha:</strong> <?= $fecha ?><br>
            <strong>Comentarios:</strong> <?= $comentarios ?><br>
        </div>

        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>Producto</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Categoría</th>
                    <th>Subtotal</th>
                    <th>IVA</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <?php for ($i = 0; $i < count($productos); $i++):
                    $aplicaIVA = in_array($i, $ivasMarcados);
                    list($sub, $iva, $tot) = calcularTotalConIVA($precios[$i], $cantidades[$i], $aplicaIVA);

                    $subtotalGeneral += $sub;
                    $totalIVA += $iva;
                    $totalPagar += $tot;
                ?>
                    <tr>
                        <td><?= $productos[$i] ?></td>
                        <td>$<?= $precios[$i] ?></td>
                        <td><?= $cantidades[$i] ?></td>
                        <td><?= $categorias[$i] ?></td>
                        <td>$<?= $sub ?></td>
                        <td>$<?= $iva ?></td>
                        <td>$<?= $tot ?></td>
                    </tr>
                <?php endfor; ?>
            </tbody>
            <tfoot class="table-light">
                <tr>
                    <th colspan="4" class="text-end">Subtotal:</th>
                    <th colspan="3">$<?= $subtotalGeneral ?></th>
                </tr>
                <tr>
                    <th colspan="4" class="text-end">Total IVA:</th>
                    <th colspan="3">$<?= $totalIVA ?></th>
                </tr>
                <tr class="table-success">
                    <th colspan="4" class="text-end">Total a pagar:</th>
                    <th colspan="3">$<?= $totalPagar ?></th>
                </tr>
            </tfoot>
        </table>

        <a href="index.php" class="btn btn-secondary">Nueva Factura</a>
    </div>
</body>

</html>