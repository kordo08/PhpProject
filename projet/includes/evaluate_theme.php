<?php
declare (strict_types = 1);
include 'AutoLoader.inc.php';

if (isset($_POST))
{
if (!empty($_POST['id_user']) && !empty($_POST['num_niveau'])&& !empty($_POST['titre_theme']))
{
$id_user=(int)$_POST['id_user'];
$num_niveau=(int)$_POST['num_niveau'];
$titre_theme=$_POST['titre_theme'];
if($num_niveau==3 && strcasecmp($titre_theme,'divers')==0)
{
$last=1;
}
else{
$last=0;   
}
$objet_eval_theme=new eval_theme();
$result=$objet_eval_theme->theme_evaluation($id_user,$num_niveau,$titre_theme,$last);
}
}
echo json_encode($result);
?>

