
    <h1>Ajouter une nouvelle banque</h1>

    <form action="" method="post">
        <div>
            <label for="">Nom de la banque</label>
            <input type="text" name="nom" placeholder="LCI" value="<?= isset($banque) ? $banque->getNom() : '' ?>">
        </div>

        <div>
            <label for="">Ville de la banque</label>
            <input type="text" name="ville" placeholder="ville" value="<?= isset($banque) ? $banque->getVille() : '' ?>">
        </div>
        <input type="submit">
    </form>

</body>
</html>