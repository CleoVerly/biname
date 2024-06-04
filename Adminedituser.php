<!DOCTYPE html>
<html>


<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous" />

    <link rel="stylesheet" type="text/css" href="https://unpkg.com/aos@2.3.1/dist/aos.css" />
    <link rel="stylesheet" type="text/css" href="./css/common.css" />
    <link rel="stylesheet" type="text/css" href="./css/fonts.css" />
    <link rel="stylesheet" type="text/css" href="./css/style.css" />
    <script type="text/javascript" src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script type="text/javascript" src="https://unpkg.com/sticky-js@1.3.0/dist/sticky.min.js"></script>
    <script type="text/javascript" src="https://unpkg.com/headroom.js@0.12.0/dist/headroom.min.js"></script>



</head>

<body class="flex-column">
    <div class="carduser root" style="--src:url(../assets/backgroundhome.png)">
        <img class="image1" src="./assets/BINlogo.png" alt="alt text" />
        <div class="flex_row">
            <div class="group">
                <div class="group1">
                    <div class="group1">
                        <div class="group1">
                            <div class="group1">
                                <div class="group1">
                                    <div class="rect"></div>
                                    <div class="flex_row1">
                                        <form action="proses.php" method="post">
                                        <div class="flex_col1">
                                            <div class="flex_row2">
                                                <h5 class="highlight1">NAMA</h5>
                                                <div class="flex_row3">
                                                    <h5 class="highlight1">:</h5>
                                                    <input type="text" class="highlight2" value="" placeholder="nama user" name="nama"/>
                                                </div>
                                            </div>
                                            <div class="flex_row2">
                                                <h5 class="highlight1">NIM</h5>
                                                <div class="flex_row3">
                                                    <h5 class="highlight1">:</h5>
                                                    <input type="text" class="highlight2" value="" placeholder="NIM user" name="nim"/>
                                                </div>
                                            </div>
                                            <div class="flex_row2">
                                                <h5 class="highlight1">PRODI</h5>
                                                <div class="flex_row3">
                                                    <h5 class="highlight1">:</h5>
                                                    <input type="text" class="highlight2" value="" placeholder="prodi user" name="prodi"/>
                                                </div>
                                            </div>
                                            <div class="flex_row2">
                                                <h5 class="highlight1">FAKULTAS</h5>
                                                <div class="flex_row3">
                                                    <h5 class="highlight1">:</h5>
                                                    <input type="text" class="highlight2" value="" placeholder="fakultas user" name="fakultas" />
                                                </div>
                                            </div>
                                            <div class="flex_row2" >
                                                <h5 class="highlight1">Angkatan</h5>
                                                <div class="flex_row3">
                                                    <h5 class="highlight1">:</h5>
                                                    <input type="text" class="highlight2" value="" placeholder="Angkatan User" name="angkatan"/>
                                                </div>
                                            </div>
                                            <div class="flex_row2">
                                                <h5 class="highlight11">ALAMAT</h5>
                                                <div class="flex_row3">
                                                    <h5 class="highlight11">:</h5>
                                                    <input type="text" class="highlight2" value="" placeholder="alamat user" name="alamat" id="address"/>
                                                </div>
                                            </div>
                                            <div class="flex_row2">
                                                <h5 class="highlight1">USERNAME</h5>
                                                <div class="flex_row3">
                                                    <h5 class="highlight1">:</h5>
                                                    <input type="text" class="highlight2" value="" placeholder="username" name="username"/>
                                                </div>
                                            </div>
                                            <div class="flex_row2">
                                                <h5 class="highlight1">PASSWORD</h5>
                                                <div class="flex_row3">
                                                    <h5 class="highlight1">:</h5>
                                                    <input type="text" class="highlight2" value="" placeholder="password" name="password"/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                                <button class="btn_edit" onclick="window.location.href='Adminhome.php'">SIMPAN</button>
                                </form>
                                <button class="btn_bataledit" onclick="window.location.href='Adminhome.php'">BATAL</button>
                            </div>
                           
                            <h2 class="medium_title">PROFIL MAHASISWA</h2>
                        </div>
                        <h1 class="big_title">UIN Syarif Hidayatullah Jakarta</h1>
                    </div>
                    <img class="image8" src="./assets/logoUIN.png" alt="alt text" />
                </div>
                <img class="image2" src="./assets/7a02bb3db5f1bad02b94ee7de7ec3026.svg" alt="alt text" />
            </div>
            <div class="content_box">
                
                <a href="Adminhome.php">
                    <img class="image7" src="./assets/menu.png" alt="alt text" />
                </a>
                <a href="History.php">
                    <img class="image5" src="./assets/history.png" alt="alt text" />
                </a>
                <a href="index.php">
                    <img class="image6" src="./assets/exit.png" alt="alt text" />
                </a>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        AOS.init();
        new Sticky('.sticky-effect');
    </script>
</body>

</html>