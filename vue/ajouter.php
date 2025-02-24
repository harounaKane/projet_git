
    <h1>Ajouter un compte bancaire</h1>

    <form action="" method="post">
        <div>
            <label for="">Solde</label>
            <input type="number" name="solde" placeholder="500000" value="<?= isset($compte) ? $compte->getSolde() : ''; ?>">
        </div>
        <input type="submit">
    </form>

</body>
</html>