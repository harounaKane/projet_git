
    <h1>Liste des bancaires</h1>

    <table class="table">
        <tr>
            <th>Nom</th>
            <th>Ville</th>
            <th>Actions</th>
        </tr>

        <?php foreach($banques as $banque): ?>
            <tr>
                <td> <?= $banque->getNom(); ?> </td>
                <td> <?= $banque->getVille(); ?> </td>
                <td>
                    <a href="?actionBanque=delete&numero=<?= $banque->getId(); ?>">X</a> |
                    <a href="?actionBanque=update&numero=<?= $banque->getId(); ?>">U</a> 
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

</body>
</html>