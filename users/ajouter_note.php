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
      $results['id_note'] = 0;
      

     if(isset($_POST)){
        if(!empty($_POST['id_user']) && !empty($_POST['note']) && !empty($_POST['num_note']))
        {
            $id_user=$_POST['id_user'];
            $note=$_POST['note'];
            $num_note=$_POST['num_note'];
            
            $add_note= $db->query("INSERT INTO bloc_note VALUES ('' ,'.$num_note.','$note','.$id_user.')");
            
            $req_id = $db->query('SELECT id_note FROM bloc_note WHERE note = "'.$note.'"AND num_note = "'.$num_note.'" ');
             $row = $req_id->fetch();
              $id=$row['id_note'];
                                   if($id != 0)
                                    {
                                          $results['error'] = false;
                                          $results['message']= "Insertion terminée avec succès";
                                          $results['id_note']=$id;
                                     }
                                    else{
                                         $results['error'] = true;
                                          $results['message']= "Erreur durant insertion";
                                           
                                     }
          
        }
        else
        {
             $results['error'] = true;
          if(empty ($_POST['id_user']) ){$results['message']="id_user n'est pas remplie";}
          elseif(empty ($_POST['note']) ){$results['message']="note  n'est pas remplie";}
           elseif(empty ($_POST['num_note']) ){$results['message']="num_note vide";}
          
        }
      }
      echo json_encode ($results);
?>