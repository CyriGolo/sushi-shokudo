<?php ob_start(); ?>

    <section class="flex flex-col gap-12">
        <img src="../img/turkoise.jpg" alt="hero" class="w-full max-h-[25vh] relative" />
        <section class="flex gap-6">
            <article class="w-1/2 max-xl:max-w-full border-3 border-cyan-500 rounded-md flex flex-col justify-between">
                <img class="w-full h-34" src="../img/<?= $travel->getImage(); ?>" alt="<?= $travel->getName(); ?>" />
                <h2 class="text-xl p-4"><?= $travel->getName(); ?></h2>
                <p class="p-4 bg-cyan-100">1 semaine / personne : <?= $travel->getPrice(); ?>€</p>
            </article>
            <?php if(isset($_SESSION["reservation"])) { ?>
                <form method="post" action="/confirmation" class="w-full flex flex-col border-3 border-cyan-500 rounded-md">
                    <h3 class="bg-cyan-100 p-4">Je complète mes information de payement</h3>
                    <div class="h-full p-4 flex flex-col gap-4 justify-between">
                        <input type="text" id="titulaire" name="titulaire" placeholder="Titulaire du compte" class="w-full p-1 border-3 border-gray-300 rounded-sm" required/>
                        <span class="error"><?php echo error("titulaire"); ?></span>
                        <div class="flex gap-6">
                            <div class="flex flex-col gap-2 w-full">
                              <input type="text" id="card-number" name="card-number" minlength="16" maxlength="16" autocomplete="cc-number" placeholder="Numéro de carte" class="w-full p-1 border-3 border-gray-300 rounded-sm" required/>
                              <span class="error"><?php echo error("card-number"); ?></span>
                            </div>
                            <div class="flex flex-col gap-2 w-full">
                              <input type="text" id="crypto" name="crypto" minlength="3" maxlength="3" autocomplete="cc-csc" placeholder="Cryptograme" class="w-full p-1 border-3 border-gray-300 rounded-sm" required/>
                              <span class="error"><?php echo error("crypto"); ?></span>
                            </div>
                        </div>
                        <div class="flex gap-6">
                            <div class="flex flex-col gap-2 w-full">
                              <input type="text" id="facturation" name="facturation" autocomplete="street-address" placeholder="Adresse de facturation" class="w-full p-1 border-3 border-gray-300 rounded-sm" required/>
                              <span class="error"><?php echo error("facturation"); ?></span>
                            </div>
                            <div class="flex flex-col gap-2 w-full">
                              <input type="tel" id="phone" name="phone" placeholder="Téléphone" autocomplete="tel" class="w-full p-1 border-3 border-gray-300 rounded-sm" required/>
                              <span class="error"><?php echo error("phone"); ?></span>
                            </div>
                        </div>
                        <span class="flex flex-row-reverse gap-2 justify-end">
                            <label for="condition">J'accepte les conditions générales de vente</label>
                            <input type="checkbox" id="condition" name="condition" required />
                        </span>
                        <span class="error"><?php echo error("condition"); ?></span>
                        <input type="submit" class="w-full p-2 border-cyan-500 border-2 rounded-md cursor-pointer text-center bg-cyan-500 text-white hover:text-black hover:bg-white" value="Confirmer ma réservation" />
                    </div>
                </form>
            <?php } else { ?>
                <form method="post" action="/travel/<?= $travel->getId(); ?>" class="w-full flex flex-col border-3 border-cyan-500 rounded-md">
                    <h3 class="bg-cyan-100 p-4">Je complète mes informations de réservation</h3>
                    <div class="h-full p-4 flex flex-col gap-4 justify-between">
                        <input type="text" id="email" name="email" placeholder="Email de confirmation" class="w-full p-1 border-3 border-gray-300 rounded-sm" required/>
                        <span class="error"><?php echo error("email"); ?></span>
                        <div class="flex gap-6">
                            <input type="hidden" name="id" id="id" value="<?= $travel->getId(); ?>" />
                            <input type="number" id="week" name="week" min="1" placeholder="Je pars combien de semaine ?" class="w-full p-1 border-3 border-gray-300 rounded-sm" required/>
                            <span class="error"><?php echo error("week"); ?></span>
                            <input type="number" id="count-person" name="count-person" min="1" placeholder="Nombre de vacanciers" class="w-full p-1 border-3 border-gray-300 rounded-sm" required/>
                            <span class="error"><?php echo error("count-person"); ?></span>
                        </div>
                        <input type="submit" class="w-full p-2 border-cyan-500 border-2 rounded-md cursor-pointer text-center bg-cyan-500 text-white hover:text-black hover:bg-white" value="Passer au paiement" />
                    </div>
                </form>
            <?php } ?>
        </section>
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
