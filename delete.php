<?php
    include "config/databaseconfig.php";
    $id = $_GET['id'];

    session_start();

    if (!isset($_SESSION['user_id'])) {
        header("Location: index.php");
        exit;
    }

    $userTable = "user_" . $_SESSION['user_id'];


    $sql = "delete from $userTable where id = '$id'";
    $query = mysqli_query($koneksi, $sql);
    if ($query) {
        header("Location: main.php");
        exit;
    } else {
        echo "<script>alert('failed');</script>";
        header("Location: main.php");
        exit;
    }
    
?>