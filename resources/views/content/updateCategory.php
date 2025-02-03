<?php ob_start(); ?>

<section>
    <form method="POST">
        <label>Category Name: <input type="text" name="name_category" value="<?= $category['name_category'] ?>" required></label><br>
        <button type="submit">Update Category</button>
    </form>
</section>

<?php $content = ob_get_clean(); ?>
<?php require VIEWS . 'layout.php'; ?>