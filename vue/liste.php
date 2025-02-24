
    <h1>Liste de compte bancaire</h1>

    <table class="table">
        <tr>
            <th>Solde</th>
            <th>Banque</th>
            <th>Date</th>
            <th>Actions</th>
        </tr>

        <?php foreach($comptes as $compte): ?>
            <tr>
                <td> <?= $compte->getSolde(); ?> </td>
                <td> <?= $compte->getBanqueId(); ?> </td>
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