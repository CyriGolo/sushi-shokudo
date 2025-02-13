<?php ob_start(); ?>

<section>
    <header>Test</header>
</section>

<?php $content = ob_get_clean(); ?>
<?php require VIEWS . 'layout.php'; ?>