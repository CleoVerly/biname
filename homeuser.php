<!DOCTYPE html>
<html>
<!-- This source code is exported from pxCode, you can get more document from https://www.pxcode.io -->
<?php
    include 'koneksi.php';
    session_start();
    $search = isset($_GET['search']) ? $_GET['search'] : '';
    if (!empty($search)) {
        $sql = "SELECT nama, nim, user_id FROM mahasiswa WHERE nama LIKE '%$search%'";
        $result = $conn->query($sql);
    }
?>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous" />
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/aos@2.3.1/dist/aos.css" />
    <link rel="stylesheet" type="text/css" href="./css/common.css" />
    <link rel="stylesheet" type="text/css" href="./css/fonts.css" />
    <link rel="stylesheet" type="text/css" href="./css/Adminhome.css" />
    <script type="text/javascript" src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script type="text/javascript" src="https://unpkg.com/sticky-js@1.3.0/dist/sticky.min.js"></script>
    <script type="text/javascript" src="https://unpkg.com/headroom.js@0.12.0/dist/headroom.min.js"></script>
</head>
<style>
    .kotakpencarian {
        max-height: 200px;
        bottom: 190px;
        right: 310px;
        overflow-y: auto;
        position: absolute;
        gap: 11px 0px;
        width: 45%;
        background-color: #f1f9ff;
        padding: 13px 19px 12px 16px;
        box-shadow: 0px 1px 5px 2px rgba(0, 0, 0, 0.149);
        transform: translate(0px, 60px);
        z-index: 1000;
    }
    .boxprofile {
        position: relative;
        display: flex;
        gap: 0px 16px;
        background-color: #f1f9ff;
        padding: 7px 7px 7px 7px;
        box-shadow: 0px 1px 5px 2px rgba(0, 0, 0, 0.149);
    }
    .labeldata {
        position: relative;
        display: flex;
        align-items: center;
        font: 400 16px/1.18 "Inter", Helvetica, Arial, serif;
        color: rgba(0, 58, 146, 0.498);
    }
    .data {
        position: relative;
        display: flex;
        flex-direction: column;
        gap: 1px 0px;
        margin: 2px 0px 0px;
        width: 84px;
        min-width: 0px;
    }
</style>
<body class="flex-column">
    <div class="adminhome formSection" style="--src:url(../assets/0aa3e907632373b70b5ea5f451297a94.png)">
        <div class="flexRow">
            <div class="contentBox">
                <form action="" method="GET">
                    <input type="text" name="search" class="highlightTitle" placeholder="Masukkan Nama" style="border: none; background: transparent; width: 530px;"/>
                </form>
            </div>
            <div class="contentBox1">
                <img class="inputImage" src="./assets/bb1c965cf872170778bfd45160dd5954.png" alt="alt text" />
            </div>
        </div>
        <?php if (!empty($search)) { ?>
            <div class="kotakpencarian">
                <?php if (isset($result)) {
                    while($row = $result->fetch_assoc()) { ?>
                        <a href="profile1.php?user_id=<?php echo $row['user_id']; ?>" class="boxprofile">
                            <img class="profile" src="./assets/aff0f229d528c96afc167f5a03f76eb8.svg" alt="Profile Image" />
                            <div class="data">
                                <h5 class="labeldata"><?php echo htmlspecialchars($row['nama']); ?></h5>
                                <h5 class="labeldata"><?php echo htmlspecialchars($row['nim']); ?></h5>
                            </div>
                        </a>
                    <?php }
                } ?>
            </div>
        <?php } ?>
        <img class="headerImage" src="./assets/64a6dfdc8ebf0d8ee8488f95a64cfc4e.png" alt="alt text" />
        <a href="Help.php">
            <img class="footerImage" src="./assets/7e9b0815da8f02ba807b35266268d777.png" alt="alt text" style="left: 650px;"/>
        </a>
        <div class="flexRow1">
            <div class="statusText">HALO!!&nbsp<?=$_SESSION['nama']?></div>
            <div class="contentBox2">
                <div class="flexCol">
                    <a href="homeuser.php">
                        <img class="svgIcon1" src="./assets/47b436675238770c905ef738ae4ffac5.svg" alt="alt text" style="right: 4px;" />
                    </a>
                    <a href="homeuser.php">
                        <img class="secondaryImage1" src="./assets/aa4a6ebcc090e6fc23280dce4bd0fe75.png" alt="alt text" style="right: 4px;" />
                    </a>
                    <a href="profile.php">
                        <img class="secondaryImage2" src="./assets/Profile.png" alt="alt text" style="right: 4px; bottom: 4px"/>
                    </a>
                    <a href="index.php">
                        <img class="decorativeImage" src="./assets/63f6adcc02652f9bd328601182643ad6.png" alt="alt text"style="right: 4px; bottom: 8px  "/>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        AOS.init();
        new Sticky('.sticky-effect');
    </script>
</body>
</html>

