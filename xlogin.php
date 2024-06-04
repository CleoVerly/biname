<?php
include 'koneksi.php';
session_start();

// Memeriksa apakah form login telah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query untuk memeriksa apakah kredensial yang diberikan cocok dengan akun admin
    if ($username === "admin" && $password === "admin") {
        // Jika cocok, arahkan pengguna ke halaman adminhome.php
        header("Location: adminhome.php");
        exit();
    }

    // Query untuk memeriksa kredensial dalam database
    $sql = "SELECT * FROM mahasiswa WHERE username = '$username'";
    $result = $conn->query($sql);

    // Jika hasil query mengembalikan satu baris, artinya kredensial yang diberikan cocok dengan salah satu akun pengguna
    if ($result->num_rows == 1) {
        // Ambil data pengguna dari hasil query
        $user_data = $result->fetch_assoc();

        // Memeriksa apakah password cocok
        if ($password === $user_data['password']) {
            // Menyimpan data pengguna dalam session
            $_SESSION['username'] = $username;
            $_SESSION['nama'] = $user_data['nama'];
            $_SESSION['nim'] = $user_data['nim'];
            $_SESSION['prodi'] = $user_data['prodi'];
            $_SESSION['fakultas'] = $user_data['fakultas'];
            $_SESSION['masa_studi'] = $user_data['masa_studi'];
            $_SESSION['alamat'] = $user_data['address'];

            // Query untuk mencatat login user
            $login_time = date('Y-m-d H:i:s');
            $user_id = $user_data['user_id'];

            $insert_query = "INSERT INTO login_history (user_id, login_time) VALUES ('$user_id', '$login_time')";
            if ($conn->query($insert_query) === TRUE) {
                echo "Riwayat login berhasil disimpan.";
            } else {
                echo "Error: " . $insert_query . "<br>" . $conn->error;
            }

            // Arahkan pengguna ke halaman userhome.php
            header("Location: homeuser.php");
            exit();
        } else {
            // Jika password salah, tampilkan pesan kesalahan menggunakan JavaScript
            echo "<script>alert('Password salah'); window.location.href = 'LoginBNI.php';</script>";
        }
    } else {
        // Jika username tidak ditemukan, tampilkan pesan kesalahan menggunakan JavaScript
        echo "<script>alert('Username tidak ditemukan'); window.location.href = 'LoginBNI.php';</script>";
    }

    // Menutup koneksi
    $conn->close();
}
?>
