<?php
$site_icon = (isset($config['favicon']) ? $config['favicon'] : '../img.png') . "?t=" . $timestamp;
$site_bk = (isset($config['background']) ? $config['background'] : '../img.png') . "?t=" . $timestamp;
$site_bk_mobile = (isset($config['background_mb']) ? $config['background_mb'] : '../img.png') . "?t=" . $timestamp;
?>
<script src="../assets/js/jquery-3.5.1.min.js"></script>
<script src="../assets/js/jszip.min.js"></script>
<style>
    .accordion {
        .accordion-button {
            color: #ffff;
        }

        backdrop-filter: blur(100px);
        --bs-accordion-bg: #3d3d3d;
        --bs-accordion-active-bg: #0c0c0c;
    }

    label {
        color: white;
    }

    .form-group {
        padding-bottom: 10px;
    }

    @media only screen and (max-width: 767px) {
        div.btn-container {
            display: flex;
            flex-direction: column;
            gap: 1rem;
            justify-content: center;
        }

        .btn-container button {
            width: 100% !important;
        }
    }

    .hide {
        display: none !important;
    }

    h6,
    hr {
        color: #ffff;
    }

    .form-group label {
        font-size: 12px;
    }

    .color-group {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 1rem;
    }

    .spin-opacity-animation {
        animation: spin 2s reverse infinite;
    }

    @keyframes spin {
        0% {
            opacity: 100%;
        }

        30% {
            opacity: 80%;
        }

        50% {
            opacity: 60%;
        }


        100% {
            opacity: 30%;
        }

    }

    .input_with_preview {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }

    .img_preview {
        margin-top: 10px;
        height: 100px;
        border-radius: 6px;
    }

    .edit_btn_conf {
        font-size: 23px;
        background-color: #fa7922;
        padding: 8px;
        margin-left: 2px;
        border-radius: 5px;
        cursor: pointer;
    }
