<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Liste de compte bancaire</h1>

    <table>
        <tr>
            <th>Solde</th>
            <th>Date</th>
            <th>Actions</th>
        </tr>

        <?php foreach($comptes as $compte): ?>
            <tr>
                <td> <?= $compte->getSolde(); ?> </td>
                <td> <?= $compte->getDateCreation(); ?> </td>
                <td>
                    <a href="?action=delete&numero=<?= $compte->getNumero(); ?>">X</a> |
                    <a href="?action=update&numero=<?= $compte->getNumero(); ?>">U</a> 
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

</body>
</html>