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
                    if(!empty($_POST['id_note']))
                    {
                       
                         $id_note=$_POST['id_note'];
        
                         $del_note= $db->query("DELETE FROM bloc_note WHERE id_note='$id_note'");
                         
                         $tst=$db->query("SELECT note FROM bloc_note WHERE id_note='$id_note'");
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