<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sushi Shokudo</title>
    <link rel="stylesheet" href="../../style.css">
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
</head>
<body class="flex flex-col min-h-screen w-screen overflow-x-hidden justify-between gap-4">
<header class="relative py-4">
  <nav class="flex items-center justify-between z-99 relative px-[10vw]">
    <div class="flex items-center gap-6">
      <img class="max-w-12" src="../../img/sushi_shokudo.webp" alt="logo"/>
      <ul class="flex gap-6">
        <li><a href="/">Accueil</a></li>
        <li><a href="/menu">Menu</a></li>
        <?php if (isset($_SESSION["user"])) { ?>
            <li><a href="/admin">Gérer les plats</a></li>
        <?php } ?>
      </ul>
    </div>
  </nav>
  <span class="w-screen h-full bg-cyan-500 flex absolute top-0 left-0 z-2"></span>
</header>
<main class="px-[10vw] h-full">
    <?php echo $content; ?>
</main>
<footer class="relative px-[10vw] py-4">
  <ul class="relative z-99 flex justify-between">
    <li>A prix tout doux ...</li>
  </ul>
  <span class="w-screen h-full bg-cyan-500 flex absolute top-0 left-0 z-2"></span>
</footer>
</body>
</html>
<?php
unset($_SESSION['error']);
unset($_SESSION['old']);