<?php
declare (strict_types = 1);
include 'AutoLoader.inc.php';

if (isset($_POST))
{
if (!empty($_POST['id_user']) && !empty($_POST['num_niveau']))
{
$id_user=(int)$_POST['id_user'];
$num_niveau=(int)$_POST['num_niveau'];
$objet_update_test=new update_test_niveau();
$result["etat_test"]=$objet_update_test->update_etat_test($id_user,$num_niveau);
}
}
echo json_encode($result);
?>
