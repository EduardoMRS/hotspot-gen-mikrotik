<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);

    // Caminho do arquivo de configuração
    $configFilePath = '../config.json';

    // Salva a configuração no arquivo
    if (file_put_contents($configFilePath, json_encode($data, JSON_PRETTY_PRINT))) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Erro ao salvar arquivo.']);
    }
}
?>
