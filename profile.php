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

        .picture-container {
            position: relative;
            cursor: pointer;
            text-align: center;
        }

        .picture {
            width: 106px;
            height: 106px;
            background-color: #999999;
            border: 4px solid #CCCCCC;
            color: #FFFFFF;
            border-radius: 50%;
            margin: 0px auto;
            overflow: hidden;
            transition: all 0.2s;
            -webkit-transition: all 0.2s;
        }

        .picture:hover {
            border-color: #2ca8ff;
        }

        .content.ct-wizard-green .picture:hover {
            border-color: #05ae0e;
        }

        .content.ct-wizard-blue .picture:hover {
            border-color: #3472f7;
        }

        .content.ct-wizard-orange .picture:hover {
            border-color: #ff9500;
        }

        .content.ct-wizard-red .picture:hover {
            border-color: #ff3b30;
        }

        .picture input[type="file"] {
            cursor: pointer;
            display: block;
            height: 100%;
            left: 0;
            opacity: 0 !important;
            position: absolute;
            top: 0;
            width: 100%;
        }

        .pict-text {
            font-size: small;
            color: #999999;
            /* background: red; */
        }

        .picture-src {
            width: 100%;
            object-fit: fill;

        }

        /*Profile Pic End*/
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

    <div class="container">

        <section class="profile">
            <form action="./controller/user/updateProfile.php" method="POST" enctype="multipart/form-data">
                <?php
                $idUser = $_SESSION['user_id'];
                $getDataUser = mysqli_query($conn, "SELECT * FROM user WHERE id = '$idUser' ");
                while ($dataUser = mysqli_fetch_array($getDataUser)) {

                ?>
                    <div class="row">
                        <div class="col-md-3 mb-4">
                            <div class="card border-0 shadow-sm">
                                <div class="card-body">
                                    <div class="picture-container">
                                        <div class="picture">
                                            <img src="./assets/img/img-profile/<?php echo $dataUser['photo'] ?>" class="picture-src " id="blah" title="">
                                            <input type="file" id="wizard-picture" class="" onchange="readURL(this);" name="photo">
                                        </div>
                                        <h6 class="mt-2 pict-text">Choose Picture</h6>

                                    </div>
                                    <!-- <img src="./assets/img/img-profile/1.jpg" class="img-thumbnail mx-auto d-block mb-4 rounded-circle" width="114px" alt=""> -->
                                    <ul>
                                        <li class="profile-link active"><a href="./profile.php">My Profile</a></li>
                                        <li class="profile-link"><a href="order_history.php">Order History</a></li>
                                        <li class="profile-link"><a href="pesananSaya.php">My Order</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-9">
                            
                            <?php
                        if (isset($_SESSION['status-info'])) {
                            echo '
                            <div class="alert alert-success  alert-dismissible fade show" role="alert">
                                <strong>Success!</strong>'.$_SESSION['status-info'].'
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>';
                            unset($_SESSION['status-info']);
                        }
                        if (isset($_SESSION['status-fail'])) {
                            echo '<div class="alert alert-danger  alert-dismissible fade show" role="alert">
                            <strong>Success!</strong>'.$_SESSION['status-fail'].'
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
                            unset($_SESSION['status-fail']);
                        }
                        ?>
                            <div class="card border-0 shadow-sm">
                                <div class="card-body">

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="mb-2">
                                                <label for="exampleFormControlInput1" class="form-label">Nama</label>
                                                <input type="text" class="form-control" id="exampleFormControlInput1" value="<?php echo $dataUser['nama'] ?>" name="nama">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-2">
                                                <label for="exampleFormControlInput1" class="form-label">Email</label>
                                                <input type="email" class="form-control" id="exampleFormControlInput1" value="<?php echo $dataUser['email'] ?>" required name="email">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-2">
                                                <label for="exampleFormControlInput1" class="form-label">No Hp</label>
                                                <input type="text" class="form-control" id="exampleFormControlInput1" value="<?php echo $dataUser['no_hp'] ?>" name="no_hp">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-2">
                                                <label for="exampleFormControlInput1" class="form-label">ALamat</label>
                                                <input type="text" class="form-control" id="exampleFormControlInput1" value="<?php echo $dataUser['alamat'] ?>" name="alamat">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-2">
                                                <label for="exampleFormControlInput1" class="form-label">username</label>
                                                <input type="text" class="form-control" id="exampleFormControlInput1" value="<?php echo $dataUser['username'] ?>" name="username">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-2">
                                                <label for="exampleFormControlInput1" class="form-label">Password</label>
                                                <input type="password" class="form-control" id="exampleFormControlInput1" value="<?php echo $dataUser['password'] ?>" name="password">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <p style="font-size: 12px; font-weight:500; color: #999999;">Joined at : <?php echo $dataUser['created_at'] ?></p>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 bank mt-4">
                                            <button class="btn btn-cs-order" style="float: right;" type="submit">Update</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </form>
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
    <!-- <script src="./assets/js/script2.js"></script> -->
    <script src="assets/js/jquery-3.5.1.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#blah')
                        .attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
</body>

</html>