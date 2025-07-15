<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Factura</title>
    <link rel="stylesheet" href="public/lib/bootstrap/css/bootstrap.min.css">
</head>

<body class="bg-secondary p-4">
    <!-- CONTENEDOR DE TODA LA FACTURA -->
    <div class="container">
        <div class="card mb-4 " style="width: 60rem;">
            <!-- CARD DE LA CABECERA DE LA FACTURA-->
            <h2 class="card-title bg-primary">Facturador</h2>
            <div class="card-body">
                <form action="procesar.php" method="POST">
                    <h4>Datos del Cliente</h4>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label>Nombre del cliente:</label>
                            <input type="text" name="cliente" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label>Correo electrónico:</label>
                            <input type="email" name="correo" class="form-control" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label>Fecha:</label>
                            <input type="date" name="fecha" class="form-control" required>
                        </div>
                        <div class="col-md-8">
                            <label>Comentarios:</label>
                            <textarea name="comentarios" class="form-control"></textarea>
                        </div>
                    </div>
            </div>
        </div>

        <!-- CARD DE LOS PRODUCTOS DE LA FACTURA-->
        <div class="card mb-4 " style="width: 60rem;">

            <h2 class="card-title bg-success">Productos</h2>
            <div class="card-body">
                <!-- Producto 1 -->
                <fieldset class="border rounded p-3 mb-3 bg-white">
                    <legend class="float-none w-auto px-2">Producto 1</legend>
                    <div class="row mb-2">
                        <div class="col-md-4">
                            <label>Nombre:</label>
                            <input type="text" name="producto[]" class="form-control" required>
                        </div>
                        <div class="col-md-4">
                            <label>Precio:</label>
                            <input type="number" name="precio[]" class="form-control" step="0.01" required>
                        </div>
                        <div class="col-md-4">
                            <label>Cantidad:</label>
                            <input type="number" name="cantidad[]" class="form-control" required>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-6">
                            <label>Categoría:</label>
                            <select name="categoria[]" class="form-select">
                                <option value="Alimentos">Alimentos</option>
                                <option value="Electrónica">Electrónica</option>
                                <option value="Ropa">Ropa</option>
                                <option value="Otros">Otros</option>
                            </select>
                        </div>
                        <div class="col-md-6 d-flex align-items-end">
                            <div class="form-check">
                                <input type="checkbox" name="iva[]" value="0" class="form-check-input">
                                <label class="form-check-label">IVA</label>
                            </div>
                        </div>
                    </div>
                </fieldset>

                <!-- Producto 2 -->
                <fieldset class="border rounded p-3 mb-3 bg-white">
                    <legend class="float-none w-auto px-2">Producto 2</legend>
                    <div class="row mb-2">
                        <div class="col-md-4">
                            <label>Nombre:</label>
                            <input type="text" name="producto[]" class="form-control" required>
                        </div>
                        <div class="col-md-4">
                            <label>Precio:</label>
                            <input type="number" name="precio[]" class="form-control" step="0.01" required>
                        </div>
                        <div class="col-md-4">
                            <label>Cantidad:</label>
                            <input type="number" name="cantidad[]" class="form-control" required>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-6">
                            <label>Categoría:</label>
                            <select name="categoria[]" class="form-select">
                                <option value="Alimentos">Alimentos</option>
                                <option value="Electrónica">Electrónica</option>
                                <option value="Ropa">Ropa</option>
                                <option value="Otros">Otros</option>
                            </select>
                        </div>
                        <div class="col-md-6 d-flex align-items-end">
                            <div class="form-check">
                                <input type="checkbox" name="iva[]" value="1" class="form-check-input">
                                <label class="form-check-label">IVA</label>
                            </div>
                        </div>
                    </div>
                </fieldset>

                <!-- Producto 3 -->
                <fieldset class="border rounded p-3 mb-3 bg-white">
                    <legend class="float-none w-auto px-2">Producto 3</legend>
                    <div class="row mb-2">
                        <div class="col-md-4">
                            <label>Nombre:</label>
                            <input type="text" name="producto[]" class="form-control" required>
                        </div>
                        <div class="col-md-4">
                            <label>Precio:</label>
                            <input type="number" name="precio[]" class="form-control" step="0.01" required>
                        </div>
                        <div class="col-md-4">
                            <label>Cantidad:</label>
                            <input type="number" name="cantidad[]" class="form-control" required>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-6">
                            <label>Categoría:</label>
                            <select name="categoria[]" class="form-select">
                                <option value="Alimentos">Alimentos</option>
                                <option value="Electrónica">Electrónica</option>
                                <option value="Ropa">Ropa</option>
                                <option value="Otros">Otros</option>
                            </select>
                        </div>
                        <div class="col-md-6 d-flex align-items-end">
                            <div class="form-check">
                                <input type="checkbox" name="iva[]" value="2" class="form-check-input">
                                <label class="form-check-label">IVA</label>
                            </div>
                        </div>
                    </div>
                </fieldset>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Generar Factura</button>
        <footer>
            <center>Patricia Lapuerta | Bruno Tobar</center>
        </footer>
        </form>
    </div>
</body>

</html>