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
      $results['id_note'] = 0;
      

     if(isset($_POST)){
        if(!empty($_POST['id_user']) && !empty($_POST['note']) && !empty($_POST['num_note']))
        {
            $id_user=$_POST['id_user'];
            $note=$_POST['note'];
            $num_note=$_POST['num_note'];
            
            $add_note= $db->query("INSERT INTO bloc_note VALUES ('' ,'$num_note','$note','$id_user')");
            
            $req_id = $db->query("SELECT id_note FROM bloc_note WHERE note = '$note' AND num_note = '$num_note' ");
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