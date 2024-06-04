<!DOCTYPE html>
<html>
<!--  This source code is exported from pxCode, you can get more document from https://www.pxcode.io  -->
<?php
include ("koneksi.php");
?>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous" />

    <link rel="stylesheet" type="text/css" href="https://unpkg.com/aos@2.3.1/dist/aos.css" />
    <link rel="stylesheet" type="text/css" href="./css/common.css" />
    <link rel="stylesheet" type="text/css" href="./css/fonts.css" />
    <link rel="stylesheet" type="text/css" href="./css/LoginBNI.css" />
    <script type="text/javascript" src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script type="text/javascript" src="https://unpkg.com/sticky-js@1.3.0/dist/sticky.min.js"></script>
    <script type="text/javascript" src="https://unpkg.com/headroom.js@0.12.0/dist/headroom.min.js"></script>



</head>

<body class="flex-column">
    <div class="login-bni loginSection" style="--src:url(../assets/0aa3e907632373b70b5ea5f451297a94.png)">
        <div class="formGroup">
            <div class="infoRectangle"></div>
            <div class="formTitleContainer">
                <h1 class="loginTitle">REGISTER</h1>
                <form action="regis.php" method="POST">
                <div class="usernameContainer">
                    <div class="usernameField">
                        <img class="usernameIcon" src="./assets/6fb9b218d2c7640d08a44620a4de2ee0.png" alt="alt text" />
                        <p class="usernameLabel">Username</p>
                    </div>
                    <input required name="username" type="text" class="usernameHighlight" placeholder="Buat Username" style="border: none; text-align: left;"></input>
                </div>
                <div class="passwordContainer">
                    <div class="passwordField">
                        <img class="passwordIcon" src="./assets/7b10973ef15f2e3ccca228c99bc8a581.png" alt="alt text" />
                        <p class="passwordLabel">Password</p>
                    </div>
                    <div class="passwordInputContainer">
                        <input required type="text" class="passwordHighlight" placeholder="Buat Password" style="background: transparent; border: transparent; " name="password"></input>
                        <img class="passwordVisibilityIcon" src="./assets/54cd0f2a822ccb5c0ce6e790db889c11.svg" alt="alt text" /><img class="passwordConfirmIcon" src="./assets/ee89d819b07f86535f0f2ec7581a0abf.png" alt="alt text" />
                    </div>
                </div>
            </div>
            <a href="   "><button class="regisButton">NEXT</button></a><img class="logoImage" src="./assets/c99a7bb9d5c1075f8ebf0bb58ea0b941.svg" alt="alt text" />
        </div>
        </form>
    </div>
    <script type="text/javascript">
        AOS.init();
        new Sticky('.sticky-effect');
    </script>
</body>

</html>