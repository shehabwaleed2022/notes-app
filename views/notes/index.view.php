<?php view("partials/head.php")?>

<body class="h-full">
  <div class="min-h-full">

    <?php view("partials/nav.php")?>
    <?php view("partials/header.php")?>

    <main>
      <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8 s">

        <?php foreach($notes as $note) :?>
          <a href="<?= MAIN_NAME ?>/note?id=<?= $note['id']?>" class="text-blue-500 hover:underline">
            <li><?= htmlspecialchars($note['body'])?></li>
          </a>
        <?php endforeach;?>
          
        <p class="mt-6">
          <a href="<?= MAIN_NAME ?>/notes/create" class="text-blue-500 hover:underline">Create Note</a>
        </p>
      </div>
    </main>
  </div>
</body>

</html>