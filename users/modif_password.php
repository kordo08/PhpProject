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
                   if(!empty($_POST['id_user']) && !empty($_POST['oldpassword']) && !empty($_POST['newpassword'])
                      && !empty($_POST['newpasswordconf']) )
                   {
                     $id_user=$_POST['id_user'];
                     $password1=$_POST['oldpassword'];
                     $password2=$_POST['newpassword'];
                     $password22=$_POST['newpasswordconf'];
     
                        $req1=$db->query("SELECT password FROM utilisateurs WHERE id_user = '$id_user'");
                        $row1= $req1->fetch();
                        $an_pass=$row1['password'];
                        if(strcmp($an_pass,$password1)!=0)
                        {
                            $results['error'] = true;
                            $results['message'] = "ancien mot de passe incorrect";
                        }
                        else{
                            if (strlen($password2) < 8)
                            {
                                $results['error'] = true;
                               $results['message'] = "Nouveau mot de passe trop court,il faut 8 caractères au minimum";
                            }
                            else{
                                
                                if (preg_match('#^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W)#', $password2))
                                {
                                    if(strcmp($password2,$password22)!=0)
                                    {
                                       $results['error'] = true;
                                       $results['message'] = "Les deux saisies du nouveau mot de passe ne sont pas identiques"; 
                                    }
                                    else{
                                        $rcp1 = $db->query("UPDATE utilisateurs SET password='$password22'
                                                           WHERE id_user='$id_user'");
                                       $req_pas = $db->query("SELECT password FROM utilisateurs WHERE id_user = '$id_user'");
                                       $row = $req_pas->fetch();
                                       $pas=$row['password'];
                                      if(strcmp($pas,$password22)==0)
                                      {
                                       $results['error'] = false;
                                       $results['message'] = "Modification avec succés";
                                      }
                                      else{
                                       $results['error'] = true;
                                       $results['message'] = "Modification a échoué"; 
                                      }
                                    }
                  

                                }
                                else{
                                 $results['error'] = true;
                                 $results['message'] = "Un bon mot de passe doit contenir des: lettres minuscules, majuscules,chiffres et caractères spéciaux";    
                                }
                            }
                        }
                        
                   }
                   else{
                    $results['error'] = true;
                    if(empty ($_POST['id_user']) ){$results['message']="id_user vide";}
                    elseif(empty ($_POST['oldpassword']) ){$results['message']="Ancien mot de passe vide";}
                    elseif(empty ($_POST['newpassword']) ){$results['message']="Nouveau mot de passe vide";}
                    
                   }
       }
       echo json_encode($results);
?>