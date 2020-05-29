<?php
declare (strict_types = 1);
include 'AutoLoader.inc.php';

$objet_get_plaques=new get_plaques();
$tab_plaques=$objet_get_plaques->getPlaques("danger");

echo json_encode($tab_plaques);
?>
