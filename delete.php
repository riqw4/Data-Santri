<?php
// session_start();
// if (!isset($_SESSION['username'])) {
//     header("Location: index.php");
//     exit();
// }

include 'koneksi.php'; // Menghubungkan ke database

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Query untuk menghapus data santri berdasarkan ID
    $query = "DELETE FROM data_santri WHERE id='$id'";
    
    if (mysqli_query($connection, $query)) {
        // Jika berhasil dihapus, redirect ke halaman utama
        header("Location: index.php");
        exit();
    } else {
        // Jika gagal, tampilkan pesan error
        echo "Error: " . mysqli_error($connection);
    }
}
?>