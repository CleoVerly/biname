<?php
include 'koneksi.php';

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Memeriksa apakah parameter ID telah diterima
if(isset($_GET['user_id'])) {
    $id = $_GET['user_id'];

    // Mengeksekusi query DELETE untuk menghapus data dari login_history
    $sql_login_history = "DELETE FROM login_history WHERE user_id = $id";

    if ($conn->query($sql_login_history) === TRUE) {
        // Setelah menghapus data dari login_history, baru menghapus data dari mahasiswa
        $sql_mahasiswa = "DELETE FROM mahasiswa WHERE user_id = $id";

        if ($conn->query($sql_mahasiswa) === TRUE) {
            echo "Record deleted successfully";
        } else {
            echo "Error deleting record from mahasiswa: " . $conn->error;
        }
    } else {
        echo "Error deleting record from login_history: " . $conn->error;
    }

    // Menutup koneksi
    $conn->close();

    // Mengarahkan pengguna kembali ke halaman utama
    header("Location: Adminhome.php");
    exit();
} else {
    echo "ID not found";
}
?>
