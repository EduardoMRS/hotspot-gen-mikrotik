<?php
$config = json_decode(file_get_contents('../config.json'), true);
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotspot Generator by Edu</title>
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/fonts/fa/css/all.css">
    <link rel="stylesheet" href="../assets/css/style.php?v=2.2">
    <link rel="shortcut icon" href="./logo.webp">


    <script src="../assets/js/jquery-3.5.1.min.js"></script>
    <script src="../assets/js/jszip.min.js"></script>
    <script src="../assets/js/FileSaver.min.js"></script>
</head>
<style>
    .btn-delete {
        right: 0;
    }

    @media only screen and (max-width: 767px) {
        .imgContainer {
            width: 142px;
            height: fit-content;
            justify-content: center;
        }

        #photos {
            padding: 0 !important;
        }
    }

    .imgContainer {
        height: 300px;
    }

    .modal-title {
        color: white;
    }

    .oclusion {
        opacity: 30% !important;
        transition: 0.5s;
    }

    .no-oclusion {
        opacity: 100%;
        transition: 1s;
    }

    .img-fluid {
        width: auto !important;
        height: 16rem !important;
    }

    #background {
        background: url(./background.webp);
    }
</style>

<body>
    <div id="background">
        <div id="background-linear-gradient"></div>
    </div>

    <section class="container" id="section_config">
        <?php include("./config.php"); ?>
    </section>

    <section class="container" id="sction_ads_control"></section>
    <?php include("./ads_control.php"); ?>
    </section>


    <!-- Modal Download -->
    <div class="modal fade" id="download_hotspot" tabindex="-1" role="dialog" aria-labelledby="download_hotspot_Label"
        aria-hidden="trues">
        <div class="modal-dialog" role="document" style="--bs-modal-width: 300px;">
            <div class="modal-content" style="background-color: #212529;">
                <div class="modal-header justify-content-center align-items-center">
                    <h5 class="modal-title" id="download_hotspot_Label"></h5>
                    <button type="button" class="btn-close d-flex align-items-center justify-content-center"
                        data-bs-dismiss="modal" aria-label="Close" style="color:white; --bs-btn-close-bg:none;"><i
                            class="fa-solid fa-xmark fa-2xl" style="color: #f0f2f4;"></i></button>
                </div>
                <div class="modal-body d-flex flex-column justify-content-center align-items-center">
                    <?php
                    $dirPhotosSelect = (isset($_GET['date']) || $_GET['date']) ? $_GET['date'] : null;
                    include("./download.php");
                    ?>
                </div>
            </div>
        </div>
    </div>

    <script src="../assets/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
</body>

</html>