<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Simple To Do List With Database</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script
      src="https://kit.fontawesome.com/1897315b86.js"
      crossorigin="anonymous"
    ></script>
  </head>

  <body class="p-5 pt-8 lg:max-w-[800px] lg:mx-auto lg:h-screen">
    <h1 class="text-4xl font-bold mb-5">To Do List</h1>
    <form  method="post" class="mt-3 flex gap-4">
      <input
        type="text"
        name="isidata"
        class="w-9/12 rounded-md bg-white px-3.5 py-2 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 mb-5 lg:w-11/12"
        placeholder="akuu inginn melakukann.."
      />
      <button type="submit" class="bg-green-400 p-2 rounded-md font-bold mb-5">
        Tambah
      </button>
    </form>

    <?php 
    include "databaseconfig.php"; 
    $sql = "SELECT * FROM data";
    $query = mysqli_query($koneksi, $sql);
    if($query && mysqli_num_rows($query) > 0){
      foreach($query as $teksdata){
    ?>
    <div class="kontainercard">
    <div class="card h-14 w-full border-solid border-[0.1px] shadow-md border-gray-200 mb-4 flex justify-between pl-3 rounded-lg items-center gap-3">
    <form action="edit.php" method="post" class="flex w-full justify-between items-center gap-3">
    <input type="hidden" name="id" value="<?php echo $teksdata['id']; ?>">

    <input 
            type="text"  
            value="<?php echo $teksdata['isi']?>" 
            name="updata" 
            class="w-full rounded-md bg-white px-3.5 py-2 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 lg:w-11/12">
        <input 
            type="submit" 
            value="✔️" 
            class=" mr-3 ml-3  cursor-pointer">
    </form>
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

  </body>
</html>
