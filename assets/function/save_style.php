<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cssContent = $_POST['cssContent'] ?? '';
    $result = file_put_contents(__DIR__ . '/../css/style.css', $cssContent);
    if ($result === false) {
        echo 'Erro ao salvar o arquivo.';
    } else {
        echo 'Arquivo salvo com sucesso!';
    }
} else {
    echo 'Método não permitido.';
}
