<?php
    $koneksi =  mysqli_connect('localhost', 'root', '', 'todolist');
    if ($koneksi){
        echo "
        <script>
            console.log('koneksi berhasil');
        </script>
        ";
    }
    else{
        echo "
        <script>
            console.log('koneksi tidak berhasil');
        </script>
        ";
    }
?>