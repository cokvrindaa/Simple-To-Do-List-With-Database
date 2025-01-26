<?php
include "config/databaseconfig.php";

// Sesi tertentu
session_start();
include "config/databaseconfig.php"; 

if (!isset($_SESSION['user_id'])) {
  header("Location: index.php");
  exit;
}
$userTable = "user_" . $_SESSION['user_id'];



$id = intval($_POST['id']); 
// mengambil nilai status dari form
$status = $_POST['status'];

// jika nilainya benar, maka status akan menjadi selesa, jika tidak jadi belum
if ( $status === 'selesai') {
    $status = 'selesai';
} else {
    $status = 'belum';
}

$sql = "UPDATE $userTable SET status = '$status' WHERE id = $id";

if (mysqli_query($koneksi, $sql)) {
    header("Location: main.php");
    exit();
} else {
    echo "Error updating status: " . mysqli_error($koneksi);
}

?>
