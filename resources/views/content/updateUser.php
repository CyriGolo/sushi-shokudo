<?php ob_start(); ?>

<section>
    <form method="POST">
        <label>Username: <input type="text" name="username" value="<?= $user->getUsername() ?>"></label><br>
        <label>Email: <input type="text" name="email" value="<?= $user->getEmail() ?>"></label><br>
        <label>Name: <input type="text" name="name" value="<?= $user->getName() ?>"></label><br>
        <label>Address: <input type="text" name="address" value="<?= $user->getAddress() ?>"></label><br>
        <label>Phone: <input type="text" name="tel" value="<?= $user->getTel() ?>"></label><br>
        <label>Role: <input type="text" name="id_role" value="<?= $user->getIdRole() ?>"></label><br>
        <button type="submit">Update</button>
    </form>
</section>
<?php $content = ob_get_clean(); ?>
<?php require VIEWS . '../layout.php'; ?>
