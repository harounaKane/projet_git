
    <h1>Ajouter un compte bancaire</h1>

    <form action="" method="post">
        <div>
            <label for="">Solde</label>
            <input type="number" name="solde" placeholder="500000" value="<?= isset($compte) ? $compte->getSolde() : ''; ?>">
        </div>
        <select name="banqueId" id="" class="form-select">
            <?php foreach($banques as $banque): ?>
                <option value="<?= $banque->getId(); ?>"><?= $banque->getNom(); ?></option>
            <?php endforeach; ?>
        </select>
        <input type="submit">
    </form>

</body>
</html>