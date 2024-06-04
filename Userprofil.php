<!DOCTYPE html>
<html>
<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

$nama = $_SESSION['nama'];
$nim = $_SESSION['nim'];
$prodi = $_SESSION['prodi'];
$fakultas = $_SESSION['fakultas'];
$masa_studi = $_SESSION['masa_studi'];
$alamat = $_SESSION['alamat'];
?>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css" />
    <link rel="stylesheet" href="./css/common.css" />
    <link rel="stylesheet" href="./css/fonts.css" />
    <link rel="stylesheet" href="./css/style.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://unpkg.com/sticky-js@1.3.0/dist/sticky.min.js"></script>
    <script src="https://unpkg.com/headroom.js@0.12.0/dist/headroom.min.js"></script>
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <style>
        #map {
            height: 400px; /* Ubah tinggi sesuai kebutuhan Anda */
            width: 80%; /* Ubah lebar sesuai kebutuhan Anda */
            height: 400px; /* Ubah tinggi sesuai kebutuhan Anda */
             /* Ubah lebar sesuai kebutuhan Anda */
            margin: auto; /* Tengahkan peta */
            margin-top: 20px; 
            background-color: transparent; 
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
                                                    <div class="flex_row4">
                                                        <!-- <h5 class="highlight1">Masa Studi</h5>
                                                        <h5 class="highlight1">:</h5> -->
                                                    </div>
                                                    <h5 class="highlight2"><?= htmlspecialchars($masa_studi); ?></h5>
                                                </div>
                                                <div class="flex_row2">
                                                    <div class="flex_row3">
                                                        <h5 class="highlight1">Alamat</h5>
                                                        <h5 class="highlight1">:</h5>
                                                    </div>
                                                    <h5 class="highlight2"><?= htmlspecialchars($alamat); ?></h5>
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
                    <a href="userhome.php">
                        <img class="image6" src="./assets/menu.png" alt="Menu icon" />
                    </a>
                    <a href="Userprofil.php">
                        <img class="image7" src="./assets/profile.png" alt="Profile icon" />
                    </a>
                    <a href="index.php">
                        <img class="image8" src="./assets/exit.png" alt="Exit icon" />
                    </a>
                </div>
            </div>
           
        </div>
    </div>
    
    <div id="map">

    <script>
        // Fungsi untuk membuat peta
        function initMap() {
            <?php
            // Kode PHP untuk mengambil data alamat dan koordinat dari database
            $dbHost = 'localhost';
            $dbName = 'uts';
            $dbUser = 'root';
            $dbPass = '';

            $conn = new mysqli($dbHost, $dbUser, $dbPass, $dbName);
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT address, latitude, longitude FROM mahasiswa WHERE nim = '$nim'";
            $result = $conn->query($sql);
            $addresses = [];

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $addresses[] = $row;
                }
            }

            $conn->close();
            ?>

            // Menulis kode JavaScript untuk membuat peta dengan alamat yang didapat dari database
            var addresses = <?php echo json_encode($addresses); ?>;
            var map = L.map('map').setView([addresses[0].latitude, addresses[0].longitude], 13); // Set initial view to first address
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(map);

            addresses.forEach(function(address) {
                var marker = L.marker([address.latitude, address.longitude]).addTo(map);
                marker.bindPopup(address.address + ', Jakarta'); // Tambahkan nama kota di sini
            });
        }

        // Panggil fungsi initMap setelah halaman selesai dimuat
        document.addEventListener("DOMContentLoaded", function() {
            initMap();
        });
        
    </script></div>
</body>
</html>
