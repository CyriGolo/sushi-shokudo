<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Travel</title>
</head>
<body>
    <h1>Update Travel</h1>
    <form method="POST">
        <label>Name: <input type="text" name="name" value="<?= $travel->getName() ?>"></label><br>
        <label>Description: <input type="text" name="description" value="<?= $travel->getDescription() ?>"></label><br>
        <label>Image: <input type="text" name="image" value="<?= $travel->getImage() ?>"></label><br>
        <label>Price: <input type="text" name="price" value="<?= $travel->getPrice() ?>"></label><br>
        <label>Category: <input type="text" name="id_category" value="<?= $travel->getIdCategory() ?>"></label><br>
        <button type="submit">Update</button>
    </form>
</body>
</html>