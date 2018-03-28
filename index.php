<?php 
    session_start();
    if(isset($_SESSION['id_user'])) {
        header('Location: '. 'http://localhost/inventaris/main.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/assets.css" />
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/solid.css" integrity="sha384-v2Tw72dyUXeU3y4aM2Y0tBJQkGfplr39mxZqlTBDUZAb9BGoC40+rdFCG0m10lXk" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/fontawesome.css" integrity="sha384-q3jl8XQu1OpdLgGFvNRnPdj5VIlCvgsDQTQB6owSOHWlAurxul7f+JpUOVdAiJ5P" crossorigin="anonymous">
</head>
<body>
    <div class="navbar navbar-expand-md bg-danger fixed-top navbar-dark">
        <a class="navbar-brand" href="#">Inventaris Web</a>
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="./login.php">Login</a>
            </li>
        </ul>
    </div>
    <div class="container-fluid main-wp" style="padding: 0;">
        <div class="faded text-center">
            <div class="top-text text-white">
                <h2 class="display-3">Inventaris Web</h2>
                <p>Catat setiap data inventaris anda</p> 
            </div>
        </div>
    </div>
    <div class="container ov-top-ct bg-white">
        <div class="row">
            <div class="col-md-4 ov-top">
                <div class="card">
                    <img src="assets/new-file.svg" alt="new" class="card-img-top bg-primary" style="width: 100%; height: 180px; padding: 30px;">
                    <div class="card-body">
                        <p class="card-text">Catat</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 ov-top">
                <div class="card">
                    <img src="assets/note.svg" alt="new" class="card-img-top bg-primary" style="width: 100%; height: 180px; padding: 30px;">
                    <div class="card-body">
                        <p class="card-text">Tersimpan</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 ov-top">
                <div class="card">
                    <img src="assets/check-square.svg" alt="new" class="card-img-top bg-primary" style="width: 100%; height: 180px;  padding: 30px;">
                    <div class="card-body">
                        <p class="card-text">Aman</p>
                    </div>
                </div>
            </div>
        </div>
        <br><br><br>
        <div class="content">
            <div class="row">
                <div class="col-md-6">
                    <h2 class="display-4">Apa itu inventaris ?</h2>
                </div>
                <div class="col-md-6">
                    <p>Inventaris adalah kegiatan melaksanakan pencatatan data barang dan 
                    menyusun data-data barang bersangkutan kedalam suatu data inventaris 
                    secara tertentu dan menurut ketentuan yang berlaku.dengan melakukan 
                    inventaris anda bisa mengawasi dan mengurus barang secara efektif. 
                    proses inventaris adalah mencatat semua barang ke buku inventaris
                    </p>
                </div>
            </div>
        </div>
        <br><br>
        <div class="content-2">
            <div class="row">
                <div class="col-md-6">
                    <p>dengan berkembangnya teknologi masihkah anda mencatat inventaris dengan cara manual ?
                    .mencatat data inventaris dengan manual sangat membuang waktu dan tenaga sebaiknya 
                    anda menggunakan web.web memang keperluan yang lumrah untuk membantu pekerjaan 
                    apalagi pekerjaan yang berhubungan dengan data.jika anda saat ini belum mempunyai 
                    web untuk mendata seluruh data data 
                    </p>
                </div>
                <div class="col-md-6">
                    <h2 class="display-4">Jadi......</h2>
                </div>
            </div>
        </div>
        <br><br>
        <div class="content-3 bg-primary text-white text-center">
            <h3 class="display-4">Apa yang kamu tunggu ?</h3>
            <p>Permudah pencatatan data inventaris anda dengan web ini!</p>
            <a href="./signup.php" class="btn btn-danger">Daftar Sekarang!</a>
        </div>
    </div>
</body>
</html>