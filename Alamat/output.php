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
        a {
            text-decoration: none;
            color: inherit;
        }

        .hide {
            display: none;
        }

        #map {
            height: 500px;
            width: 100%;
        }
    </style>
</head>

<body class="flex-column">
    <div class="openprofil root" style="--src:url(../assets/backgroundhome.png)">
        <!-- Konten lain di sini -->
        <button class="btn" onclick="showPopup()">Lihat arah</button>
        <div id="map"></div>
    </div>

    <!-- Pop-up for showing address on map -->
    <div id="popup" class="hide">
        <h3>Alamat di Peta</h3>
        <div id="popup-map"></div>
    </div>

    <script>
        // Fungsi untuk menampilkan pop-up dengan peta
        function showPopup() {
            // Kode untuk mengambil data alamat dari database dan membuat peta
            <?php
            $dbHost = 'localhost';
            $dbName = 'alamat_db';
            $dbUser = 'root';
            $dbPass = '';

            $conn = new mysqli($dbHost, $dbUser, $dbPass, $dbName);
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT address, latitude, longitude FROM alamat";
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
            var map = L.map('popup-map').setView([0, 0], 2);
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(map);

            addresses.forEach(function(address) {
                var marker = L.marker([address.latitude, address.longitude]).addTo(map);
                marker.bindPopup(address.address);
            });

            // Menampilkan pop-up dengan peta
            document.getElementById('popup').classList.remove('hide');
        }
    </script>
</body>

</html>
