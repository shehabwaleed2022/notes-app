<?php require "views/partials/head.php" ?>

<body class="h-full">
  <div class="min-h-full">

    <?php require "views/partials/nav.php" ?>
    <?php require "views/partials/header.php" ?>

    <main>
      <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <h1>
          Hello, Welcome <?= $_SESSION['user']['username']?? 'Guest'?> .
           Welcome to the <?=$heading?> Page.
        </h1>
      </div>
    </main>
  </div>
</body>

</html>