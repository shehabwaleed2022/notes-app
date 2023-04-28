<?php require "views/partials/head.php"?>

<body class="h-full">
  <div class="min-h-full">

    <?php require "views/partials/nav.php"?>
    <?php require "views/partials/header.php"?>

    <main>
      <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">

        <a href="/notes-app/notes" class = "text-blue-500 underline">Go Back..</a>
      
        <li class="mt-5"><?=htmlspecialchars($note['body'])?></li>


        <footer class="mt-6">
          <a href="/notes-app/note/edit?id=<?=$note['id']?>" class="bg-gray-500 hover:bg-gray-500 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Edit</a>
        </footer>


      </div>
    </main>
  </div>
</body>

</html>