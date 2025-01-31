<?php ob_start(); ?>
    <h2>Travels</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Description</th>
            <th>Image</th>
            <th>Price</th>
            <th>Category</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($travels as $travel): ?>
            <tr>
                <td><?= $travel->getId() ?></td>
                <td><?= $travel->getName() ?></td>
                <td><?= $travel->getDescription() ?></td>
                <td><img src="../img/<?= $travel->getImage() ?>" alt="<?= $travel->getName() ?>" width="100"></td>
                <td><?= $travel->getPrice() ?>€</td>
                <td><?= $travel->getIdCategory() ?></td>
                <td>
                    <a href="/admin/updateTravel/<?= $travel->getId() ?>">Edit</a>
                    <a href="/admin/deleteTravel/<?= $travel->getId() ?>">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

    <h2>Users</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Email</th>
            <th>Name</th>
            <th>Address</th>
            <th>Phone</th>
            <th>Role</th>
            <th>Credit Card</th>
            <th>CVV</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($users as $user): ?>
            <tr>
                <td><?= $user->getIdAccount() ?></td>
                <td><?= $user->getUsername() ?></td>
                <td><?= $user->getEmail() ?></td>
                <td><?= $user->getName() ?></td>
                <td><?= $user->getAddress() ?></td>
                <td><?= $user->getTel() ?></td>
                <td><?= $userManager->getRoleName($user->getIdRole()) ?></td>
                <td><?= $user->getFormattedNumCarte() ?></td>
                <td><?= $user->getCrypto() ?></td>
                <td>
                    <a href="/admin/updateUser/<?= $user->getIdAccount() ?>">Edit</a>
                    <a href="/admin/deleteUser/<?= $user->getIdAccount() ?>">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

    <h2>Orders</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Reference</th>
            <th>Account ID</th>
            <th>Travel ID</th>
            <th>Number of People</th>
            <th>Number of Weeks</th>
            <th>Total</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($orders as $order): ?>
            <tr>
                <td><?= $order->getId() ?></td>
                <td><?= $order->getReference() ?></td>
                <td><?= $order->getIdAccount() ?></td>
                <td><?= $order->getIdTravel() ?></td>
                <td><?= $order->getNbPersonne() ?></td>
                <td><?= $order->getNbWeek() ?></td>
                <td><?= $order->getTotal() ?>€</td>
                <td>
                    <a href="/admin/updateOrder/<?= $order->getId() ?>">Edit</a>
                    <a href="/admin/deleteOrder/<?= $order->getId() ?>">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
<?php $content = ob_get_clean(); ?>
<?php require VIEWS . 'layout.php'; ?>
