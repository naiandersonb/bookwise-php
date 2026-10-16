<form class=" flex flex-row gap-2 items-center border-b border-gray-200 p-2">
  <input name="search" class="flex-1 focus:outline-none  p-2" placeholder="Buscar livros..." />
  <button class="cursor-pointer h-10 w-10 rounded flex items-center justify-center hover:bg-gray-200" type="submit">
    🔍
  </button>
</form>

<section class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mt-8">
  <?php foreach ($books as $book) {
    require 'partials/_livro.php';
  } ?>
</section>