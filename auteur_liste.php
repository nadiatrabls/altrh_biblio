<?php

require "inc/init.inc.php";

$auteurs = selectAll("auteur");
$title = "Liste des auteurs";

include "views/header.html.php";
include "views/auteur/table.html.php";
include "views/footer.html.php";