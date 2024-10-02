<?php
if ($_FILES['video']['error'] == UPLOAD_ERR_OK && is_uploaded_file($_FILES['video']['tmp_name'])) {
    $uploadDir = '../ads/';
    $uploadFile = $uploadDir . basename($_FILES['video']['name']);

    if (move_uploaded_file($_FILES['video']['tmp_name'], $uploadFile)) {
        // Adiciona o caminho do vídeo ao JSON
        $videoPath = 'ads/' . basename($_FILES['video']['name']); // Caminho relativo ao JSON
        $adsFile = '../../ads.json';

        $adsData = [];
        if (file_exists($adsFile)) {
            $adsData = json_decode(file_get_contents($adsFile), true);
        }

        // Evitar duplicatas
        if (!in_array($videoPath, $adsData)) {
            $adsData[] = $videoPath;
            file_put_contents($adsFile, json_encode($adsData));
        }

        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Erro ao mover o arquivo']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Erro no upload']);
}
