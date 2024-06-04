<!DOCTYPE html>
<html>
<?php
include 'koneksi.php';
$sql = "SELECT nama, nim, user_id FROM mahasiswa";
$result = $conn->query($sql);
?>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css" />
    <link rel="stylesheet" href="./css/common.css" />
    <link rel="stylesheet" href="./css/fonts.css" />
    <link rel="stylesheet" href="./css/style.css" />
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://unpkg.com/sticky-js@1.3.0/dist/sticky.min.js"></script>
    <script src="https://unpkg.com/headroom.js@0.12.0/dist/headroom.min.js"></script>
</head>

<body class="flex-column">
    <div class="adminhome root" style="--src:url(../assets/backgroundhome.png)">
        <img class="image1" src="./assets/BINlogo.png" alt="BIN logo" />
        <div class="flex_row">
            <div class="flex_col">
                <h5 class="highlight">Anda masuk sebagai Admin!</h5>
                <div class="flex_row1">
                    <div class="flex_col1">
                        <div class="content_box">
                            <img class="image2" src="./assets/serch.png" alt="Serch Icon" />
                            <form action="" method="GET">
                                <input type="text" name="search" class="input_mencari_user" placeholder="Masukkan Nama" value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>" />
                            </form>
                        </div>
                        <div class="flex_col2">
                            <div class="scrollable-container">
                                <?php
                                include 'koneksi.php';
                                $search = isset($_GET['search']) ? $_GET['search'] : '';
                                $sql = "SELECT nama, nim, user_id FROM mahasiswa WHERE nama LIKE '%$search%'";
                                $result = $conn->query($sql);

                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        echo '<div class="group">';
                                        echo '<div class="content_box1" onclick="window.location.href=\'edit.php?user_id=' . $row['user_id'] . '\'">';
                                        echo '<img class="image3" src="./assets/user.png" alt="User image" />';
                                        echo '<div class="flex_col3">';
                                        echo '<h5 class="highlight2">' . $row["nama"] . '</h5>';
                                        echo '<div class="text">' . $row["nim"] . '</div>';
                                        echo '</div>';
                                        echo '</div>';
                                        echo '<button class="btn" onclick="window.location.href=\'hapus.php?user_id=' . $row['user_id'] . '\'">Hapus</button>';
                                        echo '</div>';
                                    }
                                } else {
                                    echo "Tidak ada hasil";
                                }
                                $conn->close();
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content_box4">
                <a href="Adminhome.php">
                    <img class="image8" src="./assets/menu.png" alt="Menu icon" />
                </a>
                <a href="History.php">
                    <img class="image6" src="./assets/history.png" alt="History icon" />
                </a>
                <a href="index.php">
                    <img class="image7" src="./assets/exit.png" alt="Exit icon" />
                </a>
            </div>
            <a href="Adminedituser.php">
                <img class="image4" src="./assets/adduser.png" alt="Add user icon" />
            </a>
        </div>
    </div>
    <script type="text/javascript">
        AOS.init();
        new Sticky('.sticky-effect');
    </script>
</body>

</html>
</html>

