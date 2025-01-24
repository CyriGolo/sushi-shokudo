<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>— Phoenix —</title>
    <script src="https://kit.fontawesome.com/c1d0ab37d6.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/style/style.css">
</head>
<body>
    <header>
        <div class="logo-container">
            <a href="/">
                <img src="/img/house-solid.svg" alt="Home" class="home-icon">
            </a>
            <img src="/img/boutique.png" alt="boutique">
        </div>
        <nav>
            <a href="/horoscope">HOROSCOPE</a>
            <a href="/products">PRODUITS</a>
        </nav>
        <div class="profile">
            <img src="/img/profil.png" alt="Profil" class="profile-icon">
        </div>
    </header>

    <main>
        <?php echo $content; ?>
    </main>

    <footer>
        <p>&copy; 2025 - <span>BOUTIQUE QUANTIQUE</span></p>
    </footer>
</body>
</html>
<?php
unset($_SESSION['error']);
unset($_SESSION['old']);