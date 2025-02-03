<?php ob_start(); ?>

<section class="flex flex-col gap-12">
    <ul class="h-full flex flex-wrap justify-between gap-2 gap-y-10 max-xl:flex-col items-center">
        <?php if (empty($orders)) : ?>
            <li class="border-3 border-cyan-500 rounded-md w-full text-center">
                <h2 class="text-xl">Aucune commande trouvée</h2>
                <p>Vous n'avez pas encore passé de commande.</p>
            </li>
        <?php endif; ?>
        <?php foreach ($orders as $order) : ?>
            <li class="max-w-86 max-xl:max-w-full border-3 border-cyan-500 rounded-md">
                <img class="w-full h-34" src="../img/<?= $order['image']; ?>" alt="<?= $order['name']; ?>" />
                <div class="flex flex-col gap-4 p-4">
                    <h2 class="text-xl"><?= $order['name']; ?></h2>
                    <p><?= $order['description']; ?></p>
                    <p>Prix: <?= $order['price']; ?>€</p>
                    <p>Référence de commande: <?= $order['reference']; ?></p>
                    <p>Nombre de personnes: <?= $order['nb_personne']; ?></p>
                    <p>Nombre de semaines: <?= $order['nb_week']; ?></p>
                    <p>Total: <?= $order['total']; ?>€</p>
                </div>
            </li>
        <?php endforeach; ?>
    </ul>
</section>

<?php $content = ob_get_clean(); ?>
<?php require VIEWS . 'layout.php'; ?>