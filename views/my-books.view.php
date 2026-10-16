<div class="grid grid-cols-6 gap-4">
  <div class="col-span-4">
    <h1 class="font-bold">Meu livros</h1>

    <section class="flex flex-col gap-4">
      <?php foreach ($my_books as $book) {
        require 'partials/_livro.php';
      } ?>
    </section>
  </div>

  <form method="post" action="/criar-livro"
    class="col-span-2 flex flex-col gap-4 border border-gray-200 p-4 rounded bg-white" enctype="multipart/form-data">

    <h2 class="font-bold">Adicionar livro</h2>

    <?php if ($validacoes = flash()->get('validations')): ?>

      <div class="border-red-800 bg-red-900 text-red-400 px-4 py-1 rounded-md border-2 text-sm font-bold">

        <ul>

          <?php foreach ($validacoes as $validacao): ?>

            <li>
              <?= $validacao ?>
            </li>

          <?php endforeach; ?>

        </ul>

      </div>

    <?php endif; ?>

    <div>
      <label for="cover">Capa do livro</label>
      <input class="w-full border p-2 border-gray-200 rounded" placeholder="ex: Carrie" type="file" name="cover" />
    </div>


    <div>
      <label for="title">Título</label>
      <input class="w-full border p-2 border-gray-200 rounded" placeholder="ex: Carrie" name="title" />
    </div>

    <div>
      <label for="author">Autor</label>
      <input class="w-full border p-2 border-gray-200 rounded" placeholder="ex: Stephen King" name="author" />
    </div>

    <div>
      <label for="description">Descrição</label>
      <textarea class="w-full border p-2 border-gray-200 rounded" name="description"></textarea>
    </div>

    <div>
      <label for="pages">Número de páginas</label>
      <input type='number' class="w-full border p-2 border-gray-200 rounded" name="pages" />
    </div>

    <div>
      <div>
        <label for="released_at">Data de lançamento</label>
        <select class="border p-2 rounded border-gray-200 w-full" name="released_at">
          <?php foreach (range(1800, date('Y')) as $ano): ?>
            <option value="<?= $ano ?>"><?= $ano ?></option>
          <?php endforeach; ?>
        </select>
      </div>
    </div>

    <button class="w-full cursor-pointer bg-blue-700 text-blue-50 py-2 px-8 rounded font-medium" type="submit">
      Enviar
    </button>
  </form>
</div>