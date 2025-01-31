<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>— Darius PESSIN —</title>
    <script src="https://kit.fontawesome.com/c1d0ab37d6.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../style.css">
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
</head>
<body class="flex flex-col min-h-screen w-screen overflow-x-hidden justify-between gap-4">
<header class="relative py-4">
  <nav class="flex items-center justify-between z-99 relative px-[20vw]">
    <div class="flex items-center gap-6">
      <img class="max-w-12" src="../img/Logo.png"/>
      <ul class="flex gap-6">
        <li><a href="/">Phoenix</a></li>
        <li><a href="/travel">Choisir une destination</a></li>
        <?php if(isset($_SESSION["user"]) && $_SESSION["user"]["role"] === 2) { ?>
          <li><a href="/admin">Dashboard</a></li>
        <?php } ?>
      </ul>
    </div>
    <?php if(isset($_SESSION["user"])) { ?>
      <a href="/logout">Déconnexion</a></li>
    <?php } else { ?>
      <div class="flex gap-4">
        <a href="/login">Connexion</a>
        <a href="/register">Inscription</a>
      </div>
    <?php } ?>
  </nav>
  <span class="w-screen h-full bg-cyan-500 flex absolute top-0 left-0 z-2"/>
</header>
<main class="px-[20vw] h-full">
    <?php echo $content; ?>
</main>
<footer class="relative px-[20vw] py-4">
  <ul class="relative z-99 flex justify-between">
    <li>Vos vacances de rêve ...</li>
    <li><a href="/filtred/1">Plage ...</a></li>
    <li><a href="/filtred/2">Urbaine ...</a></li>
    <li><a href="/filtred/3">Croisière ...</a></li>
    <li><a href="/filtred/4">Montagne ...</a></li>
    <li>A prix tout doux ...</li>
  </ul>
  <span class="w-screen h-full bg-cyan-500 flex absolute top-0 left-0 z-2"/>
</footer>
</body>
</html>
<?php
unset($_SESSION['error']);
unset($_SESSION['old']);

