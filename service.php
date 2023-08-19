<?php
session_start();
include './controller/conn.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>shoeslab|Pesan Sepatu</title>
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

    <?php include './include/panduan.php'  ?>
    <!-- service -->
  <section class="service mt-4" id="service">
    <h2>Service</h2>
    <div class="container">
      <div class="row">
        <?php
        $query = mysqli_query($conn, "SELECT * FROM service ");
        while ($dataService = mysqli_fetch_array($query)) {

        ?>
          <div class="col-md-4">
            <a href="./pesanSepatu.php?id=<?php echo $dataService['id'] ?>&layanan_harga=<?php echo $dataService['harga'] ?>" class="" style="text-decoration: none;">
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