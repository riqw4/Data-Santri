<?php
include 'koneksi.php'; // Menghubungkan ke database

$id = $_GET['id'] ?? null; // Mengambil ID dari URL
if (!$id) {
    header("Location: index.php"); // Redirect jika ID tidak ada
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $jkel = $_POST['jkel'];
    $kelas = $_POST['kelas'];

    // Query untuk mengupdate data santri
    $query = "UPDATE data_santri SET nama='$nama', alamat='$alamat', jkel='$jkel', kelas='$kelas' WHERE id='$id'";

    if (mysqli_query($connection, $query)) {
        header("Location: index.php"); // Redirect ke halaman utama setelah berhasil
        exit();
    } else {
        echo "Error: " . mysqli_error($connection);
    }
}

// Mengambil data santri untuk ditampilkan di form
$query = "SELECT * FROM data_santri WHERE id='$id'";
$result = mysqli_query($connection, $query);
$santri = mysqli_fetch_assoc($result);
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
    <title>Edit Santri</title>
</head>
<body>
    <!-- <nav>
        <ul class="sidebar">
            <li onClick=hideSidebar()><a href=""><svg xmlns="http://www.w3.org/2000/svg" height="24px"
                        viewBox="0 -960 960 960" width="24px" fill="#5f6368">
                        <path d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z" />
                    </svg></a></li>
            <li><a href="">Beranda</a></li>
            <li><a href="">Tentang</a></li>
            <li><a href="">Kontak</a></li>
            <li><a href="">Profil</a></li>
        </ul>
        <ul>
            <li class=""><a href="#"><img class="logo" src="logo.png" alt="logo">Ponpes Asma` Chusna</a></li>
            <li class="hideOnMobile"><a href="#">Beranda</a></li>
            <li class="hideOnMobile"><a href="#">Tentang</a></li>
            <li class="hideOnMobile"><a href="#">Kontak</a></li>
            <li class="hideOnMobile"><a href="#">Profil</a></li>
            <li class="menu-button" onClick=showSidebar()><a href="#"><svg xmlns="http://www.w3.org/2000/svg"
                        height="24px" viewBox="0 -960 960 960" width="24px" fill="#5f6368">
                        <path d="M120-240v-80h720v80H120Zm0-200v-80h720v80H120Zm0-200v-80h720v80H120Z" />
                    </svg></a></li>
        </ul>
    </nav> -->

<h1>Edit Santri</h1>
<h3>Perbarui data santri dengan tepat</h3>
    <div class="container-add">
        <div class="container-form">
            <form action="edit.php?id=<?php echo $santri['id']; ?>" method="POST">
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" name="nama" placeholder="Nama" value="<?php echo $santri['nama']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <input type="text" name="alamat" placeholder="Alamat" value="<?php echo $santri['alamat']; ?>">
                </div>
                <div class="form-group">
                    <label for="jkel">Jenis Kelamin</label>
                    <label>
                        <input type="radio" name="jkel" value="Laki-laki" required <?php echo (isset($santri['jkel']) && $santri['jkel'] == 'Laki-laki') ? 'checked' : ''; ?>> Laki-laki
                    </label>
                    <label>
                        <input type="radio" name="jkel" value="Perempuan" required <?php echo (isset($santri['jkel']) && $santri['jkel'] == 'Perempuan') ? 'checked' : ''; ?>> Perempuan
                    </label>
                </div>
                <div class="form-group">
                    <label for="kelas">Kelas</label>
                    <select name="kelas" required>
                        <option value="" disabled <?php echo empty($santri['kelas']) ? 'selected' : ''; ?>>Pilih Kelas</option>
                        <option value="1 Pagi" <?php echo (isset($santri['kelas']) && $santri['kelas'] == '1 Pagi') ? 'selected' : ''; ?>>1 Pagi</option>
                        <option value="1 Malam" <?php echo (isset($santri['kelas']) && $santri['kelas'] == '1 Malam') ? 'selected' : ''; ?>>1 Malam</option>
                        <option value="2 Pagi" <?php echo (isset($santri['kelas']) && $santri['kelas'] == '2 Pagi') ? 'selected' : ''; ?>>2 Pagi</option>
                        <option value="2 Malam" <?php echo (isset($santri['kelas']) && $santri['kelas'] == '2 Malam') ? 'selected' : ''; ?>>2 Malam</option>
                        <option value="3 Pagi" <?php echo (isset($santri['kelas']) && $santri['kelas'] == '3 Pagi') ? 'selected' : ''; ?>>3 Pagi</option>
                        <option value="3 Malam" <?php echo (isset($santri['kelas']) && $santri['kelas'] == '3 Malam') ? 'selected' : ''; ?>>3 Malam</option>
                        <option value="4 Pagi" <?php echo (isset($santri['kelas']) && $santri['kelas'] == '4 Pagi') ? 'selected' : ''; ?>>4 Pagi</option>
                        <option value="4 Malam" <?php echo (isset($santri['kelas']) && $santri['kelas'] == '4 Malam') ? 'selected' : ''; ?>>4 Malam</option>
                    </select>
                </div>
                <div class="btn-add">
                    <button class="button" type="submit"><i class="fa fa-pencil-square-o fa-fw" style="margin-right: 5px;"></i>Simpan</button>
                    <button class="button" type="button" onClick="window.location.href='index.php'"><i class="fa fa-reply fa-fw" style="margin-right: 5px;"></i>Batal</button>
                </div>            
            </form>
        </div>
    </div>

    <script>
    function showSidebar() {
        const sidebar = document.querySelector('.sidebar')
        sidebar.style.display = 'flex'
    }

    function hideSidebar() {
        const sidebar = document.querySelector('.sidebar')
        sidebar.style.display = 'none'
    }
    </script>
</body>
</html>