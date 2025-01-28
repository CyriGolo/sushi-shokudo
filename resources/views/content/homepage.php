<?php ob_start(); ?>

    <section class="flex flex-col">
      <img src="./img/caraibes1.jpg" alt="hero" class="max-h-[70vh] min-w-screen relative left-[-20vw] scale-y-125 -translate-y-1/4 top-0 left-0 z-5" />
      <a href="/travel" class="w-full p-2 border-cyan-500 border-2 rounded-md cursor-pointer text-center hover:bg-cyan-500 hover:text-white">Choisir mon séjour tout de suite</a>
    </section>

<?php $content = ob_get_clean(); ?>
<?php require VIEWS . 'layout.php'; ?>
