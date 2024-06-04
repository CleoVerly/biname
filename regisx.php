<?php
include("koneksi.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $nim = $_POST['nim'];
    $prodi = $_POST['prodi'];
    $fakultas = $_POST['fakultas'];
    $masa_studi = $_POST['masa_studi'];
    $alamat = $_POST['alamat'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Validate input fields
    if (!empty($nama) && !empty($nim) && !empty($prodi) && !empty($fakultas) && !empty($masa_studi) && !empty($alamat) && !empty($username) && !empty($password)) {
        // Function to get coordinates
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

        // Get coordinates for the provided address
        $location = getCoordinates($alamat);

        if ($location) {
            $latitude = $location['lat'];
            $longitude = $location['lon'];

            // Insert data into the 'alamat' table
            $stmt = $conn->prepare("INSERT INTO alamat (address, latitude, longitude) VALUES (?, ?, ?)");
            $stmt->bind_param("sdd", $alamat, $latitude, $longitude);
            $stmt->execute();
            $stmt->close();

            // Insert data into the 'mahasiswa' table
            $stmt = $conn->prepare("INSERT INTO mahasiswa (nama, nim, prodi, fakultas, masa_studi, address, username, password, latitude, longitude) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("ssssssssdd", $nama, $nim, $prodi, $fakultas, $masa_studi, $alamat, $username, $password, $latitude, $longitude);
            $stmt->execute();
            $stmt->close();

            // Redirect to output page
            header("Location: index.php");
            exit();
        } else {
            echo "Geocoding failed for address: $alamat";
        }
    } else {
        echo "All fields are required!";
    }

    $conn->close();
}
?>
