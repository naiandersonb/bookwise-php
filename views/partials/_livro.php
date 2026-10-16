<div class="border border-gray-200 bg-white p-4 rounded">
  <div class="flex flex-row items-center gap-4">
    <?php if ($book->cover): ?>
      <img class="object-cover w-25 h-25 rounded" src="<?= $book->cover ?>" alt="capa do livro: <?= $book_ > $title ?>" />
    <?php endif; ?>

    <div>
      <a href="/book?id=<?= $book->id; ?>"
        class="text-xl font-bold hover:underline hover:text-blue-700 text-emerald-950">
        <?= $book->title; ?>
      </a>
      <p class="text-mist-500 italic">
        <?= $book->author; ?>
      </p>
      <div>
        <?= str_repeat('⭐', $book->nota_avaliacao ?? 0) ?> <span
          class="text-mist-500 italic">(<?= $book->total_avaliacoes ?>
          Avaliações)</span>
      </div>
    </div>
  </div>

  <p class="mt-4 text-sm">
    <?= $book->description; ?>
  </p>

</div>