<?php ob_start(); ?>

<h1>Add Travel</h1>
<form method="POST" enctype="multipart/form-data">
    <label>Name: <input type="text" name="name" required></label><br>
    <label>Description: <input type="text" name="description" required></label><br>
    <label>Image: <input type="file" name="image" required></label><br>
    <label>Price: <input type="text" name="price" required></label><br>
    <label>Category:
        <select name="id_category" required>
            <?php foreach ($categories as $category): ?>
                <option value="<?= $category['id_category'] ?>"><?= $category['name_category'] ?></option>
            <?php endforeach; ?>
        </select>
    </label><br>
    <button type="submit">Add</button>
</form>

<?php $content = ob_get_clean(); ?>
<?php require VIEWS . 'layout.php'; ?>