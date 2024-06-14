<table class="table table-bordered">
    <thead class="table-primary">
        <tr>
            <th>ID</th>
            <th>Libellé</th>
            <th>Mots clés</th>
            <th><i class="fa fa-screwdriver-wrench"></i><th>
        </tr>
    </thead>
    <tbody>
        <?php  foreach($genres as $genre) :   ?>
        <tr>
          <td> <?= $genre["id"] ?> </td>
          <td> <?= $genre["libelle"] ?> </td>
          <td> <?= $genre["mots_cles"] ?> </td>
          <td>
            <a href="genre_modifier.php?id=<?= $genre["id"] ?>">
                <i class="fa fa-edit"></i>
            </a>
            <a href="genre_supprimer.php?id=<?= $genre["id"] ?>">
                <i class="fa fa-trash"></i>
            </a>
          </td>
        </tr>
        <?php endforeach ?>  
    </tbody>
</table>