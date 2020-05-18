<?php

    try{
        $db= new PDO('mysql:host=localhost;dbname=projet;charset=utf8', 'root', '');
    }
    catch(Exception $e)
    {
        die ('ereeur '.$e->getMessage());
    }
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $results['username'] = "";
      $results['email'] = "";
      $results['sexe']="";
      $results['date']="";
      $results['password']="";

      if(isset($_POST)){
           if(!empty($_POST['id_user']))
                {
                     $id_user = $_POST['id_user'];
                     
            $select = $db->query('SELECT username,sexe,date_naissance,email,password FROM utilisateurs WHERE id_user="'.$id_user.'"');
           
             $row = $select->fetch();

              $results['username'] = $row['username'];
      $results['email'] = $row['email'];
      $results['sexe']=$row['sexe'];
      $results['date']=$row['date_naissance'];
      $results['password']=$row['password'];
      }
        
}    


echo json_encode ($results);
                         
                    ?>