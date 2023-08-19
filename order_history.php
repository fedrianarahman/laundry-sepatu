<?php
session_start();
include './controller/conn.php';
$idUser = $_SESSION['user_id'];
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
                            <?php }?>
                            <ul>
                                <li class="profile-link "><a href="./profile.php">My Profile</a></li>
                                <li class="profile-link active"><a href="order_history.php">Order History</a></li>
                                <li class="profile-link"><a href="pesananSaya.php">My Order</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">

                    <div class="card border-0 shadow-sm">
                        <div class="card-body">
                            <?php
                              $getDataPemesanan = mysqli_query($conn, "SELECT pemesanan.id AS id_pesanan, pemesanan.merk_sepatu AS merk_sepatu,pemesanan.jenis_sepatu AS jenis_sepatu,pemesanan.warna_sepatu AS warna_sepatu,pemesanan.created_at AS tgl_pemesanan,service.judul AS jenis_layanan FROM pemesanan INNER JOIN service ON service.id = pemesanan.layana_id WHERE pemesanan.userId = '$idUser' AND pemesanan.status_pembayaran='L'");
                              $i =1;
                              if (mysqli_num_rows($getDataPemesanan) > 0) {
                                
                            ?>
                            <div class="table-responsive">
                                <table class="table table-sm">
                                    <tr>
                                        <th>#</th>
                                        <th>Merk Sepatu</th>
                                        <th>Jenis Sepatu</th>
                                        <th>Warna Sepatu</th>
                                        <th>Jenis Layanan</th>
                                        <th>Status Pembayaran</th>
                                        <th>Tanggal Pemesanan</th>
                                        <th>Aksi</th>
                                    </tr>
                                    <?php
                                  
                                    while ($dataPemesanan = mysqli_fetch_array($getDataPemesanan)) {
                                    ?>
                                    <tr>
                                        <td><?php echo $i?></td>
                                        <td><?php echo $dataPemesanan['merk_sepatu'] ?></td>
                                        <td><?php echo $dataPemesanan['jenis_sepatu'] ?></td>
                                        <td><?php echo $dataPemesanan['warna_sepatu'] ?></td>
                                        <td><?php echo $dataPemesanan['jenis_layanan'] ?></td>
                                        <td><span class="btn btn-sm btn-success">Lunas</span></td>
                                        <td><?php $created_old = strtotime($dataPemesanan['tgl_pemesanan']);
                                            echo date('F d Y', $created_old)?></td>
                                        <td>
                                        <a href="./detail_history.php?id_pemesanan=<?php echo $dataPemesanan['id_pesanan']?>" class="btn btn-warning shadow btn-xs sharp mr-1"><i class="fa fa-eye" data-toggle="tooltip" title="Detail"></i></a>
                                        </td>
                                    </tr>
                                    <?php $i++?>
                                    <?php }?>
                                </table>
                            </div>
                            <?php }else{
                                echo '<h6 style="text-align: center; color:red; font-weight:bold;">Tidak Ada Riwayat</h6>';
                            }?>
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