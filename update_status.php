<?php
include "databaseconfig.php";

$id = intval($_POST['id']); 
// mengambil nilai status dari form
$status = $_POST['status'];

// jika nilainya benar, maka status akan menjadi selesa, jika tidak jadi belum
if ( $status === 'selesai') {
    $status = 'selesai';
} else {
    $status = 'belum';
}

$sql = "UPDATE data SET status = '$status' WHERE id = $id";

if (mysqli_query($koneksi, $sql)) {
    header("Location: index.php");
    exit();
} else {
    echo "Error updating status: " . mysqli_error($koneksi);
}

?>
