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
    <link rel="stylesheet" href="./admin/assets/css/timeline.css">
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
        .badge-custom {
            background-color: #ecfae4;
            color: #68CF29;
            padding: 3px 10px;
        }

        .badge-custom-proses {
            background-color: #ffefee;
            color: #FF4C41;
            padding: 3px 10px;
        }

        .badge-custom-done {
            background-color: #fff0da;
            color: #FFAB2D;
            padding: 3px 10px;
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
    
    <?php include'./include/panduan.php'  ?>
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
                                <li class="profile-link "><a href="order_history.php">Order History</a></li>
                                <li class="profile-link active"><a href="pesananSaya.php">My Order</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">

                    <div class="card border-0 shadow-sm">
                        <div class="card-body">
                            
                            <?php
                             $getDataSepatu = mysqli_query($conn, "SELECT p1.*, service.judul
                             FROM progress_sepatu p1
                             INNER JOIN service ON service.id = p1.jenis_layanan
                             LEFT JOIN progress_sepatu p2 ON p1.kode_sepatu = p2.kode_sepatu AND p1.id < p2.id
                             WHERE p2.id IS NULL AND p1.userId = '$idUser'");
                             $i = 1;
                             if (mysqli_num_rows($getDataSepatu) >0) {
                                
                            ?>
                            
                            <div class="table-responsive">
                                <table class="table table-sm">
                                    <tr>
                                        <th>#</th>
                                        <th>Kode Sepatu</th>
                                        <th>Merk Sepatu</th>
                                        <th>Jenis Sepatu</th>
                                        <th>Warna Sepatu</th>
                                        <th>Jenis Layanan</th>
                                        <th>Status Pencucian</th>
                                        <th>Status Sepatu</th>
                                        <th>Tanggal Pengambilan</th>
                                    </tr>
                                    <?php
                                   
                                    while ($dataSepatu = mysqli_fetch_array($getDataSepatu)) {

                                    ?>
                                        <tr>
                                            <td><?php echo $i++ ?></td>
                                            <td><?php echo $dataSepatu['kode_sepatu'] ?></td>
                                            <td><?php echo $dataSepatu['merk_sepatu'] ?></td>
                                            <td><?php echo $dataSepatu['jenis_sepatu'] ?></td>
                                            <td><?php echo $dataSepatu['warna'] ?></td>
                                            <td><?php echo $dataSepatu['judul'] ?></td>
                                            <td>
                                                <div class="actions">
                                                    <a href="./detailProsesSepatu.php?kode_spt=<?php echo $dataSepatu['kode_sepatu'] ?>" class="
                                                            <?php
                                                            if ($dataSepatu['status'] == "finish") {
                                                                echo 'btn btn-danger btn-sm text-white ';
                                                            } else {
                                                                echo 'btn btn-warning btn-sm text-white ';
                                                            }

                                                            ?>">
                                                        <?php
                                                        if ($dataSepatu['status'] == 'finish') {
                                                            echo "Finish !";
                                                        } else {
                                                            echo "prosess";
                                                        } ?></a>
                                                </div>
                                            </td>
                                            <td> <?php
                                                        if ($dataSepatu['status'] == 'finish' && $dataSepatu['status_sepatu'] == 'at store') {
                                                            echo '<span class="badge badge-custom-done">Sepatu Sudah Bisa Diambil</span>';
                                                        } elseif ($dataSepatu['status'] == 'finish' && $dataSepatu['status_sepatu'] != 'at store') {
                                                            echo '<span class="badge badge-custom">Sudah Diambil</span>';
                                                        } else {
                                                            echo '<span class="badge badge-custom-proses">Masih Dalam Pengerjaan</span>';
                                                        }
                                                        ?></td>
                                            <td class="text-center">-</td>
                                        </tr>
                                    <?php } ?>
                                </table>
                            </div>
                            <?php }else{
                                echo '<h6 style="text-align: center; color:red; font-weight:bold;">Tidak Ada Pesanan</h6>';
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