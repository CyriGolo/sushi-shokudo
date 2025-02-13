<?php ob_start(); ?>

<section>
    <form method="POST">
        <label>Category Name: <input type="text" name="name_category" required></label><br>
        <button type="submit">Add Category</button>
    </form>
</section>

<?php $content = ob_get_clean(); ?>
<?php require VIEWS . 'layout.php'; ?>