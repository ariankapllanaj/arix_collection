<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://fonts.googleapis.com/css?family=Play&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/ps2startup.css') }}">

    <style>
        *,
        *:after,
        *:before {
            box-sizing: border-box;
        }

        body {
            display: flex;
            background: black;
            height: 100vh;
            width: 100vw;
            align-items: center;
            justify-content: center;
            font-family: 'Play', sans-serif;
        }

        .screen {
            width: 100%;
            padding-top: 75%;
            position: relative;
            max-height: 100vh;
            transform-style: preserve-3d;
            perspective: 400px;
            overflow: hidden;
        }

        .inner .inner-bg {
            background-image: url(https://res.cloudinary.com/dhpaysqxb/image/upload/v1568580561/nebula_prju57.png);
            background-size: cover;
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            transform: translateZ(-30vw) scale(1.4);
            opacity: 0.8;
        }

        .inner {
            position: absolute;
            top: 0;
            left: 0;
            height: 100%;
            width: 100vw;
            display: flex;
            flex-wrap: wrap;
            align-content: flex-start;
            padding: 1%;
            padding-top: 10%;
            transform-style: preserve-3d;
            animation: enter 16s cubic-bezier(1, 0, 0.4, 1) 1, fadeOut 2s ease-in-out 16s forwards;
            /* Added fadeOut animation */
        }

        .box-container {
            width: calc(100% / 14);
            padding: 1%;
            position: relative;
            z-index: 100;
            transform-style: preserve-3d;
        }

        .box {
            width: 100%;
            padding-top: 100%;
            position: relative;
            transform-style: preserve-3d;
        }

        .box-container:nth-child(41) .box,
        .box-container:nth-child(40) .box,
        .box-container:nth-child(47) .box,
        .box-container:nth-child(48) .box,
        .box-container:nth-child(46) .box,
        .box-container:nth-child(95) .box,
        .box-container:nth-child(94) .box,
        .box-container:nth-child(102) .box,
        .box-container:nth-child(101) .box {
            visibility: hidden;
        }

        .box .top,
        .box .bottom,
        .box .left,
        .box .right {
            position: absolute;
            width: 100%;
            height: 100%;
        }

        .box .top {
            background: linear-gradient(to top, rgba(97, 106, 146, 0.9), rgba(0, 0, 0, 0));
            bottom: 100%;
            left: 0;
            height: 20vw;
            transform-origin: 100% 100%;
            transform: rotateX(90deg);
            box-shadow: inset 0 0 1vw rgba(cyan, 0.07);
        }

        .box .bottom {
            background: linear-gradient(to bottom, rgba(97, 106, 146, 0.9), rgba(0, 0, 0, 0));
            top: 100%;
            left: 0;
            height: 20vw;
            transform-origin: 0% 0%;
            transform: rotateX(-90deg);
            box-shadow: inset 0 0 1vw rgba(cyan, 0.07);
        }

        .box .left {
            background: linear-gradient(to left, rgba(97, 106, 146, 0.9), rgba(0, 0, 0, 0));
            top: 0;
            right: 100%;
            width: 20vw;
            transform-origin: 100% 100%;
            transform: rotateY(-90deg);
            box-shadow: inset 0 0 1vw rgba(cyan, 0.07);
        }

        .box .right {
            background: linear-gradient(to right, rgba(97, 106, 146, 0.9), rgba(0, 0, 0, 0));
            top: 0;
            left: 100%;
            width: 20vw;
            transform-origin: 0% 0%;
            transform: rotateY(90deg);
            box-shadow: inset 0 0 1vw rgba(cyan, 0.07);
        }

        .screen .content {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            text-align: center;
            color: white;
            background: transparent;
            z-index: 200;
            animation: content 16s 1, fadeOut 2s ease-in-out 16s forwards;
            /* Added fadeOut animation */
        }

        .screen .content .branding,
        .screen .content .copyright {
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
        }

        .screen .content .copyright {
            font-size: 1.5rem;
            text-shadow: black 0px 0px 3px;
            opacity: 1;
            animation: fadeIn 2s ease-in 6s forwards, fadeOut 2s ease-out 6s forwards;
            /* Add fadeIn and fadeOut */
        }

        /* Fade-In Keyframes */
        @keyframes fadeIn {
            0% {
                opacity: 0;
            }

            100% {
                opacity: 1;
            }
        }

        /* Fade-Out Keyframes */
        @keyframes fadeOut {
            0% {
                opacity: 1;
            }

            100% {
                opacity: 0;
            }
        }

        .screen .content .branding {
            font-size: 3rem;
            opacity: 0;
            animation: branding 16s cubic-bezier(0, 0.74, 0.46, 1) 1, fadeOut 2s ease-in-out 16s forwards;
            /* Added fadeOut animation */
        }

        @keyframes enter {
            0% {
                transform: rotate(-20deg);
            }

            60%,
            100% {
                transform: rotate(100deg) scale(4);
            }
        }

        @keyframes content {
            0% {
                background-color: black;
            }

            5%,
            43% {
                background: transparent;
            }

            48%,
            100% {
                background-color: black;
            }
        }

        @keyframes branding {

            0%,
            65% {
                opacity: 0;
                transform: translate3d(-50%, -50%, 0) scale(1.5);
            }

            68%,
            93% {
                opacity: 1;
                transform: translate3d(-50%, -50%, 0) scale(1);
            }

            96%,
            100% {
                opacity: 0;
                transform: translate3d(-50%, -50%, 0) scale(1.5);
            }
        }

        @keyframes fadeOut {
            0% {
                opacity: 1;
            }

            100% {
                opacity: 0;
            }
        }

        .is-small {
            font-size: 0.3em;
        }
    </style>
</head>

<body>
    <div class="screen">
        <div class="content">
            <p class="copyright">Sony computer entertainment</p>
            <p class="branding">
                Playstation
                <span class="is-small">®</span>&nbsp;2
            </p>
        </div>
        <div class="inner">
            <div class="inner-bg"></div>
            <div class="particles">
                <span></span>
                <span></span>
                <span></span>
            </div>

            <div class="box-container">
                <div class="box">
                    <div class="top"></div>
                    <div class="bottom"></div>
                    <div class="left"></div>
                    <div class="right"></div>
                </div>
            </div>

            <div class="box-container">
                <div class="box">
                    <div class="top"></div>
                    <div class="bottom"></div>
                    <div class="left"></div>
                    <div class="right"></div>
                </div>
            </div>

            <div class="box-container">
                <div class="box">
                    <div class="top"></div>
                    <div class="bottom"></div>
                    <div class="left"></div>
                    <div class="right"></div>
                </div>
            </div>

            <div class="box-container">
                <div class="box">
                    <div class="top"></div>
                    <div class="bottom"></div>
                    <div class="left"></div>
                    <div class="right"></div>
                </div>
            </div>

            <div class="box-container">
                <div class="box">
                    <div class="top"></div>
                    <div class="bottom"></div>
                    <div class="left"></div>
                    <div class="right"></div>
                </div>
            </div>

            <div class="box-container">
                <div class="box">
                    <div class="top"></div>
                    <div class="bottom"></div>
                    <div class="left"></div>
                    <div class="right"></div>
                </div>
            </div>

            <div class="box-container">
                <div class="box">
                    <div class="top"></div>
                    <div class="bottom"></div>
                    <div class="left"></div>
                    <div class="right"></div>
                </div>
            </div>

            <div class="box-container">
                <div class="box">
                    <div class="top"></div>
                    <div class="bottom"></div>
                    <div class="left"></div>
                    <div class="right"></div>
                </div>
            </div>

            <div class="box-container">
                <div class="box">
                    <div class="top"></div>
                    <div class="bottom"></div>
                    <div class="left"></div>
                    <div class="right"></div>
                </div>
            </div>

            <div class="box-container">
                <div class="box">
                    <div class="top"></div>
                    <div class="bottom"></div>
                    <div class="left"></div>
                    <div class="right"></div>
                </div>
            </div>

            <div class="box-container">
                <div class="box">
                    <div class="top"></div>
                    <div class="bottom"></div>
                    <div class="left"></div>
                    <div class="right"></div>
                </div>
            </div>

            <div class="box-container">
                <div class="box">
                    <div class="top"></div>
                    <div class="bottom"></div>
                    <div class="left"></div>
                    <div class="right"></div>
                </div>
            </div>

            <div class="box-container">
                <div class="box">
                    <div class="top"></div>
                    <div class="bottom"></div>
                    <div class="left"></div>
                    <div class="right"></div>
                </div>
            </div>

            <div class="box-container">
                <div class="box">
                    <div class="top"></div>
                    <div class="bottom"></div>
                    <div class="left"></div>
                    <div class="right"></div>
                </div>
            </div>

            <div class="box-container">
                <div class="box">
                    <div class="top"></div>
                    <div class="bottom"></div>
                    <div class="left"></div>
                    <div class="right"></div>
                </div>
            </div>

            <div class="box-container">
                <div class="box">
                    <div class="top"></div>
                    <div class="bottom"></div>
                    <div class="left"></div>
                    <div class="right"></div>
                </div>
            </div>

            <div class="box-container">
                <div class="box">
                    <div class="top"></div>
                    <div class="bottom"></div>
                    <div class="left"></div>
                    <div class="right"></div>
                </div>
            </div>

            <div class="box-container">
                <div class="box">
                    <div class="top"></div>
                    <div class="bottom"></div>
                    <div class="left"></div>
                    <div class="right"></div>
                </div>
            </div>

            <div class="box-container">
                <div class="box">
                    <div class="top"></div>
                    <div class="bottom"></div>
                    <div class="left"></div>
                    <div class="right"></div>
                </div>
            </div>

            <div class="box-container">
                <div class="box">
                    <div class="top"></div>
                    <div class="bottom"></div>
                    <div class="left"></div>
                    <div class="right"></div>
                </div>
            </div>

            <div class="box-container">
                <div class="box">
                    <div class="top"></div>
                    <div class="bottom"></div>
                    <div class="left"></div>
                    <div class="right"></div>
                </div>
            </div>

            <div class="box-container">
                <div class="box">
                    <div class="top"></div>
                    <div class="bottom"></div>
                    <div class="left"></div>
                    <div class="right"></div>
                </div>
            </div>

            <div class="box-container">
                <div class="box">
                    <div class="top"></div>
                    <div class="bottom"></div>
                    <div class="left"></div>
                    <div class="right"></div>
                </div>
            </div>

            <div class="box-container">
                <div class="box">
                    <div class="top"></div>
                    <div class="bottom"></div>
                    <div class="left"></div>
                    <div class="right"></div>
                </div>
            </div>

            <div class="box-container">
                <div class="box">
                    <div class="top"></div>
                    <div class="bottom"></div>
                    <div class="left"></div>
                    <div class="right"></div>
                </div>
            </div>

            <div class="box-container">
                <div class="box">
                    <div class="top"></div>
                    <div class="bottom"></div>
                    <div class="left"></div>
                    <div class="right"></div>
                </div>
            </div>

            <div class="box-container">
                <div class="box">
                    <div class="top"></div>
                    <div class="bottom"></div>
                    <div class="left"></div>
                    <div class="right"></div>
                </div>
            </div>

            <div class="box-container">
                <div class="box">
                    <div class="top"></div>
                    <div class="bottom"></div>
                    <div class="left"></div>
                    <div class="right"></div>
                </div>
            </div>

            <div class="box-container">
                <div class="box">
                    <div class="top"></div>
                    <div class="bottom"></div>
                    <div class="left"></div>
                    <div class="right"></div>
                </div>
            </div>

            <div class="box-container">
                <div class="box">
                    <div class="top"></div>
                    <div class="bottom"></div>
                    <div class="left"></div>
                    <div class="right"></div>
                </div>
            </div>

            <div class="box-container">
                <div class="box">
                    <div class="top"></div>
                    <div class="bottom"></div>
                    <div class="left"></div>
                    <div class="right"></div>
                </div>
            </div>

            <div class="box-container">
                <div class="box">
                    <div class="top"></div>
                    <div class="bottom"></div>
                    <div class="left"></div>
                    <div class="right"></div>
                </div>
            </div>

            <div class="box-container">
                <div class="box">
                    <div class="top"></div>
                    <div class="bottom"></div>
                    <div class="left"></div>
                    <div class="right"></div>
                </div>
            </div>

            <div class="box-container">
                <div class="box">
                    <div class="top"></div>
                    <div class="bottom"></div>
                    <div class="left"></div>
                    <div class="right"></div>
                </div>
            </div>

            <div class="box-container">
                <div class="box">
                    <div class="top"></div>
                    <div class="bottom"></div>
                    <div class="left"></div>
                    <div class="right"></div>
                </div>
            </div>

            <div class="box-container">
                <div class="box">
                    <div class="top"></div>
                    <div class="bottom"></div>
                    <div class="left"></div>
                    <div class="right"></div>
                </div>
            </div>

            <div class="box-container">
                <div class="box">
                    <div class="top"></div>
                    <div class="bottom"></div>
                    <div class="left"></div>
                    <div class="right"></div>
                </div>
            </div>

            <div class="box-container">
                <div class="box">
                    <div class="top"></div>
                    <div class="bottom"></div>
                    <div class="left"></div>
                    <div class="right"></div>
                </div>
            </div>

            <div class="box-container">
                <div class="box">
                    <div class="top"></div>
                    <div class="bottom"></div>
                    <div class="left"></div>
                    <div class="right"></div>
                </div>
            </div>

            <div class="box-container">
                <div class="box">
                    <div class="top"></div>
                    <div class="bottom"></div>
                    <div class="left"></div>
                    <div class="right"></div>
                </div>
            </div>

            <div class="box-container">
                <div class="box">
                    <div class="top"></div>
                    <div class="bottom"></div>
                    <div class="left"></div>
                    <div class="right"></div>
                </div>
            </div>

            <div class="box-container">
                <div class="box">
                    <div class="top"></div>
                    <div class="bottom"></div>
                    <div class="left"></div>
                    <div class="right"></div>
                </div>
            </div>

            <div class="box-container">
                <div class="box">
                    <div class="top"></div>
                    <div class="bottom"></div>
                    <div class="left"></div>
                    <div class="right"></div>
                </div>
            </div>

            <div class="box-container">
                <div class="box">
                    <div class="top"></div>
                    <div class="bottom"></div>
                    <div class="left"></div>
                    <div class="right"></div>
                </div>
            </div>

            <div class="box-container">
                <div class="box">
                    <div class="top"></div>
                    <div class="bottom"></div>
                    <div class="left"></div>
                    <div class="right"></div>
                </div>
            </div>

            <div class="box-container">
                <div class="box">
                    <div class="top"></div>
                    <div class="bottom"></div>
                    <div class="left"></div>
                    <div class="right"></div>
                </div>
            </div>

            <div class="box-container">
                <div class="box">
                    <div class="top"></div>
                    <div class="bottom"></div>
                    <div class="left"></div>
                    <div class="right"></div>
                </div>
            </div>

            <div class="box-container">
                <div class="box">
                    <div class="top"></div>
                    <div class="bottom"></div>
                    <div class="left"></div>
                    <div class="right"></div>
                </div>
            </div>

            <div class="box-container">
                <div class="box">
                    <div class="top"></div>
                    <div class="bottom"></div>
                    <div class="left"></div>
                    <div class="right"></div>
                </div>
            </div>

            <div class="box-container">
                <div class="box">
                    <div class="top"></div>
                    <div class="bottom"></div>
                    <div class="left"></div>
                    <div class="right"></div>
                </div>
            </div>

            <div class="box-container">
                <div class="box">
                    <div class="top"></div>
                    <div class="bottom"></div>
                    <div class="left"></div>
                    <div class="right"></div>
                </div>
            </div>

            <div class="box-container">
                <div class="box">
                    <div class="top"></div>
                    <div class="bottom"></div>
                    <div class="left"></div>
                    <div class="right"></div>
                </div>
            </div>

            <div class="box-container">
                <div class="box">
                    <div class="top"></div>
                    <div class="bottom"></div>
                    <div class="left"></div>
                    <div class="right"></div>
                </div>
            </div>

            <div class="box-container">
                <div class="box">
                    <div class="top"></div>
                    <div class="bottom"></div>
                    <div class="left"></div>
                    <div class="right"></div>
                </div>
            </div>

            <div class="box-container">
                <div class="box">
                    <div class="top"></div>
                    <div class="bottom"></div>
                    <div class="left"></div>
                    <div class="right"></div>
                </div>
            </div>

            <div class="box-container">
                <div class="box">
                    <div class="top"></div>
                    <div class="bottom"></div>
                    <div class="left"></div>
                    <div class="right"></div>
                </div>
            </div>

            <div class="box-container">
                <div class="box">
                    <div class="top"></div>
                    <div class="bottom"></div>
                    <div class="left"></div>
                    <div class="right"></div>
                </div>
            </div>

            <div class="box-container">
                <div class="box">
                    <div class="top"></div>
                    <div class="bottom"></div>
                    <div class="left"></div>
                    <div class="right"></div>
                </div>
            </div>

            <div class="box-container">
                <div class="box">
                    <div class="top"></div>
                    <div class="bottom"></div>
                    <div class="left"></div>
                    <div class="right"></div>
                </div>
            </div>

            <div class="box-container">
                <div class="box">
                    <div class="top"></div>
                    <div class="bottom"></div>
                    <div class="left"></div>
                    <div class="right"></div>
                </div>
            </div>

            <div class="box-container">
                <div class="box">
                    <div class="top"></div>
                    <div class="bottom"></div>
                    <div class="left"></div>
                    <div class="right"></div>
                </div>
            </div>

            <div class="box-container">
                <div class="box">
                    <div class="top"></div>
                    <div class="bottom"></div>
                    <div class="left"></div>
                    <div class="right"></div>
                </div>
            </div>

            <div class="box-container">
                <div class="box">
                    <div class="top"></div>
                    <div class="bottom"></div>
                    <div class="left"></div>
                    <div class="right"></div>
                </div>
            </div>

            <div class="box-container">
                <div class="box">
                    <div class="top"></div>
                    <div class="bottom"></div>
                    <div class="left"></div>
                    <div class="right"></div>
                </div>
            </div>

            <div class="box-container">
                <div class="box">
                    <div class="top"></div>
                    <div class="bottom"></div>
                    <div class="left"></div>
                    <div class="right"></div>
                </div>
            </div>

            <div class="box-container">
                <div class="box">
                    <div class="top"></div>
                    <div class="bottom"></div>
                    <div class="left"></div>
                    <div class="right"></div>
                </div>
            </div>

            <div class="box-container">
                <div class="box">
                    <div class="top"></div>
                    <div class="bottom"></div>
                    <div class="left"></div>
                    <div class="right"></div>
                </div>
            </div>

            <div class="box-container">
                <div class="box">
                    <div class="top"></div>
                    <div class="bottom"></div>
                    <div class="left"></div>
                    <div class="right"></div>
                </div>
            </div>

            <div class="box-container">
                <div class="box">
                    <div class="top"></div>
                    <div class="bottom"></div>
                    <div class="left"></div>
                    <div class="right"></div>
                </div>
            </div>

            <div class="box-container">
                <div class="box">
                    <div class="top"></div>
                    <div class="bottom"></div>
                    <div class="left"></div>
                    <div class="right"></div>
                </div>
            </div>

            <div class="box-container">
                <div class="box">
                    <div class="top"></div>
                    <div class="bottom"></div>
                    <div class="left"></div>
                    <div class="right"></div>
                </div>
            </div>

            <div class="box-container">
                <div class="box">
                    <div class="top"></div>
                    <div class="bottom"></div>
                    <div class="left"></div>
                    <div class="right"></div>
                </div>
            </div>

            <div class="box-container">
                <div class="box">
                    <div class="top"></div>
                    <div class="bottom"></div>
                    <div class="left"></div>
                    <div class="right"></div>
                </div>
            </div>

            <div class="box-container">
                <div class="box">
                    <div class="top"></div>
                    <div class="bottom"></div>
                    <div class="left"></div>
                    <div class="right"></div>
                </div>
            </div>

            <div class="box-container">
                <div class="box">
                    <div class="top"></div>
                    <div class="bottom"></div>
                    <div class="left"></div>
                    <div class="right"></div>
                </div>
            </div>

            <div class="box-container">
                <div class="box">
                    <div class="top"></div>
                    <div class="bottom"></div>
                    <div class="left"></div>
                    <div class="right"></div>
                </div>
            </div>

            <div class="box-container">
                <div class="box">
                    <div class="top"></div>
                    <div class="bottom"></div>
                    <div class="left"></div>
                    <div class="right"></div>
                </div>
            </div>

            <div class="box-container">
                <div class="box">
                    <div class="top"></div>
                    <div class="bottom"></div>
                    <div class="left"></div>
                    <div class="right"></div>
                </div>
            </div>

            <div class="box-container">
                <div class="box">
                    <div class="top"></div>
                    <div class="bottom"></div>
                    <div class="left"></div>
                    <div class="right"></div>
                </div>
            </div>

            <div class="box-container">
                <div class="box">
                    <div class="top"></div>
                    <div class="bottom"></div>
                    <div class="left"></div>
                    <div class="right"></div>
                </div>
            </div>

            <div class="box-container">
                <div class="box">
                    <div class="top"></div>
                    <div class="bottom"></div>
                    <div class="left"></div>
                    <div class="right"></div>
                </div>
            </div>

            <div class="box-container">
                <div class="box">
                    <div class="top"></div>
                    <div class="bottom"></div>
                    <div class="left"></div>
                    <div class="right"></div>
                </div>
            </div>

            <div class="box-container">
                <div class="box">
                    <div class="top"></div>
                    <div class="bottom"></div>
                    <div class="left"></div>
                    <div class="right"></div>
                </div>
            </div>

            <div class="box-container">
                <div class="box">
                    <div class="top"></div>
                    <div class="bottom"></div>
                    <div class="left"></div>
                    <div class="right"></div>
                </div>
            </div>

            <div class="box-container">
                <div class="box">
                    <div class="top"></div>
                    <div class="bottom"></div>
                    <div class="left"></div>
                    <div class="right"></div>
                </div>
            </div>

            <div class="box-container">
                <div class="box">
                    <div class="top"></div>
                    <div class="bottom"></div>
                    <div class="left"></div>
                    <div class="right"></div>
                </div>
            </div>

            <div class="box-container">
                <div class="box">
                    <div class="top"></div>
                    <div class="bottom"></div>
                    <div class="left"></div>
                    <div class="right"></div>
                </div>
            </div>

            <div class="box-container">
                <div class="box">
                    <div class="top"></div>
                    <div class="bottom"></div>
                    <div class="left"></div>
                    <div class="right"></div>
                </div>
            </div>

            <div class="box-container">
                <div class="box">
                    <div class="top"></div>
                    <div class="bottom"></div>
                    <div class="left"></div>
                    <div class="right"></div>
                </div>
            </div>

            <div class="box-container">
                <div class="box">
                    <div class="top"></div>
                    <div class="bottom"></div>
                    <div class="left"></div>
                    <div class="right"></div>
                </div>
            </div>

            <div class="box-container">
                <div class="box">
                    <div class="top"></div>
                    <div class="bottom"></div>
                    <div class="left"></div>
                    <div class="right"></div>
                </div>
            </div>

            <div class="box-container">
                <div class="box">
                    <div class="top"></div>
                    <div class="bottom"></div>
                    <div class="left"></div>
                    <div class="right"></div>
                </div>
            </div>

            <div class="box-container">
                <div class="box">
                    <div class="top"></div>
                    <div class="bottom"></div>
                    <div class="left"></div>
                    <div class="right"></div>
                </div>
            </div>

            <div class="box-container">
                <div class="box">
                    <div class="top"></div>
                    <div class="bottom"></div>
                    <div class="left"></div>
                    <div class="right"></div>
                </div>
            </div>

            <div class="box-container">
                <div class="box">
                    <div class="top"></div>
                    <div class="bottom"></div>
                    <div class="left"></div>
                    <div class="right"></div>
                </div>
            </div>

            <div class="box-container">
                <div class="box">
                    <div class="top"></div>
                    <div class="bottom"></div>
                    <div class="left"></div>
                    <div class="right"></div>
                </div>
            </div>

            <div class="box-container">
                <div class="box">
                    <div class="top"></div>
                    <div class="bottom"></div>
                    <div class="left"></div>
                    <div class="right"></div>
                </div>
            </div>

            <div class="box-container">
                <div class="box">
                    <div class="top"></div>
                    <div class="bottom"></div>
                    <div class="left"></div>
                    <div class="right"></div>
                </div>
            </div>

            <div class="box-container">
                <div class="box">
                    <div class="top"></div>
                    <div class="bottom"></div>
                    <div class="left"></div>
                    <div class="right"></div>
                </div>
            </div>

            <div class="box-container">
                <div class="box">
                    <div class="top"></div>
                    <div class="bottom"></div>
                    <div class="left"></div>
                    <div class="right"></div>
                </div>
            </div>

            <div class="box-container">
                <div class="box">
                    <div class="top"></div>
                    <div class="bottom"></div>
                    <div class="left"></div>
                    <div class="right"></div>
                </div>
            </div>

            <div class="box-container">
                <div class="box">
                    <div class="top"></div>
                    <div class="bottom"></div>
                    <div class="left"></div>
                    <div class="right"></div>
                </div>
            </div>

            <div class="box-container">
                <div class="box">
                    <div class="top"></div>
                    <div class="bottom"></div>
                    <div class="left"></div>
                    <div class="right"></div>
                </div>
            </div>

            <div class="box-container">
                <div class="box">
                    <div class="top"></div>
                    <div class="bottom"></div>
                    <div class="left"></div>
                    <div class="right"></div>
                </div>
            </div>

            <div class="box-container">
                <div class="box">
                    <div class="top"></div>
                    <div class="bottom"></div>
                    <div class="left"></div>
                    <div class="right"></div>
                </div>
            </div>

            <div class="box-container">
                <div class="box">
                    <div class="top"></div>
                    <div class="bottom"></div>
                    <div class="left"></div>
                    <div class="right"></div>
                </div>
            </div>

            <div class="box-container">
                <div class="box">
                    <div class="top"></div>
                    <div class="bottom"></div>
                    <div class="left"></div>
                    <div class="right"></div>
                </div>
            </div>

            <div class="box-container">
                <div class="box">
                    <div class="top"></div>
                    <div class="bottom"></div>
                    <div class="left"></div>
                    <div class="right"></div>
                </div>
            </div>

            <div class="box-container">
                <div class="box">
                    <div class="top"></div>
                    <div class="bottom"></div>
                    <div class="left"></div>
                    <div class="right"></div>
                </div>
            </div>

            <div class="box-container">
                <div class="box">
                    <div class="top"></div>
                    <div class="bottom"></div>
                    <div class="left"></div>
                    <div class="right"></div>
                </div>
            </div>

            <div class="box-container">
                <div class="box">
                    <div class="top"></div>
                    <div class="bottom"></div>
                    <div class="left"></div>
                    <div class="right"></div>
                </div>
            </div>

            <div class="box-container">
                <div class="box">
                    <div class="top"></div>
                    <div class="bottom"></div>
                    <div class="left"></div>
                    <div class="right"></div>
                </div>
            </div>

        </div>
    </div>
</body>

</html>
