<?php ob_start(); ?>
  <section class="flex flex-col gap-18">
      <main class="flex flex-col gap-8">
        <div>
          <img src="../img/turkoise.jpg" alt="hero" class="w-full max-h-[25vh] relative" />
          <p class="bg-blue-100 p-4 rounded-b-md">Récapitulatif de votre réservation pour <?= $travel->getName() ?></p>
        </div>
        <table class="border-spacing-2 border-separate">
          <tbody>
            <tr>
              <th class="bg-yellow-200 p-4 rounded-md">Participant(s)</th>
              <td class="bg-yellow-200 w-1/3 p-4 rounded-md"><?= $reservation->getNbPersonne() ?></td>
              <th class="bg-green-200 p-4 rounded-md">Commande</th>
              <td class="bg-green-200 w-1/3 p-4 rounded-md"><?= $reservation->getReference() ?></td>
            </tr>
            <tr>
                <th class="bg-yellow-200 p-4 rounded-md">Semaine(s)</th>
                <td class="bg-yellow-200 w-1/3 p-4 rounded-md"><?= $reservation->getNbWeek() ?></td>
                <th class="bg-green-200 p-4 rounded-md">Total</th>
                <td class="bg-green-200 w-1/3 p-4 rounded-md"><?= $reservation->getTotal() ?>€</td>
              </tr>
          </tbody>
        </table>
        <p class="w-full text-end bg-blue-100 p-4 rounded-md">Bon séjour</p>
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
