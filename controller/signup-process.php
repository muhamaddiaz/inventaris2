<?php 
    session_start();
    require '../secret/dbsetting.php';

    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];

    $conn = new mysqli($server, $dbuser, $keypass, $dbname);
    if($conn->connect_error) {
        die('Error: '. $conn->connect_error);
    }

    $sql = "INSERT INTO user(fullname, username, address, phone_number, password)
                VALUES ('$fullname', '$username', '$address', '$phone', '$password')";
    $sqlcheck = "SELECT * FROM user WHERE username='$username'";
    $result = $conn->query($sqlcheck);
    if($result->num_rows == 0) {
        if($conn->query($sql) == TRUE) {
            $json = mysqli_fetch_array($result, MYSQLI_ASSOC);
            $_SESSION['id_user'] = $json['id_user'];
            $_SESSION['alert'] = "<script>alert('User berhasil terdaftar')</script>";
            header("Location: ". "http://localhost/inventaris/view/main.php");
        }
    } else {
        $_SESSION['alert'] = "<script>alert('User sudah terdaftar')</script>";
        header("Location: ". "http://localhost/inventaris/view/signup.php");
    }
?>