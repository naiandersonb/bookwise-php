<div class="border border-gray-200 bg-white p-4 rounded">
    <a href="/book?id=<?= $book['id'] ?>"
        class="text-xl font-bold hover:underline hover:text-blue-700 text-emerald-950">
        <?= $book["title"] ?>
    </a>
    <p class="text-mist-500 italic">
        <?= $book["author"]; ?>
    </p>
    <div>
        ⭐⭐⭐⭐⭐ <span class="text-mist-500 italic">(3 Avaliações)</span>
    </div>
    <p class="mt-4 text-sm">
        <?= $book["description"]; ?>
    </p>
</div>