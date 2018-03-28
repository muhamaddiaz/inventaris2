<?php 
    session_start();
    $server = "localhost";
    $username = "root";
    $password = "";
    $dbname = "inventaris";
    $nama_barang = $_POST['nama_barang'];
    $jumlah_barang = $_POST['jumlah_barang'];
    $tanggal_pembelian = $_POST['tanggal_pembelian'];
    $kondisi = $_POST['kondisi_barang'];
    $keterangan = $_POST['status_barang'];
    $id_user = $_SESSION['id_user'];
    $conn = new mysqli($server, $username, $password, $dbname);
    if($conn->connect_error) {
        die("Connection failed: ". $conn->connect_error);
    }
    $sql = "INSERT INTO data_inventaris
    (id_user, nama_barang, tanggal_pembelian, status_barang, kondisi_barang, jumlah_barang) 
    VALUES($id_user, '$nama_barang', '$tanggal_pembelian', '$keterangan', '$kondisi', $jumlah_barang)";
    if($conn->query($sql) == TRUE) {
        $_SESSION['alert'] = "<script>alert('Data berhasil direkam')</script>";
        header('Location: '. 'http://localhost/inventaris/main.php');
    } else {
        die('Error has been occured!'. $conn->error);
    }
    $conn->close();
?>