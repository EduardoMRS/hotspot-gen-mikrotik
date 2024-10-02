<?php
$data = json_decode(file_get_contents('php://input'), true);
$video = $data['video'];

$filePath = '../ads/' . $video;
if (file_exists($filePath)) {
    unlink($filePath);

    // Remove o vídeo do JSON
    $adsFile = '../../ads.json';
    $adsData = [];
    if (file_exists($adsFile)) {
        $adsData = json_decode(file_get_contents($adsFile), true);
    }

    // Remove o vídeo do array
    $adsData = array_filter($adsData, function ($item) use ($video) {
        return $item !== 'ads/' . $video; // Verifica o caminho correto
    });

    // Reindexa e salva o array atualizado
    file_put_contents($adsFile, json_encode(array_values($adsData)));

    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false, 'message' => 'Vídeo não encontrado']);
}
