<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $address = $_POST['address'];
    $dbHost = 'localhost';
    $dbName = 'alamat_db';
    $dbUser = 'root';
    $dbPass = '';

    // Fungsi untuk mendapatkan koordinat menggunakan Nominatim
    function getCoordinates($address) {
        $url = 'https://nominatim.openstreetmap.org/search?format=json&q=' . urlencode($address);
        $options = [
            'http' => [
                'header' => "User-Agent: PHP/" . PHP_VERSION . "\r\n"
            ]
        ];
        $context = stream_context_create($options);
        $response = file_get_contents($url, false, $context);
        if ($response === FALSE) {
            return false;
        }
        $response = json_decode($response, true);

        if (!empty($response)) {
            $location = $response[0];
            return [
                'lat' => $location['lat'],
                'lon' => $location['lon']
            ];
        }
        return false;
    }

    $location = getCoordinates($address);

    if ($location) {
        $latitude = $location['lat'];
        $longitude = $location['lon'];

        // Koneksi ke database
        $conn = new mysqli($dbHost, $dbUser, $dbPass, $dbName);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Simpan data ke database
        $stmt = $conn->prepare("INSERT INTO alamat (address, latitude, longitude) VALUES (?, ?, ?)");
        $stmt->bind_param("sdd", $address, $latitude, $longitude);
        $stmt->execute();
        $stmt->close();
        $conn->close();

        // Redirect ke halaman output
        header("Location: output.php");
        exit;
    } else {
        echo "Geocoding failed for address: $address";
    }
}
?>
