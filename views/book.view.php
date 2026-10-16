<?php
$soma_notas = array_reduce($avaliacoes, function ($carry, $avaliacao) {
  return ($carry ?? 0) + $avaliacao->nota;
}) ?? 0;

$soma_notas = round($soma_notas / 5);

$media_notas = str_repeat('⭐', $soma_notas)
  ?>

<div class="border border-gray-200 bg-white p-4 rounded">
  <a href="/book?id=<?= $book->id; ?>" class="text-xl font-bold hover:underline hover:text-blue-700 text-emerald-950">
    <?= $book->title; ?>
  </a>
  <p class="text-mist-500 italic">
    <?= $book->author; ?>
  </p>
  <div>
    <?= $media_notas ?> <span class="text-mist-500 italic">(<?= count($avaliacoes) ?> Avaliações)</span>
  </div>
  <p class="mt-4 text-sm">
    <?= $book->description; ?>
  </p>
</div>

<h2 class="mt-8">Avaliações</h2>

<div class="grid grid-cols-6 gap-4">
  <div class="col-span-4">
    <div class='mt-4 flex flex-col gap-2 '>
      <?php foreach ($avaliacoes as $avaliacao): ?>
        <div class="border border-gray-200 p-4 rounded bg-white">
          <p><?= $avaliacao->avaliacao ?></p>
          <?php
          $nota = str_repeat('⭐', $avaliacao->nota)
            ?>

          <p class="text-xs">
            <?= $nota ?>
          </p>


        </div>

      <?php endforeach; ?>
    </div>
  </div>

  <?php if (auth()): ?>
    <form method="post" action="/criar-avaliacao"
      class="col-span-2 flex flex-col gap-4 border border-gray-200 p-4 rounded">

      <?php if ($validacoes = flash()->get('validations')): ?>

        <div class="border-red-800 bg-red-900 text-red-400 px-4 py-1 rounded-md border-2 text-sm font-bold">

          <ul>

            <?php foreach ($validacoes as $validacao): ?>

              <li><?= $validacao ?></li>

            <?php endforeach; ?>

          </ul>

        </div>

      <?php endif; ?>

      <h2 class="font-bold">Me conte o que achou</h2>

      <div>
        <label for=" avaliacao">Avaliação</label>
        <textarea class="w-full border p-4 border-gray-200 rounded" placeholder="Me conte o que achou"
          name="avaliacao"></textarea>
      </div>
      <div>
        <label for="nota" class="block">Nota</label>
        <select class="border p-4 rounded border-gray-200 w-full" name="nota">
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
          <option value="5">5</option>
        </select>
      </div>

      <input name="book_id" type="hidden" value="<?= $book->id ?>" />

      <button class="w-full cursor-pointer bg-blue-700 text-blue-50 py-2 px-8 rounded font-medium" type="submit">
        Enviar
      </button>
    </form>
  <?php endif; ?>
</div>