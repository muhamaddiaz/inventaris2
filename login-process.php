<?php 
    session_start();
    $server = 'localhost';
    $dbuser = 'root';
    $keypass = '';
    $dbname = 'inventaris';

    $username = $_POST['username'];
    $password = $_POST['password'];

    $conn = new mysqli($server, $dbuser, $keypass, $dbname);
    $sqlcheck = "SELECT * FROM user WHERE username='$username' AND password='$password'";
    $result = $conn->query($sqlcheck);
    if($result->num_rows ==  0) {
        $_SESSION['alert'] = "<script>alert('Username atau password salah')</script>";
        header("Location: ". "http://localhost/inventaris/login.php");
    } else {
        $json = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $_SESSION['id_user'] = $json['id_user'];
        $_SESSION['alert'] = "<script>alert('" . "Welcome back ". $json['fullname'] ."')</script>";
        header("Location: ". "http://localhost/inventaris/main.php");
    }
?>