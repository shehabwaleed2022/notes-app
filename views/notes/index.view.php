<?php require "views/partials/head.php"?>

<body class="h-full">
  <div class="min-h-full">

    <?php require "views/partials/nav.php"?>
    <?php require "views/partials/header.php"?>

    <main>
      <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">

        <?php foreach($notes as $note) :?>
          <a href="/my-app/note?id=<?= $note['id']?>" class="text-blue-500 hover:underline">
            <li><?= htmlspecialchars($note['body'])?></li>
          </a>
        <?php endforeach;?>
          
        <p class="mt-6">
          <a href="/my-app/notes/create" class="text-blue-500 hover:underline">Create Note</a>
        </p>
      </div>
    </main>
  </div>
</body>

</html>