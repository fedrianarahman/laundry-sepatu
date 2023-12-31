<?php
include './controller/conn.php';
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Laundry Sepatu</title>

  <!-- link bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous" />
  <!-- link fontawesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
  <!-- owl carousel -->
  <link rel="stylesheet" href="./assets/owl/owl.carousel.min.css">
  <!-- link css -->
  <link rel="stylesheet" href="./assets/css/style.css" />
  <style>
    form {
      display: flex;
      justify-content: center;
      align-items: center;
      text-align: center;
      /* height: 100vh; Menyesuaikan tinggi form dengan tinggi viewport */
    }

    .input-group {
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .form-input-tracking {
      height: 70px;
      width: 500px;
      background: #FF7F0A;
      position: relative;
    }

    .input-custom {
      border: 1px solid #D9D9D9;
      background: #FFF;
      width: 578px;
      height: 50px;
      padding-left: 15px;
    }

    .btn-shoes-progress {
      border: 1px solid #FF7F0A;
      background: #FF7F0A;
      width: 105px;
      height: 50px;
      flex-shrink: 0;
      color: white;
    }


    #about,
    #service,
    #contact,
    #check-shoes-progress {
      scroll-margin-top: 100px;
      /* Sesuaikan dengan ukuran tinggi navbar */
    }

    .check-shoes-progress-2 {
      background-image: url('./assets/img/bg-cek-pesanan.png');
      background-repeat: no-repeat;
      margin-bottom: 150px;
    }

   .owl-carousel .card .img-top {
      display: none;
      transition: opacity 0.5s ease;
      /* Ubah jenis transisi ke 'ease' */
    }

    .card {
      cursor: pointer;
    }

    .card:hover .img-top {
      display: block;
      opacity: 1;

    }

    .card:hover .img-back {
      display: none;
      opacity: 0;
    }
  </style>
  <script src="./assets/owl/jquery.min.js"></script>
  <script src="./assets/owl/owl.carousel.js"></script>
</head>

<body>
  <!-- hero -->
  <section class="hero">
    <?php include './include/navbar.php' ?>
    <br />
    <br />
    <br />
    <br />
    <br />
    <div class="first">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <h1>Layanan Premium Laundry dan Perawatan Sepatu</h1>
            <p>
              Layanan Premium Laundry dan Perawatan Sepatu kami dirancang
              untuk memberikan perawatan terbaik dan hasil yang memuaskan
              untuk sepatu Anda. Dengan menggunakan teknik dan produk terkini,
              kami menghadirkan solusi khusus untuk menjaga sepatu Anda tetap
              bersih, segar, dan tahan lama.
            </p>
            <a href="#check-shoes-progress" style="text-decoration: none;">
              <button class="btn-cek-pesanan">
                Cek Pesanan Saya <i class="fa-solid fa-arrow-right"></i>
              </button>
            </a>
          </div>
          <div class="col-md-6">
            <img class="img-first" src="./assets/img/shoes.png" alt="" />
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- end hero -->

  <?php include './include/panduan.php' ?>
  <!-- check shoes progress -->
  <section class="check-shoes-progress-2" id="check-shoes-progress">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 ">

          <form action="" class="" method="POST">
            <div class="input-group mb-3">
              <input type="text" placeholder="Masukkan Kode Pesanan" class="input-custom" name="kode_sepatu">
              <button class="btn-shoes-progress" type="submit" name="submit" id="button-addon2">Submit</button>
            </div>
          </form>

          <div class="time-line-wrapper">
            <div class="timeline p-4 block mb-4">
              <?php
              if (isset($_POST['submit'])) {
                $kode_spt = $_POST['kode_sepatu'];
                $getStatus = mysqli_query($conn, "SELECT status, IFNULL(created_at, updated_at) AS tanggal FROM progress_sepatu WHERE kode_sepatu = '$kode_spt'");

                if (mysqli_num_rows($getStatus) > 0) {
                  while ($r = mysqli_fetch_array($getStatus)) {
                    $tanggal = $r['tanggal'];
                    $hari = date('l', strtotime($tanggal));

                    echo '<div class="tl-item active">
                              <div class="tl-dot ';
                    if ($r['status'] == 'finish') {
                      echo 'tl-dot-finish';
                    } else {
                      echo 'tl-dot';
                    }
                    echo '"></div>
                              <div class="tl-content">
                                <div>';
                    if ($r['status'] == "finish") {
                      echo 'Sepatu Sudah Selesai';
                    } else {
                      echo $r['status'];
                    }
                    echo '</div>
                                <div class="tl-date text-muted mt-1">' . $hari . ', ' . $tanggal . '</div>
                              </div>
                          </div>';
                  }
                } else {
                  echo '<script>alert("Tidak Ada Pesanan")</script>';
                }
              }

              ?>
            </div>
          </div>




        </div>
      </div>
    </div>
    <!-- <div class="form-input-tracking">
                <h1>kldwwwwwwwwwwwwwwww</h1>
              </div> -->
    </div>

    </div>
    </div>
  </section>
  <!-- end shoes progress -->



  <!-- testimonial -->
  <div class="container">
  <section class="testimonial" id="testimonial">
    <h2>Testimonial</h2>
      <div class="home-demo">
        <div class="row">
          <div class="large-12 columns">
            <div class="owl-carousel">
              <?php
              $getData = mysqli_query($conn ,"SELECT * FROM testimonial");
              while ($dataTestimonial = mysqli_fetch_array($getData)) {
                
              ?>
              <div class="card border-0 card-customer-service">
                <img src="./admin/assets/img/testimonial/<?php echo $dataTestimonial['photo_before'] ?>" alt="" class="img-back">
                <img src="./admin/assets/img/testimonial/<?php echo $dataTestimonial['photo_after'] ?>" alt="" class="img-top">
                <div class="card-body">
                  <p><?php echo ucwords($dataTestimonial['merk_sepatu'])?></p>
                  <h3 style="color: #72A4A5;"><?php echo ucwords($dataTestimonial['jenis_layanan'])?></h3>
                </div>
              </div>
              <?php }?>
            </div>
           
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- end testimonial -->

  <!-- footer -->
  <?php include './include/footer.php' ?>
  <!-- end-footer -->
  <!-- bootstrap js -->

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  <!-- font awesome -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>
  <script src="./assets/js/script.js"></script>
  <!-- caoruswl -->
  <script>
    var owl = $('.owl-carousel');
    owl.owlCarousel({
      margin: 10,
      loop: false,
      responsive: {
        0: {
          items: 1
        },
        600: {
          items: 2
        },
        1000: {
          items: 3
        }
      }
    })
  </script>


  <!-- vendors -->
  <script src="./assets/owl/highlight.js"></script>
  <script src="./assets/owl/app.js"></script>
</body>

</html>