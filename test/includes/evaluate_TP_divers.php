<?php
declare (strict_types = 1);
include 'AutoLoader.inc.php';

if (isset($_POST))
{
if (!empty($_POST['id_user']) && !empty($_POST['moyenne']) )
 {
$id_user=(int)$_POST['id_user'];
$moyenne=(int)$_POST['moyenne'];
$objet_eval_TP_div=new eval_TP_divers();
$objet_eval_TP_div->TP_divers_eval($id_user,$moyenne);
}
}
?>