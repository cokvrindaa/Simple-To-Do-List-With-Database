<?php
include "config/databaseconfig.php";
$teksdata = $_POST['isidata'];


session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit;
}

$userTable = "user_" . $_SESSION['user_id'];


if(trim($teksdata) == ""){
    echo "
    <script>
        alert('BELUMM DI ISI BUJANGGG!!!');
        location.href = 'main.php';
    </script>
    ";
}
else{
    $sql = "insert into $userTable values('', '$teksdata', '', '')";
    $query = mysqli_query($koneksi, $sql);

    if ($query){
        header("Location: main.php");
        exit;
    }
    else{
        echo "
            <script>
                alert('failed');
                location.href = 'main.php';
            </script>
        ";
    }
}


?>