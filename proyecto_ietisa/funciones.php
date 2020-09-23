<?php

// CONEXIÓN A LA BASE DE DATOS



// SUBIR IMAGEN
function upload_image($archivo) {

    $validacion_imagen = 1;    // 1 cumple - 0 No cumple
    $directorio_imagenes = 'imagenes/';
    $url_final = $directorio_imagenes.basename($archivo['name']);

    $extension_imagen = strtolower(pathinfo($url_final, PATHINFO_EXTENSION));

    //Validar si el archivo existe
    if (file_exists($url_final)) {
        echo 'La imagen ya existe! <br>';
        $validacion_imagen = 0;
    }
    
    //Validar el tamaño del archivo
    if ($archivo['size'] > 5000000) {
        echo 'La imagen es muy grande! <br>';
        $validacion_imagen = 0;
    }

    //Validar el formato permitido
    if ($extension_imagen != 'jpg' && $extension_imagen != 'png') {
        echo 'El formato del archivo no es permitido! <br>';
        $validacion_imagen = 0;
    }

    if ($validacion_imagen == 0) {
        echo 'La imagen no se puede subir <br>';
        return null;
    } else {
        if (move_uploaded_file($archivo['tmp_name'], $url_final)) {
            echo 'La imagen se subió correctamente';
            return $url_final;   
        } else {
            echo 'Hubo un error al subir la imagen';
            return null;
        }
    }

}








?>