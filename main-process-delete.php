<?php 
    session_start();
    $server = "localhost";
    $username = "root";
    $password = "";
    $dbname = "inventaris";
    $target = $_POST['id_delete'];
    $conn = new mysqli($server, $username, $password, $dbname);
    $sql = "DELETE FROM data_inventaris WHERE id_inventaris=$target";
    if($conn->query($sql) == TRUE) {
        $_SESSION['alert'] = "<script>alert('Data berhasil dihapus!')</script>";
        header("Location: ". "http://localhost/inventaris/main.php");
    } else {
        die("Error has been occured: ". $conn->error);
    }
    $conn->close();
?>