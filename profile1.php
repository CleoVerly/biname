<?php

session_start();
include("koneksi.php");

// Periksa apakah pengguna sudah login
if (!isset($_SESSION['username'])) {
    // Jika belum, arahkan pengguna kembali ke halaman login
    header("Location: login.php");
    exit;
}

// Mengambil user_id dari URL
$user_id = isset($_GET['user_id']) ? intval($_GET['user_id']) : 0;

// Mengambil data dari database berdasarkan user_id
if ($user_id > 0) {
    $sql = "SELECT * FROM mahasiswa WHERE user_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user_data = $result->fetch_assoc();
        $nama = $user_data['nama'];
        $nim = $user_data['nim'];
        $prodi = $user_data['prodi'];
        $fakultas = $user_data['fakultas'];
        $masa_studi = $user_data['masa_studi'];
        $latitude = $user_data['latitude']; // Ambil nilai latitude dari database
        $longitude = $user_data['longitude']; // Ambil nilai longitude dari database
        $alamat = $user_data['address'];
        $username = $user_data['username'];
        $password = $user_data['password'];
    } else {
        // Jika tidak ada data pengguna yang cocok, beri peringatan
        echo "Data pengguna tidak ditemukan!";
        exit;
    }

    $stmt->close();
} else {
    echo "User ID tidak valid.";
    exit;
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
            width: 80%; /* Atur lebar peta */
            margin: 0 auto; /* Posisikan peta di tengah halaman */
        }

        .back {
            position: absolute;
            top: 220px;
            right: 230px;
            z-index: 1000; /* Pastikan tombol berada di atas elemen lain */
            background-color: #f00; /* Warna latar belakang tombol */
            color: #fff; /* Warna teks tombol */
            border: none;
            padding: 10px;
            cursor: pointer;
            border-radius: 10px;
        }
    </style>
</head>

<body class="flex-column">
    <button class="back" onclick="goBack()">BACK</button>
    <div class="profile profileSection" style="--src:url(../assets/d67dd176465efdfb2d41f0bd9f7a21ba.svg)">
        <img class="profileImage" src="./assets/7df27a9129a89125bd086ac50725d59a.png" alt="alt text" />
        <div class="contactContentBox">
            <div class="detailsRow">
                <div class="avatarRectangle"></div>
                <div class="detailsColumn">
                    <div class="infoColumn">
                        <h3 class="nameSubtitle"><?= htmlspecialchars($nama) ?></h3>
                        <h5 class="idHighlight"><?= htmlspecialchars($nim) ?></h5>
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
                            <p class="programValue"><?= htmlspecialchars($prodi) ?></p>
                            <p class="facultyValue"><?= htmlspecialchars($fakultas) ?></p>
                            <p class="studyPeriodValue"><?= htmlspecialchars($masa_studi) ?></p>
                            <p class="addressValue"><?= htmlspecialchars($alamat) ?></p>
                            <p class="usernameValue"><?= htmlspecialchars($username) ?></p>
                            <p class="passwordValue"><?= htmlspecialchars($password) ?></p>
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
                    .bindPopup('<?= htmlspecialchars($alamat) ?>')
                    .openPopup();
            }
        </script>
        <!-- Panggil fungsi initMap saat dokumen selesai dimuat -->
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                initMap();
            });
        </script>
    </div>
    <script type="text/javascript">
        AOS.init();
        new Sticky('.sticky-effect');
    </script>
    <script>
        function goBack() {
            window.history.back();
        }
    </script>
</body>

</html>
