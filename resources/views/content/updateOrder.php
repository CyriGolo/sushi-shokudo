<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Order</title>
</head>
<body>
    <h1>Update Order</h1>
    <form method="POST">
        <label>Reference: <input type="text" name="reference" value="<?= $order->getReference() ?>"></label><br>
        <label>Account ID: <input type="text" name="id_account" value="<?= $order->getIdAccount() ?>"></label><br>
        <label>Travel ID: <input type="text" name="id_travel" value="<?= $order->getIdTravel() ?>"></label><br>
        <label>Number of People: <input type="text" name="nb_personne" value="<?= $order->getNbPersonne() ?>"></label><br>
        <label>Number of Weeks: <input type="text" name="nb_week" value="<?= $order->getNbWeek() ?>"></label><br>
        <label>Total: <input type="text" name="total" value="<?= $order->getTotal() ?>"></label><br>
        <button type="submit">Update</button>
    </form>
</body>
</html>