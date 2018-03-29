<?php 
    session_start(); 
    if(!isset($_SESSION['id_user'])) {
        $_SESSION['alert'] = "<script>alert('Anda harus masuk dulu!')</script>";
        header("Location: ". "http://localhost/inventaris/view/login.php");
    }   
    require '../secret/dbsetting.php';
    $conn = new mysqli($server, $dbuser, $keypass, $dbname);
    $id_user = $_SESSION['id_user'];
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
    <title>Main menu (<?php echo $user['username']?>)</title>
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
    <div class="navbar navbar-expand-md bg-danger fixed-top navbar-dark">
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
    <div class="container-fluid text-white ct-top">
        <div class="faded-main">
            <h1 class="display-3">Welcome back, <?php echo $user['username'] ?></h1>
            <p>Pencatatan setiap data inventaris yang masuk</p>
        </div>
    </div>
    <div class="container-fluid">
        <br>
        <div class="row">
            <div class="col-md-8">
                <?php
                    $user_id = $_SESSION['id_user'];
                    if($user['admin'] == 1) {
                        $sql = "SELECT * FROM data_inventaris ORDER BY created_at DESC";
                    } else {
                        $sql = "SELECT * FROM data_inventaris WHERE id_user=$user_id ORDER BY created_at DESC";
                    }
                    $result = $conn->query($sql);
                    if($result->num_rows > 0) {
                        echo "<table class='table table-bordered text-center'>";
                        echo "<tr class='thead-dark'>
                        <th>ID Inventaris</th>";
                        if($user['admin'] == 1) {
                            echo "<th>Nama inventor</th>";
                        }
                        echo "<th>Nama Barang</th>
                        <th>Tanggal Pembelian</th>
                        <th>Kondisi</th>
                        <th>Keterangan</th>
                        <th>Jumlah Barang</th>";
                        if($user['admin'] == 1) {
                            echo "<th colspan='2'>Aksi (hanya admin)</th>";
                        }
                        echo "<tr>";
                        while($row = $result->fetch_assoc()) {
                            echo "<tr>
                            <td>$row[id_inventaris]</td>";
                            if($user['admin'] == 1) {
                                $id_inventor = $row['id_user'];
                                $inventsql = "SELECT * FROM user WHERE id_user=$id_inventor";
                                $inventor = $conn->query($inventsql);
                                $result2 = mysqli_fetch_array($inventor, MYSQLI_ASSOC);
                                echo "<td>" . $result2['fullname'] . "</td>";
                            }
                            echo "<td>$row[nama_barang]</td>
                            <td>$row[tanggal_pembelian]</td>
                            <td>$row[kondisi_barang]</td>
                            <td>$row[status_barang]</td>
                            <td>$row[jumlah_barang]</td>";
                            if($user['admin'] == 1) {
                            echo 
                            "<td>". 
                                "<form method='post' action='../controller/main-process-delete.php' onsubmit='return delete_validate()'>
                                    <input type='hidden' name='id_delete' value=$row[id_inventaris] />
                                    <button type='submit' class='btn btn-danger'>Delete</button>
                                </form>" .   
                            "</td>";
                            echo 
                            "<td>". 
                                "<form method='post' action='update.php'>
                                    <input type='hidden' name='id_update' value=$row[id_inventaris] />
                                    <button type='submit' class='btn btn-info'>Update</button>
                                </form>" .   
                            "</td>";
                            }
                            "</tr>";
                        }
                        echo "</table>";
                    } else {
                        echo "<h1 class='text-center'>No Data</h1>";
                    }
                ?>
            </div>
            <div class="col-md-4">
                <h3 class="display-4">Did you know?</h3>
                <p>Dengan menggunakan web ini anda tidak perlu takut <br>
                kehilangan data inventaris anda karena buku catatan hilang<br>
                atau rusak anda hanya perlu mengklik tombol dibawah ini<br>
                anda sudah bisa menyimpan data dengan aman :)</p>
                <div class="btn-group">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createModal">
                        Rekam data inventaris
                    </button>
                </div>
                <div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header bg-primary text-white">
                                <h5 class="modal-title" id="createModalLabel">Rekam data inventaris</h5>
                                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="<?php echo htmlspecialchars('../controller/main-process-insert.php'); ?>" method="post" onsubmit='return validate4()'>
                                    <p id="e_spot2" class="text-danger"><p>
                                    <input id="nama_barang" class="form-control" type="text" name="nama_barang" placeholder="Nama Barang" />
                                    <p id="e_spot3" class="text-danger"><p>
                                    <input id="tanggal_pembelian" class="form-control" type="date" name="tanggal_pembelian" placeholder="Tanggal pembelian" />
                                    <p id="e_spot4" class="text-danger"><p>
                                    <input id="jumlah_barang" class="form-control" type="number" name="jumlah_barang" placeholder="Jumlah barang" />
                                    <br>
                                    <label for="status_barang">Kondisi: </label>
                                    <select name="status_barang" id="status_barang" class="form-control">
                                        <option value="Baru">Baru</option>
                                        <option value="Bekas">Bekas</option>
                                    </select>
                                    <br>
                                    <label for="kondisi_barang">Keterangan: </label>
                                    <select name="kondisi_barang" id="kondisi_barang" class="form-control">
                                        <option value="Baik">Baik</option>
                                        <option value="Cukup">Cukup</option>
                                        <option value="Kurang baik">Kurang baik</option>
                                    </select>
                                    <br>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                    <button type="submit" class="btn btn-primary">Kirim</button>
                                </form>
                            </div>
                        </div>
                    </div>
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