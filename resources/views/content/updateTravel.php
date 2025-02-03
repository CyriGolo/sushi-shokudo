<?php ob_start(); ?>

<section>
    <form method="POST" enctype="multipart/form-data">
        <label>Name: <input type="text" name="name" value="<?= $travel->getName() ?>"></label><br>
        <label>Description: <input type="text" name="description" value="<?= $travel->getDescription() ?>"></label><br>
        <label>Image: <input type="file" name="image"></label><br>
        <label>Price: <input type="text" name="price" value="<?= $travel->getPrice() ?>"></label><br>
        <label>Category:
            <select name="id_category">
                <?php foreach ($categories as $category): ?>
                    <option value="<?= $category['id_category'] ?>" <?= $category['id_category'] == $travel->getIdCategory() ? 'selected' : '' ?>><?= $category['name_category'] ?></option>
                <?php endforeach; ?>
            </select>
        </label><br>
        <button type="submit">Update</button>
    </form>
</section>

<?php $content = ob_get_clean(); ?>
<?php require VIEWS . 'layout.php'; ?>