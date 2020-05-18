

<?php

$serveur="localhost";
$bd="projet";
$login="root";
$mdp="";
   
$db = new PDO("mysql:host=$serveur;dbname=$bd",$login,$mdp);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$results['error'] = false;
$results['message'] = "";

 
if(isset($_POST)){
     
    
    
       
            $username = $_POST['username'];


              if(strlen($username) < 5 || strlen($username) > 15)
        {
            $results['error'] = true;
            $results['message']= "votre pseudo doir contenir entre 5 et 15 caracteres";
        }else{
        if(preg_match("#[ .,?;:!/]#", $username)){

             $results['error'] = true;
            $results['message']="votre pseudo ne doit pas contenir d'éspaces ou de signes de ponctuations" ;

        }else{ 

           $requete = $db->query('SELECT id_user FROM utilisateurs WHERE username = "'.$username.'"');
            
            $row = $requete->fetch();
        if($row)
        {
            $results['error'] = true;
            $results['message'] = "Le pseudo est déjà pris";
        }}}
            

          
   
}
  echo json_encode($results);
  

?>
