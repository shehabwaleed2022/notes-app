<?php  view("partials/head.php") ?>

<body class="h-full">
  <div class="min-h-full">

    <?php  view("partials/nav.php") ?>
    <?php  view("partials/header.php") ?>

    <main class="section">
      <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <h1 class="section-header">
          Hello, Welcome<span> <?= $_SESSION['user']['username']?? 'Guest'?> </span>
        </h1>
        <h2 class="welcome-massege">Welcome to the <?= $heading ?> Page.</h2>
      </div>
    </main>
  </div>
</body>

</html>