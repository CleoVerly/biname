<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// Ambil user_id dari URL
$user_id = isset($_GET['user_id']) ? $_GET['user_id'] : null;

// Koneksi ke database
$dbHost = 'localhost';
$dbName = 'uts';
$dbUser = 'root';
$dbPass = '';
$conn = new mysqli($dbHost, $dbUser, $dbPass, $dbName);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query untuk mengambil data pengguna berdasarkan user_id
if ($user_id) {
    $sql = "SELECT * FROM mahasiswa WHERE user_id = '$user_id'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $nama = $row['nama'];
        $nim = $row['nim'];
        $prodi = $row['prodi'];
        $fakultas = $row['fakultas'];
        $address = $row['address']; // Perbaikan variabel dari $alamat menjadi $address
        $latitude = $row['latitude']; // Tambahkan latitude
        $longitude = $row['longitude']; // Tambahkan longitude
    }
} else {
    echo "No user ID provided";
}

$conn->close();
?>

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
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <script type="text/javascript" src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script type="text/javascript" src="https://unpkg.com/sticky-js@1.3.0/dist/sticky.min.js"></script>
    <script type="text/javascript" src="https://unpkg.com/headroom.js@0.12.0/dist/headroom.min.js"></script>
    <script type="text/javascript" src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <style>
        #map {
            height: 400px; /* Ubah tinggi sesuai kebutuhan Anda */
            width: 80%; /* Ubah lebar sesuai kebutuhan Anda */
            margin: auto; /* Tengahkan peta */
            margin-top: 20px; /* Beri jarak di atas peta */
        }
    </style>
</head>

<body class="flex-column">
    <div class="openprofil root" style="--src:url(../assets/backgroundhome.png)">
        <img class="image1" src="./assets/BINlogo.png" alt="BIN logo" />
        <div class="flex_col">
            <div class="flex_row">
                <div class="group">
                    <div class="group1">
                        <div class="group1">
                            <div class="group1">
                                <div class="group1">
                                    <div class="rect"></div>
                                    <div class="flex_col1">
                                        <div class="flex_row1">
                                            <div class="rect1"></div>
                                            <div class="flex_col2">
                                                <div class="flex_row2">
                                                    <div class="flex_row3">
                                                        <h5 class="highlight1">Nama</h5>
                                                        <h5 class="highlight1">:</h5>
                                                    </div>
                                                    <h5 class="highlight2"><?= htmlspecialchars($nama); ?></h5>
                                                </div>
                                                <div class="flex_row2">
                                                    <div class="flex_row3">
                                                        <h5 class="highlight1">NIM</h5>
                                                        <h5 class="highlight1">:</h5>
                                                    </div>
                                                    <h5 class="highlight2"><?= htmlspecialchars($nim); ?></h5>
                                                </div>
                                                <div class="flex_row2">
                                                    <div class="flex_row3">
                                                        <h5 class="highlight1">Prodi</h5>
                                                        <h5 class="highlight1">:</h5>
                                                    </div>
                                                    <h5 class="highlight2"><?= htmlspecialchars($prodi); ?></h5>
                                                </div>
                                                <div class="flex_row2">
                                                    <div class="flex_row3">
                                                        <h5 class="highlight1">Fakultas</h5>
                                                        <h5 class="highlight1">:</h5>
                                                    </div>
                                                    <h5 class="highlight2"><?= htmlspecialchars($fakultas); ?></h5>
</div>
<div class="flex_row2">
<div class="flex_row3">
<h5 class="highlight1">Alamat</h5>
<h5 class="highlight1">:</h5>
</div>
<h5 class="highlight2"><?= htmlspecialchars($address); ?></h5>
</div>
</div>
</div>
</div>
</div>
<h1 class="big_title">UIN Syarif Hidayatullah Jakarta</h1>
</div>
<h2 class="medium_title">Profil Mahasiswa</h2>
</div>
<img class="image9" src="./assets/logoUIN.png" alt="UIN logo" />
</div>
<img class="image2" src="./assets/7a02bb3db5f1bad02b94ee7de7ec3026.svg" alt="Background decoration" />
</div>
<div class="content_box">
<a href="Userhome.php">
<img class="image6" src="./assets/menu.png" alt="Menu icon" />
</a>
<a href="Userprofil.php">
<img class="image7" src="./assets/profile.png" alt="History icon" />
</a>
<a href="index.php">
<img class="image8" src="./assets/exit.png" alt="Exit icon" />
</a>
</div>
</div>
<img class="image5" src="./assets/back.png" alt="Background" />
</div>
</div>
<!-- Map section -->
<div id="map"></div>

<script>
    // Fungsi untuk membuat peta
    function initMap() {
        <?php
        // Menulis kode JavaScript untuk membuat peta dengan alamat yang didapat dari database
        ?>
        var map = L.map('map').setView([<?= $latitude ?>, <?= $longitude ?>], 13);
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);
        var marker = L.marker([<?= $latitude ?>, <?= $longitude ?>]).addTo(map);
        marker.bindPopup("<?= $address ?>").openPopup();
    }
</script>



<script async defer src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap"></script>
</body>
</html>
