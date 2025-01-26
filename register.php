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
        echo "Berhasil terdaftar";
    } else {
        echo "Error: " . $koneksi->error;
    }
}
?>
<form method="POST">
    <input type="text" name="username" placeholder="Username" required>
    <input type="password" name="password" placeholder="Password" required>
    <button type="submit">Register</button>
</form>