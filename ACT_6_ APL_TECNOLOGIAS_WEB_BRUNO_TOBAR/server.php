<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo "<h2>Datos Recibidos:</h2>";

    foreach ($_POST as $campo => $valor) {
        if (is_array($valor)) {
            echo "<strong>$campo:</strong> " . implode(", ", $valor) . "<br>";
        } else {
            echo "<strong>$campo:</strong> $valor<br>";
        }
    }

    if (isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {
        echo "<strong>Archivo subido:</strong> " . $_FILES['file']['name'] . "<br>";
    } else {
        echo "<strong>Archivo:</strong> No se subió ningún archivo.<br>";
    }
} else {
    echo "No se recibió datos por POST.";
}
?>
