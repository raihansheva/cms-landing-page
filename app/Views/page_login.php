<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/style-form-login.css">
    <!-- font -->
    <link rel="stylesheet" href="assets/fontawesome/css/fontawesome.css">
    <link rel="stylesheet" href="assets/fontawesome/css/all.css">
    <link rel="stylesheet" href="assets/poppins/font.css">
    <!-- <link rel="stylesheet" href="../assets/css/styles.min.css" />
<link href="assets/bootsrap/css/bootstrap.min.css" rel="stylesheet"> -->
</head>

<body>
    <div class="bungkus">
        <div class="container col-4" id="container">
            <div class="form-container sign-in-container" >
                <div class="container-form">
                <form action="/login" method="POST">
                    <?php if (session()->setFlashdata('error')) { ?>
                        <!-- <div class="alert alert-danger"> -->
                            <?php  echo session()->getFlashdata('error')  ?>
                        <!-- </div> -->
                    <?php } ?>
					<!-- @csrf -->
                    <h1 class="titledaftar">Log In</h1>
                    <span>Company Profile</span>
                    <input class="inputfile" value="" type="text" placeholder="Username" name="username" />
                    <input class="inputfile" type="password" placeholder="Password" name="password"/>
                    <button class="rounded" type="submit" name="login" value="login">Login</button>
                </form>
                </div>
            </div>
        </div>
    </div>
    <script src="js/login.js"></script>
    <!-- font -->
    <script src="assets/fontawesome/js/all.js"></script>
    <script src="assets/fontawesome/js/fontawesome.js"></script>
 <!-- <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script> -->

	<!-- @include('sweetalert::alert') -->
</body>

</html>
