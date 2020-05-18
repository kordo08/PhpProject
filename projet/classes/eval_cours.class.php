<?php
class eval_cours extends dbh
{
 public function cours_evaluation(int $id_cours,int $moyenne,int $last)
{
$sql="UPDATE cours SET eval_lecon=? where id_cours=?";
$stmt=$this->connect()->prepare($sql);
$stmt->execute([$moyenne,$id_cours]);
if($last==0) 
{
if($moyenne>=4)
{
$id_prochain=$id_cours+1;
$sql="UPDATE cours SET etat_lecon=? where id_cours=?";
$stmt=$this->connect()->prepare($sql);
$stmt->execute([true,$id_prochain]);
$result['etat_cours_prochain']='unblocked';      
}
else
{
$result['etat_cours_prochain']='blocked';    
}
}
else
{
if($moyenne>=4)
{
$result['etat_cours_prochain']='unblocked';
}
else 
{
$result['etat_cours_prochain']='blocked';     
}
}
$result['dernier']=$this->last_or_not($id_cours);
return $result;
}
public function last_or_not(int $id_cours)
{
$sql="SELECT * FROM cours WHERE id_cours=? OR id_cours=?+1";
$stmt=$this->connect()->prepare($sql);
$stmt->execute([$id_cours,$id_cours]);
$tab=$stmt->fetchAll();
if($tab[0]['id_theme']==$tab[1]['id_theme'])
{
$last=false;    
} 
else
{
$last=true;   
}
return $last; 
}


public function getlast(int $id_cours){
	
$sql="SELECT * FROM cours WHERE id_cours=? ";
$stmt=$this->connect()->prepare($sql);
$stmt->execute([$id_cours]);
$cours=$stmt->fetch();
if(strcmp($cours['titre_cours'],"Sanctions")==0){return 1;}else {return 0;}

}
}
?>
