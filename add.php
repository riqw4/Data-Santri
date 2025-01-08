<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama       = $_POST['nama'];
    $alamat     = $_POST['alamat'];
    $jkel       = $_POST['jkel']; // Ganti dari tanggal_lahir ke nama_wali
    $kelas      = $_POST['kelas'];

    if (isset($_POST['id'])) {
        $id = $_POST['id'];
        $query = "INSERT INTO data_santri (nama, alamat, jkel, kelas) VALUES ('$nama', '$alamat', '$jkel', '$kelas')";
    } 
    
    mysqli_query($connection, $query);
    header("Location: index.php");
}

$id = $_GET['id'] ?? null;
if ($id) {
    $query = "SELECT * FROM data_santri WHERE id='$id'";
    $result = mysqli_query($connection, $query);
    $santri = mysqli_fetch_assoc($result);
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="fontawesome/css/font-awesome.min.css">
    <!-- Logo Title -->
    <link rel="icon" href="logoSmall.png" type="image/x-icon">
    <title>Tambah Santri</title>
</head>
<body>    
    <h2>Tambah Santri</h2>
    <h3>Lengkapi data-data berikut dengan benar</h3>
    <div class="container-add">
        <form action="add.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $santri['id'] ?? ''; ?>">
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" name="nama" placeholder="Masukkan nama" value="<?php echo $santri['nama'] ?? ''; ?>" required>
            </div>
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <input type="text" name="alamat" placeholder="Masukkan Alamat" value="<?php echo $santri['alamat'] ?? ''; ?>" required>
            </div>
            <div class="form-group">
                <label for="jkel">Jenis Kelamin</label>
                <div class="form-radio">
                    <label>
                        <input type="radio" name="jkel" placeholder="Jenis Kelamin" value="Laki-laki" required> Laki-laki
                    </label>
                    <label>
                        <input type="radio" name="jkel" value="Perempuan"> Perempuan
                    </label>
                </div>  
            </div>
            <div class="form-group">
                <label for="kelas">Kelas</label>
                <select name="kelas" required>
                <option value="" placeholder="Pilih Kelas">Pilih Kelas</option>
                    <option value="1 Pagi">1 Pagi</option>
                    <option value="1 Malam">1 Malam</option>
                    <option value="2 Pagi">2 Pagi</option>
                    <option value="2 Malam">2 Malam</option>
                    <option value="3 Pagi">3 Pagi</option>
                    <option value="3 Malam">3 Malam</option>
                </select>
            </div>
            <div class="btn-add">
            <button class="button" type="submit"><i class="fa fa-user-plus fa-fw" style="margin-right: 5px;"></i><?php echo $id ? 'Update' : 'Tambah'; ?></button>
            <button class="button" type="button" onClick="window.location.href='index.php'"><i class="fa fa-reply" style="margin-right: 5px;"></i>Batal</button>
            </div>
        </form>
    </div>
</body>
</html>