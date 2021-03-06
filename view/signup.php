<?php 
    session_start(); 
    if(isset($_SESSION['id_user'])) {
        header('Location: '. 'http://localhost/inventaris/view/main.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Signup</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/assets.css" />
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="../assets/assets.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/solid.css" integrity="sha384-v2Tw72dyUXeU3y4aM2Y0tBJQkGfplr39mxZqlTBDUZAb9BGoC40+rdFCG0m10lXk" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/fontawesome.css" integrity="sha384-q3jl8XQu1OpdLgGFvNRnPdj5VIlCvgsDQTQB6owSOHWlAurxul7f+JpUOVdAiJ5P" crossorigin="anonymous">
</head>
<body>
    <div class="back-ct">
        <div class="faded-signup">
            <div class="text-login">
                <h1 class="display-1 text-white">Daftar Akun &nbsp;</h1>
            </div>
            <div class="login">
                <div class="login-box">
                    <form action="../controller/signup-process.php" method="post" onsubmit="return validate()">
                        <div class="form-group">
                            <p id="e_spot2" class="text-danger"></p>
                            <label for="fullname">Nama Lengkap: </label>
                            <input id="fullname" type="text" class="form-control" name="fullname" />
                        </div>
                        <div class="form-group">
                            <p id="e_spot3" class="text-danger"></p>
                            <label for="username">Nama Pengguna: </label>
                            <input id="username" type="text" class="form-control" name="username" />
                        </div>
                        <div class="form-group">
                            <p id="e_spot4" class="text-danger"></p>
                            <label for="address">Alamat: </label>
                            <input id="address" type="text" class="form-control" name="address" />
                        </div>
                        <div class="form-group">
                            <p id="e_spot5" class="text-danger"></p>
                            <label for="phone">No Telp: </label>
                            <input id="phone" type="number" class="form-control" name="phone" />
                        </div>
                        <div class="form-group">
                            <p id="e_spot6" class="text-danger"></p>
                            <label for="password">Kata Sandi:  </label>
                            <input id="password" type="password" class="form-control" name="password" />
                        </div>
                        <button class="btn btn-danger btn-block" type="submit">Daftar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php 
        if(isset($_SESSION['alert'])) {
            echo $_SESSION['alert'];
            unset($_SESSION['alert']);
        }
    ?>
</body>
</html>