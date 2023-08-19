<?php
session_start();
include './controller/conn.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>shoeslab|Kontak</title>
    <!-- link bootstrap css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous" />
    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <!-- link css -->
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="./assets/css/style2.css" />
   
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
    <!-- footer -->
        <?php include './include/footer.php'?>
    <!-- end footer -->

    <!-- script bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <!-- script fontawesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>
    <script src="./assets/js/script2.js"></script>
</body>

</html>