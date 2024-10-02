<?php
header('Content-Type: application/json');
// ini_set('display_errors', 1); // Habilitar erros durante o desenvolvimento
// error_reporting(E_ALL); // Reportar todos os erros

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['image'])) {
    $usage = $_POST['usage'];
    $allowedTypes = ['image/png', 'image/jpeg', 'image/jpg', 'image/gif', 'image/webp'];
    $imageType = mime_content_type($_FILES['image']['tmp_name']);

    if (!in_array($imageType, $allowedTypes)) {
        echo json_encode(['success' => false, 'message' => 'Tipo de imagem não permitido']);
        exit;
    }

    $extension = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
    switch ($usage) {
        case 'site_icon':
            $targetDir = '../assets/img/';
            $targetFile = $targetDir . 'logo.' . $extension;
            break;
        case 'site_bk':
            $targetDir = '../assets/img/';
            $targetFile = $targetDir . 'background.' . $extension;
            break;
        case 'site_bk_mobile':
            $targetDir = '../assets/img/';
            $targetFile = $targetDir . 'background_mb.' . $extension;
            break;
        default:
            echo json_encode(['success' => false, 'message' => 'Uso inválido']);
            exit;
    }

    if (!move_uploaded_file($_FILES['image']['tmp_name'], $targetFile)) {
        echo json_encode(['success' => false, 'message' => 'Erro no upload']);
        exit;
    }

    function convertToWebP($filePath, $outputPath) {
        $image = imagecreatefromstring(file_get_contents($filePath));
        if ($image !== false) {
            imagewebp($image, $outputPath);
            imagedestroy($image);
            return true;
        }
        return false;
    }

    $webpFile = preg_replace('/\.[a-zA-Z]+$/', '.webp', $targetFile);

    function resizable($webpFile, $size, $iconFile) {
        $image = imagecreatefromwebp($webpFile);
        $resizedImage = imagecreatetruecolor($size, $size);
        imagealphablending($resizedImage, false);
        imagesavealpha($resizedImage, true);
        $transparent = imagecolorallocatealpha($resizedImage, 0, 0, 0, 127);
        imagefill($resizedImage, 0, 0, $transparent);
        imagecopyresampled($resizedImage, $image, 0, 0, 0, 0, $size, $size, imagesx($image), imagesy($image));
        imagewebp($resizedImage, $iconFile);
        imagedestroy($image);
        imagedestroy($resizedImage);
    }

    if (convertToWebP($targetFile, $webpFile)) {
        if ($usage === 'site_icon') {
            $size = 192;
            $iconsDir = '../';
            $iconFile = $iconsDir . 'logo.webp';
            resizable($webpFile, $size, $iconFile);
        }

        if ($extension !== 'webp') {
            unlink($targetFile);
        }

        echo json_encode(['success' => true, 'message' => 'Imagem enviada e convertida com sucesso', 'usage' => $usage]);
    } else {
        unlink($targetFile);
        echo json_encode(['success' => false, 'message' => 'Erro na conversão para WebP', 'usage' => $usage]);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Nenhum arquivo foi enviado!']);
}
