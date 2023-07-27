<?php
include './controller/conn.php';



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

    .whats-app {
      position: fixed;
      width: 50px;
      height: 50px;
      bottom: 40px;
      background-color: #25d366;
      color: #FFF;
      border-radius: 50px;
      text-align: center;
      font-size: 30px;
      box-shadow: 3px 4px 3px #999;
      right: 15px;
      z-index: 100;
    }

    .my-float {
      margin-top: 10px;
    }
  </style>
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
            <button class="btn-cek-pesanan">
              Cek Pesanan Saya <i class="fa-solid fa-arrow-right"></i>
            </button>
          </div>
          <div class="col-md-6">
            <img class="img-first" src="./assets/img/shoes.png" alt="" />
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- end hero -->

  <!-- whatsapp icon -->
  <a class="whats-app" href="https://api.whatsapp.com/send?phone=085864931764" target="_blank">
    <i class="fa-brands  fa-whatsapp my-float"></i>
  </a>
  <!-- whatsapp icon -->

  <!-- about -->
  <section class="about" id="about">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="img-wrapper">
            <img class="img-first" src="./assets/img/shoes-2.png" alt="" />
          </div>
        </div>
        <div class="col-md-6">
          <div class="about-content">
            <h2 class="about-title">About</h2>
            <p>
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe
              aperiam est eaque quia impedit fuga ad repellendus totam
              officia, reiciendis iusto modi incidunt vero ipsam nobis
              deleniti consequatur dicta mollitia?
            </p>
            <p>
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe
              aperiam est eaque quia impedit fuga ad repellendus totam
              officia, reiciendis iusto modi incidunt vero ipsam nobis
              deleniti consequatur dicta mollitia?
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- end about -->

  <!-- service -->
  <section class="service" id="service">
    <h2>Service</h2>
    <div class="container">
      <div class="row">
        <?php
        $query = mysqli_query($conn, "SELECT * FROM service ");
        while ($dataService = mysqli_fetch_array($query)) {

        ?>
          <div class="col-md-4">
            <a href="./pesanSepatu.php?id=<?php echo $dataService['id'] ?>" class="" style="text-decoration: none;">
              <div class="card border-0 card-service">
                <div class="card-body">
                  <img src="./admin/assets/img/image-content/<?php echo $dataService['photo'] ?>" alt="">
                  <h3><?php echo $dataService['judul'] ?></h3>
                  <p><?php echo $dataService['subJudul'] ?></p>
                </div>
              </div>
            </a>
          </div>
        <?php } ?>

      </div>
    </div>
  </section>
  <!-- end service -->

  <!-- check shoes progress -->
  <section class="check-shoes-progress">
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
                    echo '<div class="tl-item active">
                    <div class="tl-dot"></div>
                    <div class="tl-content">
                      <div class="">' . $r['status'] . '</div>
                      <div class="tl-date text-muted mt-1">' . $r['tanggal'] . '</div>
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

  <!-- contact -->
  <section class="contact" id="contact">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <h2>Contact</h2>
          <p>adalah halaman kontak kami yang memungkinkan pelanggan, mitra, dan pengunjung situs untuk menghubungi kami dengan pertanyaan, permintaan informasi, atau memberikan umpan balik. Kami senang mendengar dari Anda dan berkomitmen untuk memberikan layanan pelanggan terbaik.</p>
          <div class="icon">
            <div class="first-icon">
              <a  href="https://api.whatsapp.com/send?phone=085864931764" target="_blank" style="text-decoration: none;">
              <i class="fa-brands  fa-whatsapp"></i>
              <span>089721543217</span>
              </a>
            </div>
            <div class="second-icon">
             <a href="https://www.instagram.com/_shoeslab/" target="_blank" style="text-decoration: none;"> <i class="fa-brands fa-instagram"></i>
              <span>@_shoeslab</span></a>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="card">
            <div class="card-body">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3961.042357073929!2d107.620019!3d-6.885529999999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e70bca5c7575%3A0xec360a76f4310d0b!2sShoeslab!5e0!3m2!1sen!2sid!4v1690320208388!5m2!1sen!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- end contact -->

  <!-- testimonial -->
  <section class="testimonial" id="testimonial">
    <h2>Testimonial</h2>
    <div class="container">
      <div class="row">


        <div class="col-md-4">

          <div class="card border-0 card-customer-service">
            <div class="card-cutomer-service-header">
              <div class="img-customer">
                <img src="./assets/img/user.png" alt="">
              </div>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore eligendi iste, eveniet consequuntur cumque recusandae nesciunt qui </p>
            </div>
            <div class="card-customer-body">
              <h5>Raden</h5>
              <div class="icon">
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-regular fa-star"></i>
                <i class="fa-regular fa-star"></i>
                <i class="fa-regular fa-star"></i>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card border-0 card-customer-service">
            <div class="card-cutomer-service-header">
              <div class="img-customer">
                <img src="./assets/img/user.png" alt="">
              </div>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore eligendi iste, eveniet consequuntur cumque recusandae nesciunt qui </p>
            </div>
            <div class="card-customer-body">
              <h5>Raden</h5>
              <div class="icon">
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-regular fa-star"></i>
                <i class="fa-regular fa-star"></i>
                <i class="fa-regular fa-star"></i>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card border-0 card-customer-service">
            <div class="card-cutomer-service-header">
              <div class="img-customer">
                <img src="./assets/img/user.png" alt="">
              </div>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore eligendi iste, eveniet consequuntur cumque recusandae nesciunt qui </p>
            </div>
            <div class="card-customer-body">
              <h5>Raden</h5>
              <div class="icon">
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-regular fa-star"></i>
                <i class="fa-regular fa-star"></i>
                <i class="fa-regular fa-star"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- end testimonial -->

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
            <a  href="https://api.whatsapp.com/send?phone=085864931764" target="_blank" style="text-decoration: none;">
              <i class="fa-brands  fa-whatsapp"></i>
              <span>089721543217</span>
              </a>
            </div>
            <div class="second-icon">
            <a href="https://www.instagram.com/_shoeslab/" target="_blank" style="text-decoration: none;"> <i class="fa-brands fa-instagram"></i>
              <span>@_shoeslab</span></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <!-- end-footer -->
  <!-- bootstrap js -->

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  <!-- font awesome -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>
  <script src="./assets/js/script.js"></script>
</body>

</html>