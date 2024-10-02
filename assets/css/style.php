<?php
$config = json_decode(file_get_contents('../../config.json'), true);
header("Content-Type: text/css");

// $timestamp = microtime(true) * 1000;
$timestamp = ((isset($timestamp)) ? $timestamp : "1");
$background = "../" . (isset($config["background"]) ? $config["background"] : "../assets/img/default.png") . "?t=" . $timestamp;
$background_mb = "../" . (isset($config["background_mb"]) ? $config["background_mb"] : "../assets/img/default.png") . "?t=" . $timestamp;

$colorLinearGradient_1 = (isset($config["colorLinearGradient_1"])) ? "$config[colorLinearGradient_1]" : "#282f51";
$colorLinearGradient_2 = (isset($config["colorLinearGradient_2"])) ? "$config[colorLinearGradient_2]" : "#41fed8";
$opacityLinearGradient = (isset($config["opacityLinearGradient"])) ? "$config[opacityLinearGradient]%" : "50%";

if (isset($debug)) {
?>
    <style>
        <?php
    }
        ?>
        /* Descktop */
        @media only screen and (min-width: 767px) {
            #background {
                background: url(<?php echo $background ?>) center no-repeat;
            }

            .w-60 {
                width: 60vw;
            }

            .w-40 {
                width: 40vw;
            }

            .w-30 {
                width: 30vw;
            }

            .ads-video {
                video {
                    height: 100% !important;
                    width: auto !important;
                }

                #play-box {
                    transform: translate(-50%, -44%) !important;
                }

                height: 60% !important;
                width: fit-content !important;
            }
        }

        /* Mobile */
        @media only screen and (max-width: 767px) {
            #background {
                background: url(<?php echo $background_mb ?>) center no-repeat;
            }
        }

        #background,
        #background-linear-gradient {
            position: fixed;
            top: 0;
            left: 0;
            z-index: -1;
            height: 100%;
            width: 100%;
            background-size: cover;
        }

        #background-linear-gradient,
        #background-linear-gradient-preview {
            background: linear-gradient(0deg, <?php echo $colorLinearGradient_1 ?>, <?php echo $colorLinearGradient_2 ?>);
            opacity: <?php echo $opacityLinearGradient ?>;
        }

        #background-preview {
            background: url(<?php echo $background ?>) center no-repeat;
            height: 150px;
            background-size: cover;
            padding: 0;
        }

        #background-linear-gradient-preview {
            position: relative !important;
            z-index: auto !important;
        }

        #background-linear-gradient-preview {
            top: 0;
            left: 0;
            z-index: -1;
            height: 100%;
            width: 100%;
        }

        #sucess,
        #login_acess,
        .section {
            margin-top: 100px;
            background: #ffffff8f;
            backdrop-filter: blur(14px);
            border-radius: 7px;
            padding: 1rem 2rem 2rem;
            box-shadow: 0px 3px 6px 1px black;
        }

        body {
            padding: 1rem 0 6rem 0;
            background-size: cover;
            background-attachment: fixed;
            background-position-y: top;
            background-position-x: center;
        }

        .hide {
            display: none;
            transition: 1s;
        }

        #sucess img {
            max-height: 120px;
            margin-bottom: 20px;
        }

        #sucess h3,
        #sucess .positive-text {
            font-weight: bold;
            color: #28a745;
        }

        #sucess h3 {
            font-size: 1.8rem;
        }

        #sucess a {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            font-size: 1.2rem;
            color: #fff;
            background-color: #007bff;
            border-radius: 5px;
            text-decoration: none;
        }

        #sucess a:hover {
            background-color: #0056b3;
        }


        #progress_box {
            position: fixed;
            top: 0;
            left: 0;
            margin: 0;
            width: 100%;
            z-index: 1001;
        }

        #progress_timer_label {
            position: absolute;
            right: 0;
            margin-right: 0.5rem;
            font-family: sans-serif;
            font-weight: bolder;
        }

        .ads-video video {
            width: 100%;
        }

        .ads-video {
            width: 90%;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            /* z-index: 1000; */
            padding: 0;
        }

        #play-box {
            i {
                background: #ffffff85;
                border-radius: 100%;
                transition: 0.5s;
            }

            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 5rem;
            height: 100%;
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            background: #9996968a;
        }

        #play-box i:hover {
            background: #00000085;
            color: #060606;
            transition: 1s;
        }

        .btn-login-mode,
        .btn-login-mode-trial {
            i {
                padding: 0.8rem;
                font-size: 1rem;
                border-radius: 100%;
                background-color: #007bff;
                box-shadow: 0 2px 4px 1px #000000a8;
                transition: 1s;
            }

            position: absolute;
            top: -3rem;
            left: 50%;
            transform: translateX(-50%);
        }

        .btn-login-mode i:hover,
        .btn-login-mode-trial i:hover {
            background-color: #0c3b6f !important;
            box-shadow: inset 0 -1px 5px 1px #000000db !important;
            transition: 0.3s;
        }

        .btn-login-mode-trial {
            top: auto !important;
            bottom: -5rem !important;
        }

        @keyframes slideUp {
            from {
                transform: translateY(100%);
                opacity: 0;
            }

            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        @keyframes slideDown {
            from {
                transform: translateY(0);
                opacity: 1;
            }

            to {
                transform: translateY(100%);
                opacity: 0;
            }
        }

        .section {
            animation-duration: 0.5s;
            animation-fill-mode: both;
        }

        .slide-in {
            animation-name: slideUp;
        }

        .slide-out {
            animation-name: slideDown;
        }