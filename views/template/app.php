<!DOCTYPE html>
<html lang="en">

<head>
  <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>book wise</title>
</head>

<body class="bg-gray-50 text-gray-950">
  <header class='p-4 border-b border-b-gray-200'>
    <nav class="flex flex-row items-center justify-between mx-auto max-w-5xl text-sm">
      <a href='/' class="text-[18px] font-bold uppercase">Book wise</a>

      <ul class="flex flex-row items-center justify-between gap-4">
        <li>
          <a href='/'>Explorar</a>
        </li>
        <li>
          <a href='/my-books'>Meus Livros</a>
        </li>
      </ul>

      <ul>
        <li>
          <?php if (isset($_SESSION['auth'])): ?>
            <div class="flex flex-row items-center gap-4">
              <div class='text-end'>
                <p>
                  Oi, <?= $_SESSION['auth']->name; ?>
                </p>
                <p class="text-gray-500 text-xs">
                  <?= $_SESSION['auth']->email; ?>
                </p>
              </div>

              <a href='/logout' class="border border-gray-300 text-gray-950  py-2 px-8 rounded font-medium">sair</a>
            </div>
          <?php else: ?>
            <a href='/login' class="bg-blue-700 text-blue-50 py-2 px-8 rounded font-medium">Fazer login</a>
          <?php endif; ?>
        </li>
      </ul>
    </nav>
  </header>

  <main class="px-4 mx-auto mt-8 max-w-5xl">
    <?php require "views/{$view}.view.php"; ?>
  </main>
</body>

</html>