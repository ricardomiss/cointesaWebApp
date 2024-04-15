<?php
define('BASE_URL', 'http://localhost/Cointesa/COINTESA/');
$file = $_FILES['upload'];

if ( $file['error'] === UPLOAD_ERR_OK ) {
    $fileName = $file['name'];
    $tmpName = $file['tmp_name'];
    $fileSize = $file['size'];
    $fileType = $file['type'];
    $destination = '../system/assets/images/' . $fileName;

    if ( move_uploaded_file( $tmpName, $destination ) ) {
        $response = [
            'uploaded' => 1,
            'fileName' => $fileName,
            'url' => BASE_URL . 'system/assets/images/' . $fileName
        ];
    } else {
        $response = [
            'uploaded' => 0,
            'error' => [
                'message' => 'Error al subir la imagen.'
            ]
        ];
    }
} else {
    $response = [
        'uploaded' => 0,
        'error' => [
            'message' => 'Error en la subida de la imagen.'
        ]
    ];
}

echo json_encode( $response );
