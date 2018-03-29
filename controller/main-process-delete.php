<?php 
    session_start();
    require '../secret/dbsetting.php';
    $target = $_POST['id_delete'];
    $conn = new mysqli($server, $dbuser, $keypass, $dbname);
    $sql = "DELETE FROM data_inventaris WHERE id_inventaris=$target";
    if($conn->query($sql) == TRUE) {
        $_SESSION['alert'] = "<script>alert('Data berhasil dihapus!')</script>";
        header("Location: ". "http://localhost/inventaris/view/main.php");
    } else {
        die("Error has been occured: ". $conn->error);
    }
    $conn->close();
?>