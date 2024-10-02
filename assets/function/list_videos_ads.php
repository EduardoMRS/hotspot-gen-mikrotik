<?php
// Caminho para a pasta de vídeos
$directory = "../ads";
$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
$url = "$protocol://$_SERVER[HTTP_HOST]";
$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$firstPartPath = explode('/', trim($path, '/'))[0]; // Pega a primeira parte do caminho

$url = $url . '/' . $firstPartPath;

// Array para armazenar os caminhos dos vídeos
$videos = [];

// Verifica se a pasta existe
if (is_dir($directory)) {
    // Abre a pasta
    if ($dir = opendir($directory)) {
        // Lê os arquivos na pasta
        while (($file = readdir($dir)) !== false) {
            // Verifica se é um arquivo de vídeo (mp4, etc.)
            if (pathinfo($file, PATHINFO_EXTENSION) == "mp4" || pathinfo($file, PATHINFO_EXTENSION) == "m4a") {
                // Adiciona o caminho completo ao array
                $videos[] = $url . "/assets/ads/" . rawurlencode($file);
                // $videos[] = "../assets/ads/" + $file;
            }
        }
        // Fecha a pasta
        closedir($dir);
    }
}

// Retorna o array como JSON
echo json_encode($videos);
