<?php
    include "databaseconfig.php";
    $id = $_GET['id'];
    $sql = "delete from todolist.data where id = '$id'";
    $query = mysqli_query($koneksi, $sql);
    if ($query) {
        header("Location: index.php");
        exit;
    } else {
        echo "<script>alert('failed');</script>";
        header("Location: index.php");
        exit;
    }
    
?>