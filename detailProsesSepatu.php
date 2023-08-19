<?php
session_start();
include './controller/conn.php';
$idUser = $_SESSION['user_id'];
// $idPesanan = $_GET['id_pemesanan'];
date_default_timezone_set('Asia/Jakarta'); // Atur zona waktu ke WIB (Waktu Indonesia Bagian Barat)
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>shoeslab|Tentang</title>
    <!-- link bootstrap css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous" />
    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <!-- link css -->
    <!-- <link rel="stylesheet" href="./assets/css/style.css"> -->
    <style>
        footer {
            padding-top: 30px;
            padding-bottom: 10px;
            border-top: 1px solid rgba(114, 164, 165, 0.35);
            /* margin-bottom: 10px; */
            border-bottom: 1px solid rgba(114, 164, 165, 0.35);
        }

        .icon {
            display: flex;
            flex-direction: row;
        }

        .profile {
            margin-bottom: 150px;
        }

        .first-icon .fa-whatsapp,
        .second-icon .fa-instagram,
        a {
            font-size: 20px;
            color: #72A4A5;
        }

        .second-icon {
            margin-left: 15px;
        }

        .profile-link {
            padding: 4px;

        }

        .profile-link.active {
            background-color: #FEB500;
            color: white;
            border-radius: 8px;
        }

        .profile-link.active a {
            color: white;
        }

        ul li {
            list-style: none;
        }

        .profile-link a {
            text-decoration: none;
        }

        .btn-cs-order {

            background: #FEB500;

            color: #FFF;
            text-align: center;
            font-size: 18px;
            font-family: Poppins;
            font-style: normal;
            font-weight: 300;
        }

        .breadcrumb-item a {
            text-decoration: none;
            font-size: 18px;
        }

        .repaint {
            color: #4FB5B7;
        }

        td {
            font-size: 15px;
            font-weight: 500;
            color: #999;
        }

        tr {
            margin-bottom: 10px;
        }

        .sp-pembayaran {
            background-color: #ecfae4;
            color: #68CF29;
            padding: 3px 10px;
        }

        .s-pemesanan {
            padding: 3px 10px;
            background-color: #fff0da;
            color: #FFAB2D;
        }

        .note {
            color: red;
        }

        .note p {
            line-height: 9px;
        }
        .time-line-wrapper {
    display: flex;
    align-items: center;
    justify-content: center;
}

@media (min-width:992px) {
    .page-container {
        max-width: 1140px;
        margin: 0 auto
    }

    .page-sidenav {
        display: block !important
    }
}

.padding {
    padding: 2rem
}

.w-32 {
    width: 32px !important;
    height: 32px !important;
    font-size: .85em
}

.tl-item .avatar {
    z-index: 2
}

.circle {
    border-radius: 500px
}

.gd-warning {
    color: #fff;
    border: none;
    background: #f4c414 linear-gradient(45deg, #f4c414, #f45414)
}

.timeline {
    position: relative;
    border-color: rgba(160, 175, 185, .15);
    padding: 0;
    margin: 0
}

.p-4 {
    padding: 1.5rem !important
}

.block,
.card {
    background: #fff;
    border-width: 0;
    border-radius: .25rem;
    box-shadow: 0 1px 3px rgba(0, 0, 0, .05);
    margin-bottom: 1.5rem
}

.mb-4,
.my-4 {
    margin-bottom: 1.5rem !important
}

.tl-item {
    border-radius: 3px;
    position: relative;
    display: -ms-flexbox;
    display: flex
}

.tl-item>* {
    padding: 10px
}

.tl-item .avatar {
    z-index: 2
}

.tl-item:last-child .tl-dot:after {
    display: none
}

.tl-item:last-child .tl-dot-finihs:after {
    display: none
}

.tl-item.active .tl-dot:before {
    /* background: red; */
    /* border-color: #448bff; */
    /* box-shadow: 0 0 0 4px rgba(68, 139, 255, .2); */
    padding: 5px;
}

.tl-item.active .tl-dot-finish:before {
    /* background: red; */
    /* border-color: #448bff; */
    /* box-shadow: 0 0 0 4px rgba(68, 139, 255, .2); */
    padding: 5px;
}

.tl-item:last-child .tl-dot:after {
    display: none
}

.tl-item:last-child .tl-dot-finish:after {
    display: none
}

.tl-item.active .tl-dot:before {
    background: #FBBD1F;
    /* border-color: #448bff; */

    box-shadow: 0 0 0 4px rgba(255, 193, 34, 0.21);

}

.tl-item.active .tl-dot-finish:before {
    background: #72A4A5;
    /* border-color: #448bff; */

    box-shadow: 0 0 0 4px rgba(114, 164, 165, 0.20);

}

.tl-dot-finish {}

.tl-dot {
    position: relative;
    border-color: rgba(160, 175, 185, .15)
}

.tl-dot-finish {
    position: relative;
    border-color: rgba(160, 175, 185, .15);
    /* background: red; */
}

.tl-dot:after,
.tl-dot:before {
    content: '';
    position: absolute;
    border-color: inherit;
    border-width: 2px;
    border-style: solid;
    border-radius: 50%;
    width: 10px;
    height: 10px;
    top: 15px;
    left: 50%;
    transform: translateX(-50%)
}

