<?php

$host="ec2-54-175-117-212.compute-1.amazonaws.com";
$user="avcbhofmvdyimr";
$password="9293fa13e288c9f59e28d1160c1ff2990de396746eba97f34492fb9e97cd776d";
$dbName="d99or182kh1tu3";
$port = "5432";

   try{
       $dsn = "pgsql:host=" . $host . ";port=" . $port .";dbname=" . $dbName . ";user=" . $user . ";password=" . $password.";" ;
       $db = new PDO($dsn, $user, $password);
       $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
       $db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
       $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     }
     catch (PDOException $e) {
    echo "oooops sorry something went wrong with the connection :( <br>".$e->getMessage();
     }
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