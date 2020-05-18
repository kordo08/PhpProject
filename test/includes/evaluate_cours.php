<?php
declare (strict_types = 1);
include 'AutoLoader.inc.php';



 if (isset($_POST))
{
if (!empty($_POST['id_cours']) && !empty($_POST['moyenne']))
 {

$id_cours=(int)$_POST['id_cours'];
$moyenne=(int)$_POST['moyenne'];
$objet_cours_eval=new eval_cours();
$last=$objet_cours_eval->getlast($id_cours);
$result=$objet_cours_eval->cours_evaluation($id_cours,$moyenne,$last);

if(!is_null($result)){
echo json_encode ($result);}else{
	echo json_encode("result est null");
}

}else{
	echo json_encode("vos entrées sont vides");
}
}


?>
 