<?php require base_path("views/partials/head.php")?>

<body class="h-full">
  <div class="min-h-full">

    <?php require base_path("views/partials/nav.php")?>
    <?php require base_path("views/partials/header.php")?>

    <main>
      <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">

  <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 max-w-2xl mx-auto" method="POST" >
  <div class="mb-4">
    <label class="block text-gray-700 text-sm font-bold mb-2" for="body">Note Content</label>
      <textarea id="body" name="body" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" rows="8" placeholder="Enter your note here..."><?=isset($_POST['body']) ? $_POST['body'] : ''?>
</textarea>

    <? if(isset($errors['body'])) : ?>
      <p class = "text-red-500 text-xs mt-2"><?= $errors['body'] ?></p>
    <? endif;?>    
  </div>
  <div class="flex items-center justify-between">
    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
      Save
    </button>
  </div>
</form>


      </div>
    </main>
  </div>
</body>

</html>