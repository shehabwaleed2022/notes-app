<?php require "views/partials/head.php" ?>

<body class="h-full bg-gray-100">
  <div class="min-h-full flex flex-col">

    <?php require "views/partials/nav.php" ?>

    <main class="flex-grow">
      <div class="max-w-md mx-auto mt-32 bg-white p-8 rounded-lg shadow-lg">
        <h2 class="text-2xl font-bold mb-4 text-center">Sign Up</h2>

        <form action="/my-app/register" method="POST">
          <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2" for="name">Name</label>
            <input
              class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
              name="name" type="text" placeholder="John Doe">
            <? if (isset($errors['name'])): ?>
              <p class="text-red-500 text-xs mt-2">
                <?= $errors['name'] ?>
              </p>
            <? endif; ?>
          </div>

          <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2" for="email">Email</label>
            <input
              class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
              name="email" type="email+" placeholder="johndoe@example.com">
            <? if (isset($errors['email'])): ?>
              <p class="text-red-500 text-xs mt-2">
                <?= $errors['email'] ?>
              </p>
            <? endif; ?>
          </div>

          <div class="mb-6">
            <label class="block text-gray-700 font-bold mb-2" for="password">Password</label>
            <input
              class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
              name="password" type="password" placeholder="********">
            <? if (isset($errors['password'])): ?>
              <p class="text-red-500 text-xs mt-2">
                <?= $errors['password'] ?>
              </p>
            <? endif; ?>
          </div>

          <div class="flex items-center justify-between">
            <button type="submit"
              class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline w-full">
              Sign Up
            </button>
          </div>
        </form>
      </div>
    </main>

  </div>
</body>

</html>