</style>
<div class="container w-60 mb-2">
    <form id="configForm">
        <div class="accordion" id="accordionConfig">
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Geral
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionConfig">
                    <div class="accordion-body row justify-content-between">
                        <div class="form-group col-md-auto">
                            <label for="wifi_name">Nome do WiFi</label>
                            <input type="text" class="form-control" id="wifi_name" placeholder="SnapNow">
                        </div>
                        <div class="form-group col-md-5">
                            <label for="site_title">Titulo da pagina de Login</label>
                            <input type="text" class="form-control" id="site_title" placeholder="Seu titulo aqui!">
                        </div>
                        <div class="col-md-auto d-flex align-items-center justify-content-center">
                            <div class="btn btn-secondary d-flex flex-row justify-content-center align-items-center">
                                <span>Anuncios </span>
                                <div>
                                    <button type="button" class="ms-2 btn btn-info" data-bs-toggle="modal"
                                        data-bs-target="#modal_manager_ads_video">
                                        <i class="fa-solid fa-video"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="site_description">Descrição do Site</label>
                            <textarea type="text" class="form-control" id="site_description"></textarea>
                        </div>
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                        Personalização
                    </button>
                </h2>
                <div id="collapseFour" class="accordion-collapse collapse" data-bs-parent="#accordionConfig">
                    <div class="accordion-body row">
                        <h6 class="text-center">Site</h6>
                        <div class="input_with_preview col-md-4">
                            <div class="form-group">
                                <label for="site_icon" class="form-label">Icone</label>
                                <div class="d-flex">
                                    <input class="form-control" type="file" id="site_icon" accept="image/*">
                                    <i class="fa-solid fa-pen-to-square edit_btn_conf" id="btn_edit_site_icon"
                                        style="display:none;"></i>
                                </div>
                            </div>
                            <div>
                                <img class="img_preview" src="<?php echo $site_icon; ?>" alt="Imagem não encontrada"
                                    id="preview_btn_edit_site_icon">
                            </div>
                        </div>

                        <div class="input_with_preview col-md-4">
                            <div class="form-group">
                                <label for="site_bk" class="form-label">Fundo para Desktop</label>
                                <div class="d-flex">
                                    <input class="form-control" type="file" id="site_bk" accept="image/*">
                                    <i class="fa-solid fa-pen-to-square edit_btn_conf" id="btn_edit_site_bk"
                                        style="display:none;"></i>
                                </div>
                            </div>
                            <div>
                                <img class="img_preview" src="<?php echo $site_bk; ?>" alt="Imagem não encontrada"
                                    id="preview_btn_edit_site_bk">
                            </div>
                        </div>

                        <div class="input_with_preview col-md-4">
                            <div class="form-group">
                                <label for="site_bk_mobile" class="form-label">Fundo Mobile</label>
                                <div class="d-flex">
                                    <input class="form-control" type="file" id="site_bk_mobile" accept="image/*">
                                    <i class="fa-solid fa-pen-to-square edit_btn_conf" id="btn_edit_site_bk_mobile"
                                        style="display:none;"></i>
                                </div>
                            </div>
                            <div>
                                <img class="img_preview" src="<?php echo $site_bk_mobile; ?>"
                                    alt="Imagem não encontrada" id="preview_btn_edit_site_bk_mobile">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                        Cores
                    </button>
                </h2>
                <div id="collapseFive" class="accordion-collapse collapse" data-bs-parent="#accordionConfig">
                    <div class="accordion-body row">
                        <div class="col-md-6">
                            <h6 class="text-center">Degrade sobre o fundo</h6>
                            <div class="d-flex justify-content-around">
                                <div class="form-group">
                                    <div class="col-md-auto">
                                        <label for="colorLinearGradient_1" class="form-label">Cor 1</label>
                                        <input onchange="updatePreviewGradient();" type="color" class="form-control form-control-color"
                                            id="colorLinearGradient_1" value="#282f51" title="Choose your color">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-auto">
                                        <label for="colorLinearGradient_2" class="form-label">Cor 2</label>
                                        <input onchange="updatePreviewGradient();" type="color" class="form-control form-control-color"
                                            id="colorLinearGradient_2" value="#01f6d0" title="Choose your color">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="d-flex flex-row align-items-center justify-content-center" style="color: #ffffff; font-size: 14px;">
                                    <span>
                                        Opacidade:
                                    </span>
                                    <input onchange="valueChangeReturn('opacityLinearGradientValue', 'opacityLinearGradient'); updatePreviewGradient();" type="text" class="text-end" id="opacityLinearGradientValue" value="50" style="width: 35px; background: none; border: none; margin: 0 0 0 10px; color: white;">
                                    <span>
                                        <strong>%</strong></span>
                                </div>
                                <div class="d-flex">
                                    <input onpointermove="valueChangeReturn('opacityLinearGradient', 'opacityLinearGradientValue'); updatePreviewGradient();" type="range" class="form-range"
                                        id="opacityLinearGradient" min="0" max="100" title="Choose your color">
                                </div>
                            </div>
                        </div>
                        <!-- Preview Degrade -->
                        <div id="background-preview" class="col-md-5">
                            <div id="background-linear-gradient-preview"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

</div>


<div class="row justify-content-center align-itemns-center py-3 btn-container">
    <div class="col-auto">
        <button type="button" class="btn btn-success" onclick="saveConfig()">Salvar Configuração</button>
    </div>
    <div class="col-auto">
        <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#download_photos">Baixar Hotspot</button>
    </div>
</div>
</form>
</div>

