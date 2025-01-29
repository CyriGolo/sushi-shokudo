<?php ob_start(); ?>
  <section class="flex flex-col gap-18">
      <main class="flex flex-col gap-8">
        <div>
          <img src="../img/turkoise.jpg" alt="hero" class="w-full max-h-[25vh] relative" />
          <p>Récapitulatif de votre réservation pour <?= $travel->getName() ?></p>
        </div>
        <table class="table-auto">
          <tbody>
            <tr>
              <th>Participant(s)</th>
              <td><?= $reservation->getNbPersonne() ?></td>
              <th>Commande</th>
              <td><?= $reservation->getReference() ?></td>
            </tr>
            <tr>
                <th>Semaine(s)</th>
                <td><?= $reservation->getNbWeek() ?></td>
                <th>Total</th>
                <td><?= $reservation->getTotal() ?>€</td>
              </tr>
          </tbody>
        </table>
        <p class="w-full text-end">Bon séjour</p>
      </main>
      <ul class="flex justify-between gap-8">
          <?php foreach ($travels as $currTravel) : ?>
              <?php if ($travel->getId() === $currTravel->getId()) continue; ?>
                    <li class="max-w-86 max-xl:max-w-full border-2 border-gray-300 rounded-md p-1 basis-full">
                        <a href="/travel/<?= $currTravel->getId(); ?>">
                          <img class="w-full h-20" src="../img/<?= $currTravel->getImage(); ?>" alt="<?= $currTravel->getName(); ?>" />
                        </a>
                    </li>
         <?php endforeach; ?>
      </ul>
  </section>
<?php $content = ob_get_clean(); ?>
<?php require VIEWS . 'layout.php'; ?>
