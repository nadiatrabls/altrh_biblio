<form action="" method="post">
    <div class="mb-3 mt-3">
        <label for="libelle" class="form-label">Libellé</label>
        <input type="text" class="form-control <?= !empty($erreurs["libelle"]) ? "is-invalid" : "" ?>" id="libelle" name="libelle" placeholder="" value="<?= $libelle ?? "" ?>" required>
        <?php if (!empty($erreurs["libelle"])) : ?>
            <div class="invalid-feedback"><?= $erreurs["libelle"] ?></div>
        <?php endif ?>
    </div>

    <div class="mb-3">
        <label for="mots_cles" class="form-label">Mots-clés</label>
        <textarea class="form-control" name="mots_cles" id="mots_cles" rows="3"><?= $mots_cles ?? "" ?></textarea>
        <?php if (!empty($erreurs["mots_cles"])) : ?>
            <div class="invalid-feedback"><?= $erreurs["mots_cles"] ?></div>
        <?php endif ?>
    </div>

    <div class="d-flex justify-content-between">
        <button type="submit" class="btn btn-primary">Enregistrer</button>
        <button type="reset" class="btn btn-warning">Effacer</button>
        <a href="genre_liste.php" class="btn btn-danger">Annuler</a>
    </div>
</form>
