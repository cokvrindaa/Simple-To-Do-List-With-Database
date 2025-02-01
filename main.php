<?php
// Sesi tertentu
  session_start();
  include "config/databaseconfig.php"; 

  if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit;
  }
  $userTable = "user_" . $_SESSION['user_id'];

?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Simple ToDoList - Halaman Utama</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script
      src="https://kit.fontawesome.com/1897315b86.js"
      crossorigin="anonymous"
    ></script>
  </head>

  <body class="p-5 pt-8 lg:max-w-[800px] lg:mx-auto lg:h-screen">
    <div class="flex justify-between">
      <h1 class="text-4xl font-bold mb-5">To Do List</h1>
      <a href="logout.php" class="logout">
        <button class="bg-orange-400 font-bold p-2 rounded-md">Log Out</button>
      </a>
    </div>
    <form action="add.php" method="post" class="mt-3 flex gap-3">
      <input
        type="text"
        name="isidata"
        class="w-9/12 rounded-md  bg-white px-3.5 py-2 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 mb-3 lg:w-11/12"
        placeholder="akuu inginn melakukann.."
      />
      <button type="submit" class="bg-green-400 p-2 rounded-md font-bold mb-3">
        Tambah
      </button>

    </form>

    <?php 
    include "config/databaseconfig.php"; 
    $sql = "SELECT * FROM $userTable";
    $query = mysqli_query($koneksi, $sql);
    if($query && mysqli_num_rows($query) > 0){
      foreach($query as $teksdata){
    ?>
    <div class="kontainercard">
      <div class="card h-14 w-full border-solid border-[0.1px] shadow-md border-gray-200 mb-4 flex justify-between pl-3 rounded-lg items-center gap-3">
        <div class="flex items-center gap-3">
          <form action="update_status.php" method="post" class="flex items-center gap-3">
            <input
              type="hidden"
              name="id"
              value="<?php echo $teksdata['id']; ?>"
            />
            <input
              type="checkbox"
              name="status"
              value="selesai"
              class="size-3 mt-[18px]"
              id="chckbox"
              <?php echo $teksdata['status'] === 'selesai' ? 'checked' : ''; ?>
              onchange="this.form.submit()" 
            />
          </form>
          <p
          id="text"
            class="
            <?php 
            if($teksdata['status'] === 'selesai'){
              echo "line-through p-0 text-2xl mt-[-5px] decoration-4 font-bold text-blue-500";
            }
            else{
              echo "font-bold text-transparent text-2xl bg-gradient-to-r from-blue-800 to bg-cyan-500 bg-clip-text pb-[5px]";
            }
            ?>
            "
          >

            <?php echo $teksdata['isi']; ?>

          </p>
        </div>
        <div class="flex gap-3 ">
          <a href="editInterface.php?id=<?php echo $teksdata['id']; ?>" class="hapus">
            <i class="fa-solid fa-pen-to-square text-orange-500"></i>
          </a>

          <a href="delete.php?id=<?php echo $teksdata['id'] ?>" class="hapus">
            <i class="fa-solid fa-trash mr-5 text-red-600"></i>
          </a>
        </div>
        </div>

    </div>
    <?php 
        }
      } else {
    ?>
    <div class="text-center mt-32 flex flex-col gap-5">
      <p class="text-3xl font-bold">tidak ada data</p>
      <i class="fa-regular fa-face-smile text-9xl"></i>
    </div>
    <?php 
      }
    ?>
    <p class="<?php if($query && mysqli_num_rows($query) == 0){echo "mt-10 text-center";} else { echo "text-center";}?>">by @cokvrindaa at github</p>
  </body>
</html>