.tl-dot-finish:after,
.tl-dot-finish:before {
    content: '';
    position: absolute;
    border-color: inherit;
    border-width: 2px;
    border-style: solid;
    border-radius: 50%;
    width: 10px;
    height: 10px;
    top: 15px;
    left: 50%;
    transform: translateX(-50%)
}

.tl-dot:after {
    width: 0;
    height: auto;
    top: 25px;
    bottom: -15px;
    border-right-width: 0;
    border-top-width: 0;
    border-bottom-width: 0;
    border-radius: 0
}

.tl-dot-finish:after {
    width: 0;
    height: auto;
    top: 25px;
    bottom: -15px;
    border-right-width: 0;
    border-top-width: 0;
    border-bottom-width: 0;
    border-radius: 0
}

tl-item.active .tl-dot:before {
    border-color: #448bff;
    box-shadow: 0 0 0 4px rgba(68, 139, 255, .2)
}

.tl-dot {
    position: relative;
    border-color: rgba(160, 175, 185, .15)
}

.tl-dot:after,
.tl-dot:before {
    content: '';
    position: absolute;
    border-color: inherit;
    border-width: 2px;
    border-style: solid;
    border-radius: 50%;
    width: 10px;
    height: 10px;
    top: 15px;
    left: 50%;
    transform: translateX(-50%)
}

.tl-dot:after {
    width: 0;
    height: auto;
    top: 25px;
    bottom: -15px;
    border-right-width: 0;
    border-top-width: 0;
    border-bottom-width: 0;
    border-radius: 0
}

.tl-content p:last-child {
    margin-bottom: 0
}

.tl-date {
    font-size: .85em;
    margin-top: 2px;
    min-width: 100px;
    /* max-width: 100px */
}
.text-date-costum{
    font-size : 10px;
    color: #f45414;
    /* background: #000; */
}

.avatar {
    position: relative;
    line-height: 1;
    border-radius: 500px;
    white-space: nowrap;
    font-weight: 700;
    border-radius: 100%;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-pack: center;
    justify-content: center;
    -ms-flex-align: center;
    align-items: center;
    -ms-flex-negative: 0;
    flex-shrink: 0;
    border-radius: 500px;
    box-shadow: 0 5px 10px 0 rgba(50, 50, 50, .15)
}

.b-warning {
    border-color: #f4c414 !important;
}

.b-primary {
    border-color: #448bff !important;
}

.b-danger {
    border-color: #f54394 !important;
}
    </style>
</head>

<body>
    <!-- navigasi -->
    <?php include './include/navbar.php' ?>
    <!-- end navigasi -->
    <br />
    <br />
    <br />
    <br />
    <br />
    <?php include './include/panduan.php' ?>
    <div class="container">

        <section class="profile">
            <div class="row">
                <div class="col-md-3 mb-3">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body">
                            <?php
                            $getDataPhoto = mysqli_query($conn, "SELECT * FROM user WHERE id = '$idUser'");
                            while ($dataPhoto = mysqli_fetch_array($getDataPhoto)) {

                            ?>
                                <img src="./assets/img/img-profile/<?php echo $dataPhoto['photo'] ?>" class="img-thumbnail mx-auto d-block mb-4 rounded-circle" width="114px" alt="">
                            <?php } ?>
                            <ul>
                                <li class="profile-link "><a href="./profile.php">My Profile</a></li>
                                <li class="profile-link active"><a href="order_history.php">Order History</a></li>
                                <li class="profile-link "><a href="./pesananSaya.php">My Order</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="./order_history.php">My Order</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Detail Proses</li>
                        </ol>
                    </nav>
                    <div class="card border-0 shadow-sm">
                        <div class="card-body">
                            <div class="time-line-wrapper">
                                <div class="time-line mb-4">
                                <?php
                            $kode_spt = $_GET['kode_spt'];
                            $getStatus = mysqli_query($conn, "SELECT status, IFNULL(created_at, updated_at) AS tanggal FROM progress_sepatu WHERE kode_sepatu = '$kode_spt' 
                                                ");
                            while ($datastatus = mysqli_fetch_array($getStatus)) {
                                $tanggal = $datastatus['tanggal'];
                                $hari = date('l', strtotime($tanggal)); // Mengambil nama hari dari tanggal
                            ?>
                                <div class="tl-item active">
                                    <div class="<?php if ($datastatus['status'] == "finish") {
                                                    echo 'tl-dot-finish';
                                                } else {
                                                    echo 'tl-dot';
                                                }
                                                ?>"></div>
                                    <div class="tl-content">
                                        <div class=""><?php if ($datastatus['status'] == "finish") {
                                                            echo 'Sepatu Sudah Selesai';
                                                        } else {
                                                            echo $datastatus['status'];
                                                        }
                                                        ?></div>
                                        <div><small><?php echo $hari . ', ' . $tanggal ?></small></div>
                                    </div>
                                </div>
                            <?php } ?>
                                </div>
                            </div>
                            <div class="row">
                            <div class="col-md-6">
                            <a href="./pesananSaya.php" class="btn btn-warning btn-sm">Kembali</a>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- footer -->
    <?php include './include/footer.php' ?>
    <!-- end footer -->

    <!-- script bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <!-- script fontawesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>
    <script src="./assets/js/script2.js"></script>
</body>

</html>