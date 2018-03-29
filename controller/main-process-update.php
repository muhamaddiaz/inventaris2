<?php 
    session_start();
    require '../secret/dbsetting.php';
    $id_update = $_POST['id_update'];
    $nama_barang = $_POST['nama_barang'];
    $jumlah_barang = $_POST['jumlah_barang'];
    $tanggal_pembelian = $_POST['tanggal_pembelian'];
    $kondisi = $_POST['kondisi_barang'];
    $keterangan = $_POST['status_barang'];
    $conn = new mysqli($server, $dbuser, $keypass, $dbname);
    $sql = "UPDATE data_inventaris SET nama_barang='$nama_barang', 
            jumlah_barang='$jumlah_barang', tanggal_pembelian='$tanggal_pembelian',
            status_barang='$keterangan', kondisi_barang='$kondisi' WHERE
            id_inventaris=$id_update";
    if($conn->query($sql) == TRUE) {
        $_SESSION['alert'] = "<script>alert('Data berhasil di update')</script>";
        header("Location: ". "http://localhost/inventaris/view/main.php");
    } else {
        die($conn->error);
    }
    $conn->close();
?>