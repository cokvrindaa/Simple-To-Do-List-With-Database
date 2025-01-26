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





$id = $_POST['id'];
$teksdata = $_POST['updata'];

$sql = "UPDATE $userTable SET isi = '$teksdata' WHERE id = $id;";
$query = mysqli_query($koneksi, $sql);

if ($query) {
    header("Location: main.php");
    exit;
} else {
    echo "
        <script>
            alert('failed');
            location.href = 'main.php';
        </script>
    ";
}
?>
