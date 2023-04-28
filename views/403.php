<?php require "views/partials/head.php"?>
<?php $heading = 'Error'?>
<body class="h-full">
  <div class="min-h-full">

    <?php require "views/partials/nav.php"?>
    <?php require "views/partials/header.php"?>

    <main>
      <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <h1 class="mb-6 text-2xl font-bold">
          You are not authorized to view this page.
        </h1>
        <a href="/my-app/" class="text-blue-500 !important underline text-2xl font-bold ">Go To home</a>
      </div>
    </main>
  </div>
</body>

</html>