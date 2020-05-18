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
      
          if(isset($_POST)){
                    if(!empty($_POST['id_note']))
                    {
                       
                         $id_note=$_POST['id_note'];
        
                         $del_note= $db->query('DELETE FROM bloc_note WHERE id_note="'.$id_note.'"');
                         
                         $tst=$db->query('SELECT note FROM bloc_note WHERE id_note="'.$id_note.'" ');
                          $tab= $tst->fetchALL();
                                   $taille=count($tab);
                                  if($taille ==0){
                                      $results['error'] = false;
                                       $results['message'] = "Supression avec sucès";
                                  }
                                  else{
                                    $results['error'] = true;
                                       $results['message'] = "Echec de supression";
                                  }
                    }
                    else
                    {
                           $results['error'] = true;
                            if(empty ($_POST['id_user']) ){$results['message']="id_user n'est pas remplie";}
                            elseif(empty ($_POST['num_note']) ){$results['message']="num_note vide";}
                    }
           }
         echo json_encode ($results);
    ?>