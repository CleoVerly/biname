<?php
include 'koneksi.php'; // Pastikan file ini ada dan berisi koneksi ke database

// Query untuk mendapatkan data riwayat login, termasuk username
$sql = "SELECT lh.login_time, m.nama FROM login_history lh JOIN mahasiswa m ON lh.user_id = m.user_id ORDER BY lh.login_time DESC";
$result = $conn->query($sql);
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
    <script type="text/javascript" src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script type="text/javascript" src="https://unpkg.com/sticky-js@1.3.0/dist/sticky.min.js"></script>
    <script type="text/javascript" src="https://unpkg.com/headroom.js@0.12.0/dist/headroom.min.js"></script>
    <style>
        .history-content {
            max-height: 400px;
            overflow-y: auto;
        }
    </style>
</head>
<body class="flex-column">
    <div class="history root" style="--src:url(../assets/backgroundhome.png)">
        <img class="image1" src="./assets/BINlogo.png" alt="alt text" />
        <div class="flex_row">
            <div class="content_box3">
                <div class="flex_row1">
                    <div class="flex_col history-content">
                        <h2 class="medium_title">RIWAYAT USER LOGIN</h2>
                        <?php
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo '
                                <div class="content_box">
                                    <img class="image5" src="./assets/user.png" alt="User Image" />
                                    <div class="flex_col1">
                                        <h5 class="highlight">' . htmlspecialchars($row['nama']) . '</h5>
                                        <div class="text">' . htmlspecialchars($row['login_time']) . '</div>
                                    </div>
                                </div>';
                            }
                        } else {
                            echo '<p>No login history found.</p>';
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div class="group">
                <div class="group1">
                    <div class="rect1"></div>
                    <div class="rect2"></div>
                </div>
                <div class="group2">
                    <div class="rect3"></div>
                    <a href="History.php">
                        <img class="image2" src="./assets/history.png" alt="History Icon" />
                    </a>
                </div>
                <a href="Adminhome.php">
                    <img class="image4" src="./assets/menu.png" alt="Menu Icon" />
                </a>
                <a href="index.php">
                    <img class="image3" src="./assets/Exit.png" alt="Exit Icon" />
                </a>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        AOS.init();
        new Sticky('.sticky-effect');
    </script>
</body>
</html>

<?php
$conn->close();
?>
