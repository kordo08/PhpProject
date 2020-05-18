<?php
class update_test_niveau extends dbh 
{
public function update_etat_test(int $id_user,int $num_niveau)
{
$sql="SELECT * FROM themes WHERE id_niveau=(SELECT (id_niveau) FROM niveaux WHERE id_user=? AND num_niveau=? )";
$stmt=$this->connect()->prepare($sql);
$stmt->execute([$id_user,$num_niveau]);
$tab=$stmt->fetchAll();
if($tab[0]['eval_theme']==3 && $tab[1]['eval_theme']==3 && $tab[2]['eval_theme']==3 )
{
$sql="UPDATE niveaux SET etat_test_niveau=? where id_user=? AND num_niveau=?";
$stmt=$this->connect()->prepare($sql);
$stmt->execute([true,$id_user,$num_niveau]);
$result='unblocked';
}
else 
{
$result='blocked';   
}
return $result;
} 
}



?>