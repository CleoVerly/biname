<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous" />
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/aos@2.3.1/dist/aos.css" />
    <link rel="stylesheet" type="text/css" href="./css/common.css" />
    <link rel="stylesheet" type="text/css" href="./css/fonts.css" />
    <link rel="stylesheet" type="text/css" href="./css/Home.css" />
    <script type="text/javascript" src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script type="text/javascript" src="https://unpkg.com/sticky-js@1.3.0/dist/sticky.min.js"></script>
    <script type="text/javascript" src="https://unpkg.com/headroom.js@0.12.0/dist/headroom.min.js"></script>
</head>
<body class="flex-column">
    <?php
        include 'koneksi.php';
        $search = isset($_GET['search']) ? $_GET['search'] : '';
        if (!empty($search)) {
            $sql = "SELECT nama, nim, user_id FROM mahasiswa WHERE nama LIKE '%$search%'";
            $result = $conn->query($sql);
        }
    ?>
    <div class="home formSection" style="--src:url(../assets/0aa3e907632373b70b5ea5f451297a94.png)">
        <div class="flexRow">
            <div class="highlight">
                <form action="" method="GET">
                    <input type="text" name="search" class="input_mencari_user" placeholder="Masukkan Nama"/>
                </form>
            </div>
            <div class="contentBox">
                <img class="image" src="./assets/bb1c965cf872170778bfd45160dd5954.png" alt="alt text" />
            </div>
            <?php if (!empty($search)) { ?>
                <div class="kotakpencarian">
                    <?php
                        if (isset($result)) {
                            while($row = $result->fetch_assoc()) {
                    ?>
                               <div class="boxprofile">
                                   <a href="Profile1.php?user_id=<?php echo htmlspecialchars($row['user_id']); ?>" class="profileLink">
                                       <div class="profileContainer">
                                           <img class="profile" src="./assets/aff0f229d528c96afc167f5a03f76eb8.svg" alt="Profile Image" />
                                           <div class="data">
                                               <h5 class="labeldata"><?php echo htmlspecialchars($row['nama']); ?></h5>
                                               <h5 class="labeldata"><?php echo htmlspecialchars($row['nim']); ?></h5>
                                           </div>
                                       </div>
                                   </a>
                               </div>
                    <?php
                            }
                        }
                    ?>
                </div>
            <?php } ?>
        </div>
        <a href="Help.php">
            <img class="image1" src="./assets/7e9b0815da8f02ba807b35266268d777.png" alt="alt text" />
        </a>
        <img class="image2" src="./assets/64a6dfdc8ebf0d8ee8488f95a64cfc4e.png" alt="alt text" />
        <div class="actionRow">
            <a href="regisBNI.php">
                <button class="button">REGISTER</button>
            </a>
            <a href="loginBNI.php">
                <button class="button1">LOG IN</button>
            </a>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.input_mencari_user').on('input', function() {
                var searchValue = $(this).val();
                if (searchValue.trim() !== '') {
                    $.get('search.php', {search: searchValue}, function(data) {
                        if (data.trim().length > 0) {
                            $('.kotakpencarian').html(data).show();
                        } else {
                            $('.kotakpencarian').hide();
                        }
                    });
                } else {
                    $('.kotakpencarian').hide();
                }
            });
        });
    </script>
</body>
</html>
