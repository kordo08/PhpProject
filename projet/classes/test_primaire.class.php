<?php
class test_primaire extends dbh 
{
public function test_primaire_qsts(int $id_user,int $nbQstParType) 
{
$tab_plaques1=$this->getQstd1theme($this->getCoursd1theme($id_user,1,'signalisation'),'signalisation',$nbQstParType,$id_user,1);
$tab_plaques2=$this->getQstd1theme($this->getCoursd1theme($id_user,2,'signalisation'),'signalisation',$nbQstParType,$id_user,2);
$tab_plaques3=$this->getQstd1theme($this->getCoursd1theme($id_user,3,'signalisation'),'signalisation',$nbQstParType,$id_user,3);
$tab_plaques=array_merge_recursive($tab_plaques1,$tab_plaques2,$tab_plaques3);
shuffle($tab_plaques);
$tab_intersection1=$this->getQstd1theme($this->getCoursd1theme($id_user,1,'circulation'),'circulation',$nbQstParType,$id_user,1);
$tab_intersection2=$this->getQstd1theme($this->getCoursd1theme($id_user,2,'circulation'),'circulation',$nbQstParType,$id_user,2);
$tab_intersection3=$this->getQstd1theme($this->getCoursd1theme($id_user,3,'circulation'),'circulation',$nbQstParType,$id_user,3);
$tab_intersection=array_merge_recursive($tab_intersection1,$tab_intersection2,$tab_intersection3);
shuffle($tab_intersection);
$tab_divers1=$this->getQstd1theme($this->getCoursd1theme($id_user,1,'divers'),'divers',$nbQstParType,$id_user,1);
$tab_divers2=$this->getQstd1theme($this->getCoursd1theme($id_user,2,'divers'),'divers',$nbQstParType,$id_user,2);
$tab_divers3=$this->getQstd1theme($this->getCoursd1theme($id_user,3,'divers'),'divers',$nbQstParType,$id_user,3);
$tab_divers=array_merge_recursive($tab_divers1,$tab_divers2,$tab_divers3);
shuffle($tab_divers);
$tab_final=array_merge_recursive($tab_plaques,$tab_intersection,$tab_divers);
return $tab_final;
}
public function getCoursd1theme(int $id_user,int $num_niveau,string $titre_theme)
{
$sql="SELECT * FROM cours WHERE  id_theme=(SELECT (id_theme)FROM themes WHERE titre_theme=? AND id_niveau=(SELECT(id_niveau) FROM niveaux WHERE id_user=? AND num_niveau=?))";
$stmt=$this->connect()->prepare($sql);
$stmt->execute([$titre_theme,$id_user,$num_niveau]);
$tab=$stmt->fetchAll();
return $tab;
} 
public function getQstd1theme(array $tab_cours,string $titre_theme,int $nbQstParType,int $id_user,int $num_niveau) 
{
$tab_final=array();
foreach($tab_cours as $row)
{
$objet_get_qst_cours=new qst_cours();
$tab_cours=$objet_get_qst_cours->get_qst_all($row['titre_cours'],$titre_theme,$id_user,$num_niveau,$nbQstParType);
$tab_final=array_merge_recursive($tab_final,$tab_cours);
}
return $tab_final;
}
}
?>