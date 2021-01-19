<!DOCTYPE html>
<html lang="en">
<head>
    <!--    meta files-->
    <meta charset="UTF-8">
    <meta name="'viewport" content="width-device-width, initial-scale=1, shrink-to-fit=no">
    <!--    bootstrap. Jei nepasiima css kai css/bootstrap.min.css dasidedam view/ -->
    <link rel="stylesheet" href="view/css/bootstrap.min.css">
    <title>PHP Forma</title>
</head>
<body>
<header>
    <div class="overlay"></div>
    <video playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop">
        <source src="view/marseme.mp4" type="video/mp4">
    </video>
    <div class="container h-100">
        <div class="d-flex h-100 align-items-start">
            <div class="w-80 text-white">
                <p class="mt-3 font-italic font display-4">More than just flying</p>
            </div>
        </div>
    </div>
</header>

<style>
    header {
        position: relative;
        background-color: black;
        height: 20vh;
        min-height: 25rem;
        width: 100%;
        overflow: hidden;
    }

    header video {
        position: absolute;
        top: 50%;
        left: 50%;
        min-width: 100%;
        min-height: 100%;
        width: auto;
        height: auto;
        z-index: 0;
        -ms-transform: translateX(-50%) translateY(-50%);
        -moz-transform: translateX(-50%) translateY(-50%);
        -webkit-transform: translateX(-50%) translateY(-50%);
        transform: translateX(-50%) translateY(-50%);
    }

    header .container {
        position: relative;
        z-index: 2;
    }

    header .overlay {
        position: absolute;
        top: 0;
        left: 0;
        height: 100%;
        width: 100%;
        background-color: black;
        opacity: 0.5;
        z-index: 1;
    }

    @media (pointer: coarse) and (hover: none) {
        header {
            background: url('https://source.unsplash.com/XT5OInaElMw/1600x900') black no-repeat center center scroll;
        }
        header video {
            display: none;
        }
    }
</style>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
</body>
</html>