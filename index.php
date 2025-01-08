<?php
include 'koneksi.php';

$query = "SELECT * FROM data_santri";
$sql   = mysqli_query($connection,$query);
$no    = 0;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="fontawesome/css/font-awesome.min.css">
    <!-- Logo Title -->
    <link rel="icon" href="logoSmall.png" type="image/x-icon">
    <!-- DataTables -->
    <link href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css" rel="stylesheet"> 
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
    <title>Data Santri</title>
</head>

<body>
    <nav>
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
    </nav>

    <h1>Data Santri</h1>
    
    <a class="btn-tambah" href="add.php"><i class="fa fa-user-plus fa-fw" style="margin-right: 5px;"></i>Tambah Santri</a>
        <div class="form-container">
            <form id="searchForm">
                <div class="form-group">
                    <input type="text" id="search" placeholder="Masukkan Nama Santri">
                    <button type="submit">Cari</button>
                </div>
            </form>
        </div>

        <div class="table-container">
            <table class="table" id="dataTable">
                <thead class="thead">
                    <tr>
                        <th><center>NO.</center></th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Jenis Kelamin</th>
                        <th>Kelas</th>
                        <th class="btn-aksi">
                            <center>Aksi</center>
                        </th>
                    </tr>
                </thead>
                <tbody class="tbody">
                    <?php
                        while ($result = mysqli_fetch_assoc($sql)) {
                    ?>                
                    <tr>
                        <td><center>
                            <?php echo ++$no; ?>
                        </center></td>
                        <td>
                            <?php echo $result ['nama']; ?></td>
                        <td class="teks-pendek">
                            <?php echo $result ['alamat']; ?></td>
                        <td>
                            <?php echo $result ['jkel']; ?></td>
                        <td>
                            <?php echo $result ['kelas']; ?></td>
                        <td class="btn-aksi">
                            <div class="btn-container">                            
                            <a class="btn-edit" href="edit.php?id=<?php echo $result['id']; ?>"><i class="fa fa-pencil-square-o fa-fw" style="margin-right: 5px;"></i>Edit</a>
                            <a class="btn-hapus" href='delete.php?id=<?php echo $result['id']; ?>'><i class="fa fa-trash fa-fw" style="margin-right: 5px;"></i>Hapus</a>
                            </div>
                        </td>
                    </tr>
                    <?php
                        }
                    ?>
                </tbody>
            </table>
            <div id="noDataMessage" style="display: none; text-align: center; color: red;">Data tidak ditemukan</div>
        </div>

    <div class="footer">
        <p>&copy 2025 Website Data Santri Oleh Kelompok 5</p>
        <p>Muh. Alfani Khasan - Riqi Jumaedi - Liya Mafrudloh</p>
        <div class="icon">
            <a href=""><i class="fa fa-facebook-square sosmed" aria-hidden="true"></i></a>
            <a href=""><i class="fa fa-instagram sosmed" aria-hidden="true"></i></a>
            <a href=""><i class="fa fa-linkedin-square sosmed" aria-hidden="true"></i></a>
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

    // Fungsi pencarian
    document.getElementById('search').addEventListener('keyup', function() {
        let filter = this.value.toLowerCase();
        let rows = document.querySelectorAll('#dataTable tbody tr');

        rows.forEach(row => {
            let cells = row.getElementsByTagName('td');
            let found = false;

            for (let i = 0; i < cells.length; i++) {
                if (cells[i].innerText.toLowerCase().includes(filter)) {
                    found = true;
                    break;
                }
            }

            row.style.display = found ? '' : 'none';
        });
    });
    

    new DataTable('#dataTable'); // Inisialisasi DataTable
    </script>

</body>

</html>