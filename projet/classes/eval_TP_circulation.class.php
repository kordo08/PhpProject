<?php
class eval_TP_circulation extends dbh
{
public function TP_circulation_eval(int $id_user,int $moyenne)
{
if($moyenne==7 || $moyenne==8)
{ 
    $sql="UPDATE themes SET etat_theme=? where id_theme=(SELECT (id_theme)FROM themes WHERE titre_theme=? AND id_niveau=(SELECT(id_niveau) FROM niveaux WHERE id_user=? AND num_niveau=?))";
    $stmt=$this->connect()->prepare($sql);
    $stmt->execute([true,'circulation',$id_user,1]);
    $objet_update_theme=new update_eval_theme();
    $objet_update_theme->update_theme($id_user,1,'circulation',0);
    $sql="UPDATE cours SET etat_lecon=?,eval_lecon=? where id_theme=(SELECT (id_theme)FROM themes WHERE titre_theme=? AND id_niveau=(SELECT(id_niveau) FROM niveaux WHERE id_user=? AND num_niveau=?))";
    $stmt=$this->connect()->prepare($sql);
    $stmt->execute([true,6,'circulation',$id_user,1]);
    $sql="UPDATE cours SET etat_lecon=? where id_cours=?";
    $stmt=$this->connect()->prepare($sql);
    $stmt->execute([true,$this->get_1ercours_theme($id_user,1,'divers')]);
}
if($moyenne==9 || $moyenne==10)
{   
    $sql="UPDATE themes SET etat_theme=? where id_theme=(SELECT (id_theme)FROM themes WHERE titre_theme=? AND id_niveau=(SELECT(id_niveau) FROM niveaux WHERE id_user=? AND num_niveau=?))";
    $stmt=$this->connect()->prepare($sql);
    $stmt->execute([true,'circulation',$id_user,1]);
    $objet_update_theme=new update_eval_theme();
    $objet_update_theme->update_theme($id_user,1,'circulation',0);
    $sql="UPDATE cours SET etat_lecon=?,eval_lecon=? where id_theme=(SELECT (id_theme)FROM themes WHERE titre_theme=? AND id_niveau=(SELECT(id_niveau) FROM niveaux WHERE id_user=? AND num_niveau=?))";
    $stmt=$this->connect()->prepare($sql);
    $stmt->execute([true,6,'circulation',$id_user,1]);
    $sql="UPDATE cours SET etat_lecon=? where id_cours=?";
    $stmt=$this->connect()->prepare($sql);
    $stmt->execute([true,$this->get_1ercours_theme($id_user,1,'divers')]);
    $sql="UPDATE themes SET etat_theme=? where id_theme=(SELECT (id_theme)FROM themes WHERE titre_theme=? AND id_niveau=(SELECT(id_niveau) FROM niveaux WHERE id_user=? AND num_niveau=?))";
    $stmt=$this->connect()->prepare($sql);
    $stmt->execute([true,'circulation',$id_user,2]);
    $objet_update_theme->update_theme($id_user,2,'circulation',0);
    $sql="UPDATE cours SET etat_lecon=?,eval_lecon=? where id_theme=(SELECT (id_theme)FROM themes WHERE titre_theme=? AND id_niveau=(SELECT(id_niveau) FROM niveaux WHERE id_user=? AND num_niveau=?))";
    $stmt=$this->connect()->prepare($sql);
    $stmt->execute([true,6,'circulation',$id_user,2]);
    $sql="UPDATE cours SET etat_lecon=? where id_cours=?";
    $stmt=$this->connect()->prepare($sql);
    $stmt->execute([true,$this->get_1ercours_theme($id_user,2,'divers')]); 
}
}
public function get_1ercours_theme(int $id_user,int $num_niveau,string $titre_theme)
{
$sql="SELECT * FROM cours WHERE  id_theme=(SELECT (id_theme)FROM themes WHERE titre_theme=? AND id_niveau=(SELECT(id_niveau) FROM niveaux WHERE id_user=? AND num_niveau=?))";
$stmt=$this->connect()->prepare($sql);
$stmt->execute([$titre_theme,$id_user,$num_niveau]);
$tab=$stmt->fetchAll();
return $tab[0]['id_cours'];
} 
}
?>