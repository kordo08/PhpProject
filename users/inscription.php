<?php

    try{
        $db= new PDO('mysql:host=localhost;dbname=projet;charset=utf8', 'root', '');
    }
    catch(Exception $e)
    {
        die ('ereeur '.$e->getMessage());
    }
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $results['error'] = false;
      $results['message'] = "";
      $results['id_user']=0;
      if(isset($_POST)){
           if(!empty($_POST['username']) && !empty($_POST['sexe']) && !empty($_POST['date']) &&!empty($_POST['email']) &&
       !empty($_POST['password']))
                {
                     $username = $_POST['username'];
                      $password = $_POST['password'];
                      $email = $_POST['email'];
                      $date = $_POST['date'];
                       $sexe = $_POST['sexe'];
            
            $inser = $db->query('INSERT INTO utilisateurs(username,sexe,date_naissance,email,password)
                                VALUES ("'.$username.'" ,"'.$sexe.'","'.$date.'","'.$email.  '","'.$password.'")');
            $req_id = $db->query('SELECT id_user FROM utilisateurs WHERE username = "'.$username.'"');
             $row = $req_id->fetch();
              $id=$row['id_user'];
                                   if($id != 0)
                                    {
                                        $results['error'] = false;
                                          $results['message']= "Inscription terminée avec succès";
                                           $results['id_user']=$id;
                                     }
                                    else{
                                         $results['error'] = true;
                                          $results['message']= "Erreur durant inscription";
                                           $results['id_user']=0;
                                     }
          
                }
      }
           else{
          $results['error'] = true;
          if(empty ($_POST['username']) ){$results['message']="Pseudo n'est pas remplie";}
          elseif(empty ($_POST['sexe']) ){$results['message']="sexe  n'est pas remplie";}
           elseif(empty ($_POST['date']) ){$results['message']="date n'est pas remplie";}
            elseif(empty ($_POST['email']) ){$results['message']="email n'est pas remplie";}
             elseif(empty ($_POST['password']) ){$results['message']="password n'est pas remplie";}
         
        
    }
   
    


echo json_encode ($results);
                         
                    ?>