<?php
include "databaseconfig.php";

$id = $_POST['id'];
$teksdata = $_POST['updata'];

$sql = "UPDATE todolist.data SET isi = '$teksdata' WHERE id = $id;";
$query = mysqli_query($koneksi, $sql);

if ($query) {
    header("Location: index.php");
    exit;
} else {
    echo "
        <script>
            alert('failed');
            location.href = 'index.php';
        </script>
    ";
}
?>
