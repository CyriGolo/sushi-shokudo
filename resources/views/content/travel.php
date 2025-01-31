<?php ob_start(); ?>

    <section class="flex flex-col gap-12">
        <img src="../img/turkoise.jpg" alt="hero" class="w-full max-h-[25vh] relative" />
        <ul class="h-full flex flex-wrap justify-between gap-2 gap-y-10 max-xl:flex-col items-center">
            <?php if (empty($travels)) : ?>
                <li class="border-3 border-cyan-500 rounded-md w-full text-center">
                    <h2 class="text-xl">Aucun voyage trouvé</h2>
                    <p>Il n'y a pas de voyage correspondant à votre recherche.</p>
                </li>
            <?php endif; ?>
           <?php foreach ($travels as $travel) : ?>
              <li class="max-w-86 max-xl:max-w-full border-3 border-cyan-500 rounded-md">
                  <img class="w-full h-34" src="../img/<?= $travel->getImage(); ?>" alt="<?= $travel->getName(); ?>" />
                  <div class="flex flex-col gap-4 p-4">
                    <h2 class="text-xl"><?= $travel->getName(); ?></h2>
                    <p><?= $travel->getDescription(); ?></p>
                    <a href="/travel/<?= $travel->getId(); ?>" class="w-full p-2 border-cyan-500 border-2 rounded-md cursor-pointer text-center hover:bg-cyan-500 hover:text-white">Réserver maintenant !</a>
                  </div>
              </li>
           <?php endforeach; ?>
        </ul>
    </section>

<?php $content = ob_get_clean(); ?>
<?php require VIEWS . 'layout.php'; ?>
