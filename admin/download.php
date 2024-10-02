<div class="d-flex flex-column">
    <button id="downloadBtn" class="btn btn-primary">Baixar Hotspot</button>
    <div id="div_progressBar" class="progress" style="display: none;">
        <div id="progressBar" class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;">
            0%
        </div>
    </div>
</div>

<script>
    document.getElementById('downloadBtn').addEventListener('click', function() {
        saveConfig();
        const progressBarDiv = document.getElementById("div_progressBar");
        const progressBar = document.getElementById("progressBar");
        const downloadBtn = document.getElementById('downloadBtn');

        progressBarDiv.style.display = "block";
        downloadBtn.disabled = true;

        fetch('../assets/function/list_files.php')
            .then(response => response.json())
            .then(fileNames => {
                const zip = new JSZip();
                let count = 0;

                fileNames.forEach(function(fileName) {
                    const url = `../${fileName}`;
                    // console.log(url);


                    fetch(url)
                        .then(function(response) {
                            return response.blob();
                        })
                        .then(function(blob) {
                            zip.file(fileName, blob);
                            count++;

                            const percentDownload = (count / fileNames.length) * 100;
                            progressBar.style.width = `${percentDownload}%`;
                            progressBar.setAttribute("aria-valuenow", percentDownload);
                            progressBar.innerText = `${Math.round(percentDownload)}%`;

                            if (count === fileNames.length) {
                                progressBar.innerText = 'Aguarde, preparando o download...';

                                // Acompanhar o progresso da compress達o
                                zip.generateAsync({
                                        type: 'blob'
                                    }, function updateCallback(metadata) {
                                        const compressionProgress = Math.round(metadata.percent);
                                        progressBar.style.width = `${compressionProgress}%`;
                                        progressBar.setAttribute("aria-valuenow", compressionProgress);
                                        progressBar.innerText = `${compressionProgress}% (Compactando)`;
                                    })
                                    .then(function(content) {
                                        saveAs(content, 'hotspot.zip');
                                        progressBarDiv.style.display = 'none';
                                        downloadBtn.disabled = false;
                                    });
                            }
                        });
                });
            })
            .catch(error => {
                console.error('Erro ao buscar os arquivos:', error);
                alert('Erro ao preparar o download das fotos.');
                progressBarDiv.style.display = 'none';
                downloadBtn.disabled = false;
            });
    });
</script>