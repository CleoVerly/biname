<?php

session_start();
include("koneksi.php");

// Periksa apakah pengguna sudah login
if (!isset($_SESSION['username'])) {
    // Jika belum, arahkan pengguna kembali ke halaman login
    header("Location: login.php");
    exit;
}

// Dapatkan username pengguna yang login dari sesi
$username = $_SESSION['username'];

// Query untuk mendapatkan informasi pengguna dari database berdasarkan username
$sql = "SELECT * FROM mahasiswa WHERE username = '$username'";
$result = $conn->query($sql);

// Periksa apakah query berhasil
if ($result->num_rows > 0) {
    // Jika berhasil, ambil data pengguna
    $user_data = $result->fetch_assoc();
    $nama = $user_data['nama'];
    $nim = $user_data['nim'];
    $prodi = $user_data['prodi'];
    $fakultas = $user_data['fakultas'];
    $masa_studi = $user_data['masa_studi'];
    $latitude = $user_data['latitude']; // Ambil nilai latitude dari database
    $longitude = $user_data['longitude']; // Ambil nilai longitude dari database
    $alamat = $user_data['address'];
    $password = $user_data['password'];
} else {
    // Jika tidak ada data pengguna yang cocok, beri peringatan
    echo "Data pengguna tidak ditemukan!";
}

$conn->close();
?>


<!DOCTYPE html>
<html>
<!--  This source code is exported from pxCode, you can get more document from https://www.pxcode.io  -->

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous" />

    <link rel="stylesheet" type="text/css" href="https://unpkg.com/aos@2.3.1/dist/aos.css" />
    <link rel="stylesheet" type="text/css" href="./css/common.css" />
    <link rel="stylesheet" type="text/css" href="./css/fonts.css" />
    <link rel="stylesheet" type="text/css" href="./css/Profile.css" />
    <script type="text/javascript" src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script type="text/javascript" src="https://unpkg.com/sticky-js@1.3.0/dist/sticky.min.js"></script>
    <script type="text/javascript" src="https://unpkg.com/headroom.js@0.12.0/dist/headroom.min.js"></script>
<!-- Tambahkan stylesheet Leaflet -->
<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <style>
        #map {
            height: 400px; /* Atur tinggi peta */
            width: 60%; /* Atur lebar peta */
            margin: 0 auto; /* Posisikan peta di tengah halaman */
            
        }
    </style>


</head>

<body class="flex-column">
    <div class="profile profileSection" style="--src:url(../assets/0aa3e907632373b70b5ea5f451297a94.png)">
        <img class="profileImage" src="./assets/7df27a9129a89125bd086ac50725d59a.png" alt="alt text" />
        <div class="contactContentBox">
            <!-- <div class="actionButtonsRow">
                <button class="editButton">EDIT</button><button class="deleteButton">HAPUS</button>
            </div> -->
            <div class="detailsRow">
                <div class="avatarRectangle"></div>
                <div class="detailsColumn">
                    <div class="infoColumn">
                        <h3 class="nameSubtitle"><?= $nama ?></h3>
                        <h5 class="idHighlight"><?= $nim ?></h5>
                    </div>
                    <div class="additionalInfoRow">
                        <div class="labelsColumn">
                            <p class="programLabel">PRODI</p>
                            <p class="facultyLabel">FAKULTAS</p>
                            <p class="studyPeriodLabel">MASA STUDI</p>
                            <div class="addressLabel">ALAMAT</div>
                            <div class="usernameLabel">USERNAME</div>
                            <div class="passwordLabel">PASSWORD</div>
                        </div>
                        <div class="colonColumn">
                            <p class="programColon">:</p>
                            <p class="facultyColon">:</p>
                            <p class="studyPeriodColon">:</p>
                            <div class="addressColon">:</div>
                            <div class="usernameColon">:</div>
                            <div class="passwordColon">:</div>
                        </div>
                        <div class="valuesColumn">
                            <p class="programValue"><?= $prodi ?></p>
                            <p class="facultyValue"><?= $fakultas ?></p>
                            <p class="studyPeriodValue"><?= $masa_studi ?></p>
                            <p class="addressValue"><?= $alamat ?></p>
                            <p class="usernameValue"><?= $username ?></p>
                            <p class="passwordValue"><?= $password ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="profile profileSection">
        <!-- Konten profil yang sudah ada -->
    </div>

    <!-- Tambahkan div untuk menampilkan peta -->
    <div id="map"></div>

    <!-- Sertakan script Leaflet -->
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script>
        // Fungsi untuk memuat peta
        function initMap() {
            // Buat objek peta menggunakan koordinat
            var map = L.map('map').setView([<?= $latitude ?>, <?= $longitude ?>], 15);

            // Tambahkan layer OpenStreetMap
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(map);

            // Tambahkan marker pada lokasi pengguna
            L.marker([<?= $latitude ?>, <?= $longitude ?>]).addTo(map)
                .bindPopup('<?= $alamat ?>')
                .openPopup();
        }
    </script>
    <!-- Panggil fungsi initMap saat dokumen selesai dimuat -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            initMap();
        });
    </script>
        <div class="galleryContentBox">
            <div class="galleryColumn">
                <a href="homeuser.php">
                <img class="galleryImage4" src="./assets/47b436675238770c905ef738ae4ffac5.svg" alt="alt text" />
                </a>
                <a href="homeuser.php">
                <img class="galleryImage3" src="./assets/aa4a6ebcc090e6fc23280dce4bd0fe75.png" alt="alt text" style="top: 10px;"/>
                </a>
                <a href="index.php">
                <img class="galleryImage2" src="./assets/63f6adcc02652f9bd328601182643ad6.png" alt="alt text" style="top: 15px;"/>
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