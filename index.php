<?php
include './controller/conn.php';
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Laundry Sepatu</title>
    <!-- link css -->
    <link rel="stylesheet" href="./assets/css/style.css" />
    <!-- link bootstrap -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ"
      crossorigin="anonymous"
    />
    <!-- link fontawesome -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    />
  </head>
  <body>
    <!-- hero -->
    <section class="hero">
      <nav
        class="navbar navbar-expand-lg justify-content-between  shadow-sm bg-transparent  fixed-top mb-4"
      >
        <div class="container">
          <a class="navbar-brand" href="#">Logo</a>
          <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarNav"
            aria-controls="navbarNav"
            aria-expanded="false"
            aria-label="Toggle navigation"
          >
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
              <li class="nav-item">
                <a class="nav-link active" href="index.php">Beranda </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#about">About</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#service">Service</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#testimonial">Product</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#contact">Contact</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
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
            <a href="./pesanSepatu.php?id=<?php echo $dataService['id']?>" class="" style="text-decoration: none;">
            <div class="card border-0 card-service">
              <div class="card-body">
                <img src="./admin/assets/img/image-content/<?php echo $dataService['photo']?>" alt="">
                <h3><?php echo $dataService['judul']?></h3>
                <p><?php echo $dataService['subJudul']?></p>
              </div>
            </div>
            </a>
          </div>
          <?php }?>
        
        </div>
      </div>
    </section>
    <!-- end service -->

    <!-- check shoes progress -->
      <section class="check-shoes-progress">
        <div class="container">
          <div class="row">
            <!-- <form action="" class="">
              <div class="input-group mb-3">
                <input type="text" placeholder="Masukan Kode Pesanan" class="input-custom">
                <button class="btn-shoes-progress" type="button" id="button-addon2">Submit</button>
              </div>
            </form> -->
            <div class="form-check-tracking">
            <form action="" class="">
              <div class="input-group mb-3">
                <input type="text" placeholder="Masukan Kode Pesanan" class="input-custom">
                <button class="btn-shoes-progress" type="button" id="button-addon2">Submit</button>
              </div>
            </form>
            </div>
          </div>
          <div class="row">
            <div class="time-line-wrapper">
              <div class="timeline p-4 block mb-4">
                <div class="tl-item active">
                    <div class="tl-dot "></div>
                    <div class="tl-content">
                        <div class="">Sepatu Dalam Proses Pencucian</div>
                        <div class="tl-date text-muted mt-1">13 june 18</div>
                    </div>
                </div>
                <div class="tl-item active">
                    <div class="tl-dot "></div>
                    <div class="tl-content">
                        <div class="">Sepatu Dalam Proses Pengeringan</div>
                        <div class="tl-date text-muted mt-1">45 minutes ago</div>
                    </div>
                </div>
                <div class="tl-item active">
                    <div class="tl-dot "></div>
                    <div class="tl-content">
                        <div class="">Sepatu Dalam Proses Packing</div>
                        <div class="tl-date text-muted mt-1">1 day ago</div>
                    </div>
                </div>
                <div class="tl-item active">
                  <div class="tl-dot-finish"></div>
                  <div class="tl-content">
                      <div class="">Sepatu Selesai</div>
                      <div class="tl-date text-muted mt-1">1 day ago</div>
                  </div>
              </div>
            </div>
            </div>
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
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas quidem ipsum itaque exercitationem fugiat sunt officia, ipsa ullam voluptatem nihil. Harum voluptates id repudiandae alias fuga, illum pariatur cupiditate sed?</p>
            <div class="icon">
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
          <div class="col-md-6">
            <div class="card">
              <div class="card-body">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31708.71568668405!2d106.6085252682551!3d-6.573383645736278!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69d9ec9e7c1e2b%3A0x401576d14fed440!2sLeuwiliang%2C%20Kec.%20Leuwiliang%2C%20Kabupaten%20Bogor%2C%20Jawa%20Barat!5e0!3m2!1sid!2sid!4v1687663290204!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
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
                <p >Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore eligendi iste, eveniet consequuntur cumque recusandae nesciunt qui </p>
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
                <p >Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore eligendi iste, eveniet consequuntur cumque recusandae nesciunt qui </p>
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
                <p >Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore eligendi iste, eveniet consequuntur cumque recusandae nesciunt qui </p>
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
      <!-- end-footer -->
    <!-- bootstrap js -->
    
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
      crossorigin="anonymous"
    ></script>
    <!-- font awesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>
    <script src="./assets/js/script.js"></script>
  </body>
</html>
