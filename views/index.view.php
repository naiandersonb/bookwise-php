<form class=" flex flex-row gap-2 items-center border-b border-gray-200 p-2">
    <input class="flex-1 focus:outline-none  p-2" placeholder="Buscar livros..." />
    <button class="cursor-pointer h-10 w-10 rounded flex items-center justify-center hover:bg-mist-900" type="submit">
        🔍
    </button>
</form>

<section class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mt-8">
    <?php foreach ($books as $book): ?>
        <div class="border border-gray-200 bg-white p-4 rounded">
            <a href="/book?id=<?= $book['id'] ?>"
                class="text-xl font-bold hover:underline hover:text-blue-700 text-emerald-950">
                <?= $book["title"] ?>
            </a>
            <p class="text-sm my-2 text-mist-500 italic">
                <?= $book["author"] ?>
            </p>
            <div>
                ⭐⭐⭐⭐⭐ <span class="text-mist-500 text-sm italic">(3 Avaliações)</span>
            </div>
            <p class="mt-4 text-sm">
                <?= $book["description"] ?>
            </p>
        </div>
    <?php endforeach; ?>
</section>