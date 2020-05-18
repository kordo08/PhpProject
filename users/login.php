<?php

$serveur="localhost";
$bd="projet";
$login="root";
$mdp="";
   
$db = new PDO("mysql:host=$serveur;dbname=$bd",$login,$mdp);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$results['error'] = false;
$results['message'] = "";
$results['id_user'] = "";
 
if(isset($_POST)){
     
    if(!empty($_POST['username']) && !empty($_POST['password']) )
    {
   
            $username = $_POST['username'];
          
            $password = $_POST['password'];
             
  

            //Vérification du pseudo
        if(strlen($username) < 2 || !preg_match("/^[a-zA-Z0-9 _-]+$/", $username) || strlen($username) > 15)
        {
            $results['error'] = true;
            $results['message']= "Pseudo invalide";
        }
        else
        {
            $requete = $db->query('SELECT id_user FROM utilisateurs WHERE username = "'.$username.'"');
            
            $row = $requete->fetch();
        if(!$row)
        {
            $results['error'] = true;
            $results['message'] = "pseudo innexistant";
        } // Vérification du password
        else{

             $requete = $db->query('SELECT id_user FROM utilisateurs WHERE username = "'.$username.'" AND password = "'.$password.'" ');
            
            $row = $requete->fetch();
        if(!$row)
        {
            $results['error'] = true;
            $results['message'] = "mot de passe incorrect";

        }else{
          $requete = $db->query('SELECT id_user FROM utilisateurs WHERE username = "'.$username.'" AND password = "'.$password.'" ');
            
            $row = $requete->fetch();
        
            $results['id_user'] = $row["id_user"];
            


        }
        
        }
   
 
    }}
    else
        {
        $results['error'] = true;
        $results['message'] = "Veuillez remplir tout les champs";
        }
}
  echo json_encode($results);
  

?>