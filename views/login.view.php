<?php
?>

<div class="w-full min-h-[50vh] gap-4 flex items-center justify-center">
  <div class="w-full max-w-125">
    <h1 class="text-center tex-black font-bold mb-2 text-2xl">Fazer login</h1>
    <form class="rounded w-full flex flex-col gap-2 items-center border border-gray-200 p-4" method="post">
      <input name="email" class="w-full focus:outline-none border-b border-b-gray-200 p-2" placeholder="E-mail"
        required />
      <input name="password" class="w-full focus:outline-none border-b border-b-gray-200 p-2" placeholder="senha"
        type="'password" required />

      <button class="w-full cursor-pointer bg-blue-700 text-blue-50 py-2 px-8 rounded font-medium" type="submit">
        entrar
      </button>
    </form>
  </div>

  <div class="w-full max-w-125">
    <h1 class="text-center tex-black font-bold mb-2 text-2xl">Registrar</h1>
    <form class="rounded w-full flex flex-col gap-2 items-center border border-gray-200 p-4" method="post"
      action="/register">

      <!-- <div class="rounded bg-emerald-100 w-full p-4 text-center text-emerald-900">
        <?= $msg ?>
      </div> -->

      <input class="w-full focus:outline-none border-b border-b-gray-200 p-2" placeholder="Nome" name="name" />
      <input class="w-full focus:outline-none border-b border-b-gray-200 p-2" placeholder="E-mail" type="email"
        name="email" />
      <input class="w-full focus:outline-none border-b border-b-gray-200 p-2" placeholder="Confirme seu e-mail"
        type="email" name="confirm_email" />
      <input class="w-full focus:outline-none border-b border-b-gray-200 p-2" placeholder="senha" type="password"
        name="password" />

      <?php if ($validations = flash()->get('validations')): ?>
        <div class="rounded bg-red-100 w-full p-4 text-red-900 font-medium text-sm">
          <ul>
            <?php foreach ($validations as $validation): ?>
              <li>
                <span class="mr-2"></span>
                <?= $validation ?>
              </li>
            <?php endforeach; ?>
          </ul>
        </div>
      <?php endif; ?>

      <div class="w-full flex flex-row items-center gap-4">
        <button class="w-full cursor-pointer border border-gray-200 text-black py-2 px-8 rounded font-medium"
          type="reset">
          Cancelar
        </button>
        <button class="w-full cursor-pointer bg-blue-700 text-blue-50 py-2 px-8 rounded font-medium" type="submit">
          entrar
        </button>
      </div>
    </form>
  </div>
</div>