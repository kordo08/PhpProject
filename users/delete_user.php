<?php 
$id_questions = "";
$id_cours = "";
$id_theme ="";
$id_niveau ="";
$id_user = "";

 $results['error'] = false;
      $results['message'] = "";


if(isset($_POST))
{
	$id_user = $_POST["id_user"];
 
	if(!empty($id_user))
	{
		include("connect.php");
      $q_notes = "DELETE FROM  bloc_note WHERE id_user=$id_user";
                    $connexion->exec($q_notes);

	   $query_niv = "SELECT * FROM niveaux WHERE id_user=$id_user";
	   $result_niv = $connexion->query($query_niv);
	   $niv=$result_niv->fetchAll();
	    for ($i1 =0;$i1<count($niv);$i1++)
       {
        	 $id_niveau=$niv[$i1]["id_niveau"];
        	 $query_them = "SELECT * FROM themes WHERE id_niveau=$id_niveau";
	         $result_them = $connexion->query($query_them);
	         $them=$result_them->fetchAll();
	         for ($i2 =0;$i2<count($them);$i2++)
	         { 
                    $id_theme=$them[$i2]["id_theme"];
                    $query_cours = "SELECT * FROM cours WHERE id_theme=$id_theme";
                    $result_cours = $connexion->query($query_cours);
	                $cours=$result_cours->fetchAll();
                    for ($i3 =0;$i3<count($cours);$i3++)
	                { 
                         
                         $id_cours=$cours[$i3]["id_cours"];
                         $q_question = "DELETE FROM  questions WHERE id_cours=$id_cours";
                         $connexion->exec($q_question);
                    }
	                $q_cours = "DELETE FROM  cours WHERE id_theme=$id_theme";
                    $connexion->exec($q_cours);
             }
             $q_niveau = "DELETE FROM  themes WHERE id_niveau=$id_niveau";
             $connexion->exec($q_niveau);
       }
       $q_userniv = "DELETE FROM  niveaux WHERE id_user=$id_user";
       $connexion->exec($q_userniv);
       
       $q_user_note = "DELETE FROM  bloc_note WHERE user_id=$id_user";
       $connexion->exec($q_user_note);

       $q_user = "DELETE FROM  utilisateurs WHERE id_user=$id_user";
       $connexion->exec($q_user); 

       $results['error'] = false;
      $results['message'] = "supression réussie";
    }else{
      $results['error'] = true;
      $results['message'] = "id user est  vide";
    }
   
}

	 echo json_encode($results); 
	

?>
