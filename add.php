<?php
include "databaseconfig.php";
$teksdata = $_POST['isidata'];

$sql = "insert into todolist.data values('', '$teksdata', '', '')";

$query = mysqli_query($koneksi, $sql);

if ($query){
    header("Location: index.php");
    exit;
}
else{
    echo "
        <script>
            alert('failed');
            location.href = 'index.php';
        </script>
    ";
}
?>