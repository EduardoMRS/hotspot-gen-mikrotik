<?php // Lista arquivos para download
$dir_base = "../../";
$files = [];

// Pastas e arquivos a serem ignorados
$ignoredDirs = ['admin', 'function'];
$ignoredFiles = ['assets/css/style.php', 'index.php', 'README.md'];

// Função recursiva para listar arquivos
function listFiles($dir, $ignoredDirs, $ignoredFiles) {
    $files = [];
    $listDir = array_diff(array_filter(scandir($dir)), array(".", ".."));

    foreach ($listDir as $entry) {
        $fullPath = $dir . $entry;

        // Ignora diretórios e arquivos indesejados
        if (is_dir($fullPath)) {
            if (!in_array($entry, $ignoredDirs)) {
                // Se for um diretório, chama a função recursivamente
                $files = array_merge($files, listFiles($fullPath . "/", $ignoredDirs, $ignoredFiles));
            }
        } else {
            // Se for um arquivo, verifica se deve ser ignorado
            if (!in_array(str_replace("../../", "", $fullPath), $ignoredFiles)) {
                $files[] = [
                    'file' => str_replace("../../", "", $fullPath), // Ajuste o caminho
                    'time' => filemtime($fullPath)
                ];
            }
        }
    }

    return $files;
}

// Executa a função e obtém os arquivos
$files = listFiles($dir_base, $ignoredDirs, $ignoredFiles);

// Extrair apenas os nomes dos arquivos, agora ordenados por data
$files = array_column($files, 'file');

// Para debug, imprime os arquivos
// echo "<pre>" . print_r($files, true) . "</pre>";
echo json_encode(array_values($files));
