<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["archivo"])) {
    $target_dir = "uploads/"; // C:\Users\secreinv\Downloads\pagina\uploads
    $target_file = $target_dir . basename($_FILES["archivo"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    // Verificar si el archivo es un PDF
    if($imageFileType != "pdf") {
        echo "Solo se permiten archivos PDF.";
        $uploadOk = 0;
    }

    // Si no hay problemas, intenta subir el archivo
    if ($uploadOk == 0) {
        echo "El archivo no se subió.";
    } else {
        if (move_uploaded_file($_FILES["archivo"]["tmp_name"], $target_file)) {
            echo "El archivo ". basename( $_FILES["archivo"]["name"]). " ha sido subido.";
        } else {
            echo "Hubo un error al subir el archivo.";
        }
    }
}
?>
