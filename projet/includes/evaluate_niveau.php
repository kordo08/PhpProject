<?php
declare (strict_types = 1);
include 'AutoLoader.inc.php';

if (isset($_POST))
{
if (!empty($_POST['id_user']) && !empty($_POST['num_niveau']) && !empty($_POST['moyenne']) && !empty($_POST['nb_qsts']) )
{
$id_user=(int)$_POST['id_user'];
$num_niveau=(int)$_POST['num_niveau'];
$moyenne=(int)$_POST['moyenne'];
$nb_qsts=(int)$_POST['nb_qsts'];
/*
$id_user=(int)"6";
$num_niveau=(int)"1";
$moyenne=(int)"15";
$nb_qsts=(int)"28";*/

if($num_niveau==3)
{
$last=1;
}
else 
{
$last=0;
}
$objet_eval_niv=new eval_niveau();
$result=$objet_eval_niv->niveau_evaluation($id_user,$num_niveau,$moyenne,$nb_qsts,$last);

echo json_encode($result);
}
echo json_encode("vos entrées sont vides");}

?>


