<?php
session_start();
include './controller/conn.php';
$id = $_GET['id'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <!-- link bootstrap css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous" />
    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <!-- link css -->
    <link rel="stylesheet" href="./assets/css/style2.css" />
    <style>
        .list-group-item {
            border: none;
            font-style: normal;
            font-weight: 400;
            font-size: 15px;
            color: #A5A5A5;
        }

        .btn-cs-order {
           
            background: #FEB500;
           
    color: #FFF;
    text-align: center;
    font-size: 18px;
    font-family: Poppins;
    font-style: normal;
    font-weight: 300;
    margin-bottom: 40px;
        }

        .btn-cs-order:hover {
            background: #da9c00;
            color: white;
        }

        .value-list-group {
            font-style: normal;
            font-weight: 600;
            font-size: 18px;
            color: #595959;
        }

        .name-product-detail {
            font-style: normal;
            font-weight: 400;
            font-size: 14px;
            line-height: 150%;
            color: #595959;
        }

        .price-fish-detail {
            font-style: normal;
            font-weight: 700;
            font-size: 20px;
            letter-spacing: 0.005em;
            color: #FFA500;
        }

        .price-fish-cs-rp {
            font-style: normal;
            font-weight: 400;
            font-size: 20px;
            letter-spacing: 0.005em;
            color: #FFA500;
        }

        .name-fish-detail {
            font-style: normal;
            font-weight: 700;
            font-size: 32px;
            letter-spacing: 0.05em;
            color: #595959;
        }

        .header-order-step {
            font-size: 30px;
            font-weight: bold;
            background-color: #FEB500;
            color: white;
            padding: 10px;
            border-radius: 10px;
        }
    </style>
</head>

<body>
    <!-- navigasi -->
    <?php include './include/navbar.php'?>
    <!-- end navigasi -->
    <br />
    <br />
    <br />
    <br />
    <br />

    <!-- booking -->
    <section class="booking-page">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md-12 text-center">
                    <h1 class="header-order-step">Input Pemesanan</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 mb-3">
                    <?php
                     $getDataGambar = mysqli_query($conn, "SELECT * FROM service WHERE id = '$id'");
                     while ($dataService = mysqli_fetch_array($getDataGambar)) {
                    ?>
                   <div class="card border-0 card-service">
              <div class="card-body">
                <img src="./admin/assets/img/image-content/<?php echo $dataService['photo']?>" alt="">
                <h3><?php echo $dataService['judul']?></h3>
                <p><?php echo $dataService['subJudul']?></p>
              </div>
            </div>
                    <?php }?>
                </div>
                <div class="col-md-8 mb-3">
                  
                    <div class="group-product-detail">
                        <h5 class="name-product-detail">Data detail pemesan wajib diisi : </h5>
                        <form action="./controller/booking/add.php" method="POST">
                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    <label for="" class="mb-2">*Nama</label>
                                   
                                    <input type="text" class="form-control" id="nama" required name="nama_penyewa" autofocus
                                        placeholder="Nama">

                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="" class="mb-2">No Telpon</label>
                                    <input type="text" class="form-control" id="nophone" required name="no_hp_penyewa"
                                        placeholder="Phone">
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="" class="mb-2">Jenis Sepatu</label>
                                    <input type="text" class="form-control" id="nophone" required name="no_hp_penyewa"
                                        placeholder="Jenis Sepatu">
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="" class="mb-2">Warna Sepatu</label>
                                    <input type="text" class="form-control" id="nophone" required name="no_hp_penyewa"
                                        placeholder="Warna">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <a class="btn btn-cs-order" href="./index.php">Cancel</a>
                                    <a class="btn btn-primary float-end" href="./pemesananSelesai.php" type="submit">Continue</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- booking -->

    <!-- footer -->
    <footer>
          <div class="container">
            <div class="row">
              <div class="col-md-6">
                <p>Copyright 2023 </p>
              </div>
              <div class="col-md-6">
                <div class="icon float-end">
                  <div class="first-icon">
                    <i class="fa-brands  fa-whatsapp"></i>
                    <span>089721543217</span>
                  </div>
                  <div class="second-icon">
                    <i class="fa-brands fa-instagram"></i>
                    <span>089721543217</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </footer>
    <!-- end footer -->

    <!-- script bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
    <!-- script fontawesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>
</body>

</html>