<table class="table table-bordered">
    <thead class="table-primary">
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Date de naissance</th>
            <th>Date de décès</th>
            <th>Biographie</th>
            <th><i class="fa fa-screwdriver-wrench"></i><th>
        </tr>
    </thead>
    <tbody>
        <?php  foreach($auteurs as $auteur) :   ?>
        <tr>
          <td> <?= $auteur["id"] ?> </td>
          <td> <?= $auteur["prenom"] . " " . $auteur["nom"] ?> </td>
          <td> <?= $auteur["naissance"] ?> </td>
          <td> <?= $auteur["deces"] ?> </td>
          <td> <?= substr($auteur["biographie"], 0, 10) ?> </td>
          <td>
            <a href="auteur_modifier.php?id=<?= $auteur["id"] ?>">
                <i class="fa fa-edit"></i>
            </a>
            <a href="auteur_supprimer.php?id=<?= $auteur["id"] ?>">
                <i class="fa fa-trash"></i>
            </a>
          </td>
        </tr>
        <?php endforeach ?>  
    </tbody>
</table>