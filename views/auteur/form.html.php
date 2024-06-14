<form action="" method="post">
    <div class="mb-3 mt-3">
            <label for="prenom" class="form-label">Nom</label>
            <input type="text" class="form-control <?= !empty($erreurs["nom"]) ? "is-invalid" : "" ?>" id="nom" name="nom" placeholder="" value="<?= $nom ?? "" ?>" required>
            <?php if (!empty($erreurs["nom"])) : ?>
                <div class="invalid-feedback"><?= $erreurs["nom"] ?></div>
            <?php endif ?>
        </div>

        <div class="mb-3">
            <label for="prenom" class="form-label">Prénom</label>
            <input type="text" class="form-control <?= !empty($erreurs["prenom"]) ? "is-invalid" : "" ?>" id="prenom" name="prenom" placeholder="" value="<?= $prenom ?? "" ?>">
            <?php if (!empty($erreurs["prenom"])) : ?>
                <div class="invalid-feedback"><?= $erreurs["prenom"] ?></div>
            <?php endif ?>
        </div>

        <div class="mb-3">
            <label for="naissance" class="form-label">Date de naissance</label>
            <input type="date" class="form-control <?= !empty($erreurs["naissance"]) ? "is-invalid" : "" ?>" id="naissance" name="naissance" placeholder="" value="<?= $naissance ?? "" ?>">
            <?php if (!empty($erreurs["naissance"])) : ?>
                <div class="invalid-feedback"><?= $erreurs["naissance"] ?></div>
            <?php endif ?>
        </div>

        <div class="mb-3">
            <label for="deces" class="form-label">Date de déces</label>
            <input type="date" class="form-control <?= !empty($erreurs["deces"]) ? "is-invalid" : "" ?>" id="deces" name="deces" placeholder="" value="<?= $deces ?? "" ?>">
            <?php if (!empty($erreurs["deces"])) : ?>
                <div class="invalid-feedback"><?= $erreurs["deces"] ?></div>
            <?php endif ?>
        </div>

        <div class="mb-3">
        <label for="biographie" class="form-label">Biographie</label>
        <textarea class="form-control" name="biographie" id="biographie" rows="3"><?= $biographie ?? "" ?></textarea>
        <?php if (!empty($erreurs["biographie"])) : ?>
            <div class="invalid-feedback"><?= $erreurs["biographie"] ?></div>
        <?php endif ?>
    </div>

    <div class="d-flex justify-content-between">
        <button type="submit" class="btn btn-primary">Enregistrer</button>
        <button type="reset" class="btn btn-warning">Effacer</button>
        <a href="auteur_liste.php" class="btn btn-danger">Annuler</a>
    </div>
    </form>