<?php
require 'config/databaseconfig.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    // Enkripsi Password
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    // Insert user
    $sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
    if ($koneksi->query($sql)) {
        // Create user-specific table
        $tableName = "user_" . $koneksi->insert_id;
        $createTable = "CREATE TABLE $tableName (
            `id` INT(100) NOT NULL AUTO_INCREMENT,
            `isi` VARCHAR(20) NOT NULL,
            `status` VARCHAR(20) NOT NULL,
            `tanggal` VARCHAR(20) NOT NULL,
            PRIMARY KEY (`id`)
        )";
        
        $koneksi->query($createTable);
        echo "
        <script>
            alert('Berhasil Terdaftarrr!!!');
        </script>
        ";
    } else {    
        echo "
        <script>
            alert('EROR!, ini bisa terjadi diantara nama user sudah terdaftar, ataupun server eror!');
        </script>
        ";

    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple ToDoList - Daftar</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
            <form method="POST" class="flex flex-col     ">
                <label for="username" class="mb-2 font-semibold">Username</label>
                <input type="text" name="username" placeholder="ketikan username muu.." required class="rounded-md p-2 shadow-sm bg-white px-3.5 py-2 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-blue-600 mb-3 lg:w-full">
                <label for="password" class="mb-2 font-semibold">Password</label>
                <input type="password" name="password" placeholder="ketikan password muu.." required class="rounded-md p-2 shadow-sm bg-white px-3.5 py-2 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-blue-600 mb-3 lg:w-full">
                <button type="submit" class="c bg-blue-600 text-white font-semibold p-1 mt-5 rounded-md">Daftar</button>
                <p class="text-center mt-5">Udah kedaftarr?, gass <a href="index.php" class="text-blue-600 font-semibold">login</a></p>

            </form>
        </div>

    </div>
    <p class="mt-[-30px] text-center">by @cokvrindaa at github</p>

</body>
</html>


