<?php
session_start();
include './controller/conn.php';
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

   <!-- about --> 
  <section class="about" id="about">
    <div class="container">
      <div class="row" >
        <div class="col-md-6">
          <div class="img-wrapper">
            <img class="img-first" src="./assets/img/shoes-2.png" alt="" />
          </div>
        </div>
        <div class="col-md-6">
          <div class="about-content">
            <h2 class="about-title" >Tentang Kami</h2>
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