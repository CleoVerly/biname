<?php
// Include file koneksi.php
include 'koneksi.php';

// Fungsi untuk mendapatkan koordinat dari alamat menggunakan API Nominatim
function getCoordinates($address) {
    $url = 'https://nominatim.openstreetmap.org/search?format=json&q=' . urlencode($address);
    $options = [
        'http' => [
            'header' => "User-Agent: PHP/" . PHP_VERSION . "\r\n"
        ]
    ];
    $context = stream_context_create($options);
    $response = file_get_contents($url, false, $context);
    if ($response === false) {
        return false;
    } else {
        $data = json_decode($response, true);
        if (isset($data[0])) {
            $latitude = $data[0]['lat'];
            $longitude = $data[0]['lon'];
            return array('latitude' => $latitude, 'longitude' => $longitude);
        } else {
            return false;
        }
    }
}

// Periksa apakah user_id tersedia dalam POST
if (isset($_GET['user_id'])) {
    $user_id = $_GET['user_id'];

    // Ambil data dari $_POST
    $nama = $_POST['nama'];
    $nim = $_POST['nim'];
    $prodi = $_POST['prodi'];
    $fakultas = $_POST['fakultas'];
    $alamat = $_POST['alamat'];
    $username =$_POST['username'];
    $password =$_POST['password'];


    // Dapatkan koordinat dari alamat menggunakan fungsi getCoordinates
    $coordinates = getCoordinates($alamat);

    if ($coordinates !== false) {
        $latitude = $coordinates['latitude'];
        $longitude = $coordinates['longitude'];

        // Update data ke database
        $sql_update = "UPDATE mahasiswa SET nama='$nama', nim='$nim', prodi='$prodi', fakultas='$fakultas', latitude='$latitude', longitude='$longitude',address='$alamat',username='$username',password='$password' WHERE user_id='$user_id'";
        if ($conn->query($sql_update) === TRUE) {
            header("Location: adminhome.php");
            exit;
        } else {
            echo "Error: " . $sql_update . "<br>" . $conn->error;
        }
    } else {
        echo "Alamat tidak valid";
    }
} else {
    echo "User ID tidak tersedia";
}

// Tutup koneksi
$conn->close();
?>
