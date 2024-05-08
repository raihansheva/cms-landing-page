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
</head>

<body>
    <div class="bungkus">
        <div class="container" id="container">
            <div class="form-container sign-in-container" >
                <div class="container-form">
                <form action="/masuklogin" method="POST">
					<!-- @csrf -->
                    <h1 class="titledaftar">Log In</h1>
                    <span>Company Profile</span>
                    <input class="inputfile" type="text" placeholder="Username" name="name" />
                    <input class="inputfile" type="password" placeholder="Password" name="password"/>
                    <button type="submit" value="Masuk">Login</button>
                </form>
                </div>
            </div>
            <!-- <div class="overlay-container">
                <div class="overlay">
                    <div class="overlay-panel overlay-right">
                       
                    </div>
                </div>
            </div> -->
        </div>
    </div>
    <script src="js/login.js"></script>
    <!-- font -->
    <script src="assets/fontawesome/js/all.js"></script>
    <script src="assets/fontawesome/js/fontawesome.js"></script>
	<!-- @include('sweetalert::alert') -->
</body>

</html>