<script>
    loadConfig();

    function valueChangeReturn(idInput, idReturn) {
        console.log("preview atualizado");
        document.getElementById(idReturn).value = document.getElementById(idInput).value;
        document.getElementById(idReturn).innerHTML = document.getElementById(idInput).value;
    }

    function updatePreviewGradient() {
        color_1 = document.getElementById("colorLinearGradient_1").value;
        color_2 = document.getElementById("colorLinearGradient_2").value;
        opacity = document.getElementById("opacityLinearGradient").value / 100;
        gradient_preview = document.getElementById("background-linear-gradient-preview");
        image = document.getElementById("preview_btn_edit_site_bk").getAttribute('src');
        background_preview = document.getElementById("background-preview");
        background_preview.style = `background: url("${image}"); background-size: cover;`;

        gradient_preview.style = `background: linear-gradient(0deg, ${color_1}, ${color_2}); opacity: ${opacity}`;
    }

    function loadConfig() {
        $.ajax({
            url: '../config.json', // Carrega do banco de dados
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                $('#site_title').val(data.site_title);
                $('#wifi_name').val(data.wifi_name);
                $('#site_description').val(data.site_description);
                $('#colorInputBackgroundSite').val(data.colorInputBackgroundSite);
                $('#colorInputBackgroudMenu').val(data.colorInputBackgroudMenu);
                $('#colorLinearGradient_1').val(data.colorLinearGradient_1);
                $('#colorLinearGradient_2').val(data.colorLinearGradient_2);
                $('#opacityLinearGradient').val(data.opacityLinearGradient);
            },
            error: function() {
                alert('Erro ao carregar a configuração.');
            }
        });
    }

    async function saveStyle() {
        try {
            const response = await fetch('../assets/css/style.php');
            const cssContent = await response.text();

            const saveResponse = await fetch('../assets/function/save_style.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: new URLSearchParams({
                    cssContent
                }),
            });

            const result = await saveResponse.text();
            console.log(result);
        } catch (error) {
            console.error('Erro ao salvar o arquivo CSS:', error);
        }
    }

    function saveConfig() {
        const inputs = ['site_icon', 'site_bk', 'site_bk_mobile'];

        const formData = new FormData();
        inputs.forEach(inputId => {
            const inputFile = document.getElementById(inputId);
            const file = inputFile.files[0];

            if (file) {
                formData.append('image', file);
                formData.append('usage', inputId);
            }
        });

        saveStyle();

        const config = {
            wifi_name: $('#wifi_name').val(),
            site_title: $('#site_title').val(),
            site_description: $('#site_description').val(),
            favicon: "../assets/img/logo.webp",
            background: "../assets/img/background.webp",
            background_mb: "../assets/img/background_mb.webp",
            colorLinearGradient_1: $('#colorLinearGradient_1').val(),
            colorLinearGradient_2: $('#colorLinearGradient_2').val(),
            opacityLinearGradient: $('#opacityLinearGradient').val()
        };



        // Enviar configuração para o PHP
        fetch('./save_config.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify(config),
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert('Configurações salvas com sucesso!');
                } else {
                    alert('Erro ao salvar configurações.');
                }
            })
            .catch(error => console.error('Erro:', error));
    }

    $(document).ready(function() {
        loadConfig();
    });

    function checkActive(divSelect, selectID) {
        const divClass = document.getElementsByClassName(divSelect);
        const selectValue = document.getElementById(selectID).value; // Corrigido para .value

        if (selectValue === "true") {
            for (let i = 0; i < divClass.length; i++) {
                divClass[i].classList.remove("hide");
            }
        } else {
            for (let i = 0; i < divClass.length; i++) {
                divClass[i].classList.add("hide");
            }
        }
    }


    function readURL(input, previewElement, btnEdit) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $(previewElement).attr('src', e.target.result);
                $(btnEdit).show();
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    $('#site_icon').change(function() {
        readURL(this, '#preview_btn_edit_site_icon', '#btn_edit_site_icon');
    });

    $('#site_bk').change(function() {
        readURL(this, '#preview_btn_edit_site_bk', '#btn_edit_site_bk');
    });

    $('#site_bk_mobile').change(function() {
        readURL(this, '#preview_btn_edit_site_bk_mobile', '#btn_edit_site_bk_mobile');
    });

    document.querySelectorAll('.edit_btn_conf').forEach(btn => {
        btn.addEventListener('click', function() {
            const inputId = btn.id.replace('btn_edit_', '');
            const inputFile = document.getElementById(inputId);
            const file = inputFile.files[0];

            if (file) {
                const formData = new FormData();
                formData.append('image', file);
                formData.append('usage', inputId); // favicon, background, background-mb

                fetch('./update_image.php', {
                        method: 'POST',
                        body: formData
                    })
                    .then(response => response.text()) // Use text() primeiro
                    .then(text => {
                        console.log('Resposta completa:', text); // Log da resposta
                        return JSON.parse(text); // Converta para JSON depois de inspecionar
                    })
                    .then(data => {
                        if (data.success) {
                            alert('Imagem enviada com sucesso!');
                            document.getElementById(btn.id).style.display = "none";
                        } else {
                            // console.log(data.message + " - " + data.usage);
                            alert('Erro ao enviar a imagem.');
                        }
                    })
                //.catch(error => console.error('Erro:', error));
            }
        });
    });
</script>