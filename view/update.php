<?php 
    session_start();
    require '../secret/dbsetting.php';
    $id_update = $_POST['id_update'];
    $id_user = $_SESSION['id_user'];
    $conn = new mysqli($server, $dbuser, $keypass, $dbname);
    $sql = "SELECT * FROM data_inventaris WHERE id_inventaris=$id_update";
    $result = $conn->query($sql);
    $inventaris = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $sqluser = "SELECT * FROM user WHERE id_user=$id_user";
    $result = $conn->query($sqluser);
    $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update data</title>
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
    <div class="navbar navbar-expand-md bg-danger navbar-dark">
        <a class="navbar-brand" href="#">Inventaris Web</a>
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="main.php"><?php echo $user['fullname'] ?></a>
            </li>
            <?php 
                if($user['admin'] == 1) {
                    echo 
                        "<li class='nav-item'>
                            <a class='nav-link' href='#'>Admin mode</a>
                            </li>
                        ";
                } 
            ?>
            <li class="nav-item">
                <a class="nav-link" href="../controller/logout-process.php">Logout</a>
            </li>
        </ul>
    </div>
    <div class="jumbotron bg-info text-white">
        <div class="container-fluid">
            <h2 class="display-2">Update Data</h2>
        </div>
    </div>
    <div class="container">
        <form action="<?php echo htmlspecialchars('../controller/main-process-update.php'); ?>" method="post" onsubmit='return validate4()'>
            <input type='hidden' name='id_update' value=<?php echo $id_update ?> />
            <p id="e_spot2" class="text-danger"><p>
            <input id="nama_barang" class="form-control" type="text" name="nama_barang" placeholder="Nama Barang" value="<?php echo $inventaris['nama_barang'] ?>" />
            <p id="e_spot3" class="text-danger"><p>
            <input id="tanggal_pembelian" class="form-control" type="date" name="tanggal_pembelian" placeholder="Tanggal pembelian" value="<?php echo $inventaris['tanggal_pembelian'] ?>" />
            <p id="e_spot4" class="text-danger"><p>
            <input id="jumlah_barang" class="form-control" type="number" name="jumlah_barang" placeholder="Jumlah barang" value="<?php echo $inventaris['jumlah_barang'] ?>"/>
            <br>
            <label for="status_barang">Kondisi: </label>
            <select name="status_barang" id="status_barang" class="form-control">
                <option value="Baru">Baru</option>
                <option value="Bekas">Bekas</option>
            </select>
            <!--<input id="kondisi" class="form-control" type="number" name="jumlah_barang" placeholder="Jumlah Barang" />-->
            <br>
            <label for="kondisi_barang">Keterangan: </label>
            <select name="kondisi_barang" id="kondisi_barang" class="form-control">
                <option value="Baik">Baik</option>
                <option value="Cukup">Cukup</option>
                <option value="Kurang baik">Kurang baik</option>
            </select>
            <!--<input id="keterangan" class="form-control" type="number" name="jumlah_barang" placeholder="Jumlah Barang" />-->
            <br>
            <button type="submit" class="btn btn-info">Update</button>
        </form>
    </div>
</body>
</html>