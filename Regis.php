<!DOCTYPE html>
<html>
<!--  This source code is exported from pxCode, you can get more document from https://www.pxcode.io  -->
<?php
include ("koneksi.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    // Process the username and password as needed
   
    // You can also store them in a database or perform other actions
}
?>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous" />

    <link rel="stylesheet" type="text/css" href="https://unpkg.com/aos@2.3.1/dist/aos.css" />
    <link rel="stylesheet" type="text/css" href="./css/common.css" />
    <link rel="stylesheet" type="text/css" href="./css/fonts.css" />
    <link rel="stylesheet" type="text/css" href="./css/Regis.css" />
    <script type="text/javascript" src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script type="text/javascript" src="https://unpkg.com/sticky-js@1.3.0/dist/sticky.min.js"></script>
    <script type="text/javascript" src="https://unpkg.com/headroom.js@0.12.0/dist/headroom.min.js"></script>
</head>

<body class="flex-column">
    <div class="regis identitySection" style="--src:url(../assets/f7a4d770ce704416982a2579be535ad2.svg)">
        <img class="profileImage" src="./assets/7df27a9129a89125bd086ac50725d59a.png" alt="alt text" />
        <div class="contentBox" style="height: 380px;" >
            <div class="infoContainer">
                <div class="labelColumn">
                    <p class="label">NAMA</p>
                    <p class="label">NIM</p>
                    <p class="label">PRODI</p>
                    <p class="label">FAKULTAS</p>
                    <p class="label">MASA STUDI</p>
                    <div class="addressLabel">ALAMAT</div>
                    <p class="label">USERNAME</p>
                    <p class="label">PASSWORD</p>
                </div>
                <div class="separatorColumn">
                    <p class="separator">:</p>
                    <p class="separator">:</p>
                    <p class="separator">:</p>
                    <p class="separator">:</p>
                    <p class="separator">:</p>
                    <div class="separatorAddress">:</div>
                    <p class="separator">:</p>
                    <p class="separator">:</p>
                </div>
            </div>
            <div class="divider"></div>
            <div class="inputContainer">
                <form action="regisx.php" method="POST">
                    <div class="inputColumn">
                        <div class="inputBox">
                            <input type="text" class="input" name="nama" placeholder="nama" style="background-color: transparent; border-style: none; margin-bottom: 0px " required>
                        </div>
                        <div class="inputBox">
                            <input type="text" class="input" name="nim" placeholder="nim" style="background-color: transparent; border-style: none;" required>
                        </div>
                        <div class="inputBox">
                            <input type="text" class="input" name="prodi" placeholder="prodi" style="background-color: transparent; border-style: none;margin-bottom: 0px " required>
                        </div>
                        <div class="inputBox">
                            <input type="text" class="input" name="fakultas" placeholder="fakultas" style="background-color: transparent; border-style: none;" required>
                        </div>
                        <div class="inputBox">
                            <input type="text" class="input" name="masa_studi" placeholder="masa studi" style="background-color: transparent; border-style: none;" required>
                        </div>
                        <div class="addressInputBox">
                            <input type="text" class="input" name="alamat" placeholder="alamat" style="background-color: transparent; border-style: none;" required>
                        </div>
                        <div class="inputBox">
                            <input type="text" class="input" name="username" placeholder="username" style="background-color: transparent; border-style: none;" required value="<?=$username?>">
                        </div>
                        <div class="inputBox">
                            <input type="password" class="input" name="password" placeholder="password" style="background-color: transparent; border-style: none;" required value="<?=$password?>">
                        </div>
                    </div>
                    <button type="submit" class="registerButton" style="top:10px;">REGISTER</button>
                </form>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        AOS.init();
        new Sticky('.sticky-effect');
    </script>
</body>
</html>
