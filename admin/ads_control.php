<div class="modal fade" id="modal_manager_ads_video" tabindex="-1" role="dialog"
    aria-labelledby="modal_manager_ads_video_label" aria-hidden="trues">
    <div class="modal-dialog modal-fullscreen-lg-down" role="document" style="--bs-modal-width: 850px;">
        <div class="modal-content" style="background-color: #212529;">
            <div class="modal-header justify-content-center align-items-center">
                <h5 class="modal-title" id="modal_manager_ads_video_label">Gerenciador de Vídeos</h5>
                <button type="button" class="btn-close d-flex align-items-center justify-content-center"
                    data-bs-dismiss="modal" aria-label="Close" style="color:white; --bs-btn-close-bg:none;"><i
                        class="fa-solid fa-xmark fa-2xl" style="color: #f0f2f4;"></i></button>
            </div>
            <div class="modal-body">
                <ul id="videoList" class="list-group mb-3">
                    <!-- Vídeos serão listados aqui -->
                </ul>
                <hr>
                <form id="uploadForm" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="videoUpload" class="form-label">Upload de Novo Vídeo</label>
                        <input class="form-control" type="file" id="videoUpload" name="video" accept=".mp4,.m4a">
                    </div>
                    <div class="mb-3">
                        <video id="videoPreview" controls style="max-width: 40%; display: none;"></video>
                    </div>
                    <div class="progress mb-3" style="display: none;" id="uploadProgressContainer">
                        <div id="uploadProgressBar" class="progress-bar" role="progressbar" style="width: 0%;"></div>
                    </div>
                    <div class="row justify-content-center align-itemns-center py-3 btn-container">
                        <button type="submit" class="btn btn-primary w-100">Upload</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    // Função para listar os vídeos
    // Função para listar os vídeos
    function fetchVideos() {
        fetch('../assets/function/get_videos.php') // Função PHP que retorna a lista de vídeos
            .then(response => response.json())
            .then(data => {
                const videoList = document.getElementById('videoList');
                videoList.innerHTML = ''; // Limpa a lista de vídeos
                data.forEach(video => {
                    const listItem = document.createElement('li');
                    listItem.className = 'list-group-item d-flex justify-content-between align-items-center';
                    listItem.innerHTML = `
                    <a href="../assets/ads/${video}" target="_blank">
                        <span onclick="window.location.href('../assets/ads/${video}')">${video}</span> 
                        <i class="fa-solid fa-arrow-up-right-from-square"></i> 
                    </a>
                    <button class="btn btn-danger btn-sm" onclick="deleteVideo('${video}')">Apagar</button>
                `;
                    videoList.appendChild(listItem);
                });
            })
            .catch(error => {
                console.error('Erro ao carregar os vídeos:', error);
            });
    }

    // Função para apagar um vídeo
    function deleteVideo(video) {
        if (confirm(`Tem certeza que deseja apagar o vídeo ${video}?`)) {
            fetch('../assets/function/delete_video.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({
                        video
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        fetchVideos(); // Atualiza a lista de vídeos
                    } else {
                        alert('Erro ao apagar o vídeo');
                    }
                })
                .catch(error => {
                    console.error('Erro ao apagar o vídeo:', error);
                });
        }
    }

    // Função para exibir o preview do vídeo selecionado para upload
    document.getElementById('videoUpload').addEventListener('change', function(event) {
        const file = event.target.files[0];
        const videoPreview = document.getElementById('videoPreview');

        if (file) {
            const url = URL.createObjectURL(file);
            videoPreview.src = url;
            videoPreview.style.display = 'block';
        } else {
            videoPreview.style.display = 'none';
        }
    });

    // Função para fazer upload de um vídeo com barra de progresso
    document.getElementById('uploadForm').addEventListener('submit', function(event) {
        event.preventDefault();
        const formData = new FormData(this);
        const uploadProgressContainer = document.getElementById('uploadProgressContainer');
        const uploadProgressBar = document.getElementById('uploadProgressBar');

        uploadProgressContainer.style.display = 'block';
        uploadProgressBar.style.width = '0%';

        fetch('../assets/function/upload_video.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    fetchVideos(); // Atualiza a lista de vídeos
                    this.reset(); // Reseta o formulário de upload
                    document.getElementById('videoPreview').style.display = 'none';
                } else {
                    alert('Erro ao fazer upload do vídeo');
                }
                uploadProgressContainer.style.display = 'none';
            })
            .catch(error => {
                console.error('Erro ao fazer upload do vídeo:', error);
                uploadProgressContainer.style.display = 'none';
            });

        // Atualiza a barra de progresso durante o upload
        fetch('../assets/function/upload_video.php', {
            method: 'POST',
            body: formData
        }).then(response => {
            response.body.getReader().read().then(function process({
                done,
                value
            }) {
                if (done) {
                    uploadProgressBar.style.width = '100%';
                    return;
                }
                let loaded = value.length;
                let total = parseInt(response.headers.get('Content-Length'));
                let percentComplete = (loaded / total) * 100;
                uploadProgressBar.style.width = `${percentComplete}%`;
            });
        });
    });

    // Inicializa a lista de vídeos quando o modal é aberto
    $('#modal_manager_ads_video').on('show.bs.modal', function() {
        fetchVideos();
    });
</script>