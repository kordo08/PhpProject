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
        
         if(!empty($_POST['id_user']) && !empty($_POST['username']) && !empty($_POST['sexe']) && !empty($_POST['date'])
            &&!empty($_POST['email']) && !empty($_POST['password']))
       
                {
                    
                      $username = $_POST['username'];
                       $password = $_POST['password'];
                       $email = $_POST['email'];
                       $date = $_POST['date'];
                       $sexe = $_POST['sexe'];
                       $id_user=$_POST['id_user'];
 /*
                        $username = "sousou";
                       $password = "motdepasse";
                       $email = "souhila@gmail.com";
                       $date = "2020/04/24";
                       $sexe = "fille";
                       $id_user="1";*/
                      
                      // contoles de validite de pesudo
                      
                        if(strlen($username) < 2 || strlen($username) > 15)
                      {
                         $results['error'] = true;
                         $results['message']= "votre pseudo doit contenir entre 5 et 15 caracteres";
                      }
                        else{
                             if(preg_match("#[ .,?;:!/]#", $username))
                             {
                                $results['error'] = true;
                                $results['message']="votre pseudo ne doit pas contenir d'éspaces ou de signes de ponctuations" ;
                             }
                             else{
                                   $rcp = $db->query("SELECT password FROM utilisateurs WHERE id_user != '$id_user' AND
                                                     username='$username'");
                                   $tab= $rcp->fetchALL();
                                   $taille=count($tab);
                                  if($taille !=0){
                                    // existe ce pesudo déja dans la table
                                    $results['error'] = true;
                                    $results['message']= "Le pseudo est déjà pris";
                                   
                                  }
                                  else{
                                    // nouveau pesudo n'existe pas dans la table  
                                    $rcp1 = $db->query("UPDATE utilisateurs SET username='$username',sexe ='$sexe',
                                                       date_naissance='$date',email='$email',password='$password'
                                                       WHERE id_user='$id_user'");
                                     $req_id = $db->query("SELECT id_user FROM utilisateurs WHERE username = '$username'");
                                     $row = $req_id->fetch();
                                      $id=$row['id_user'];
                                      if($id == $id_user)
                                      {
                                        $results['error'] = false;
                                          $results['message']= "Modification terminée avec succès";
                                      }
                                      else{
                                        $results['error'] = true;
                                          $results['message']= "Erreur durant la modification";
                                      }
                                  }
                             }
                        }
                      
         /* */     }
               else{
                    $results['error'] = true;
                    if(empty ($_POST['id_user']) ){$results['message']="id_user vide";}
                    elseif(empty ($_POST['username']) ){$results['message']="Pseudo n'est pas remplie";}
                    elseif(empty ($_POST['sexe']) ){$results['message']="sexe  n'est pas remplie";}
                    elseif(empty ($_POST['date']) ){$results['message']="date n'est pas remplie";}
                    elseif(empty ($_POST['email']) ){$results['message']="email n'est pas remplie";}
                    elseif(empty ($_POST['password']) ){$results['message']="password n'est pas remplie";}
            }
      }
      echo json_encode ($results);
              
?>