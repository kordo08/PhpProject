

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
