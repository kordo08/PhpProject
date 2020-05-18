<?php
 try{
        $db= new PDO('mysql:host=localhost;dbname=projet;charset=utf8', 'root', '');
    }
    catch(Exception $e)
    {
        die ('ereeur '.$e->getMessage());
    }
     $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
       if(isset($_POST)){
             if(!empty($_POST['id_theme'])){
             
            $id_th=$_POST['id_theme'];
      
              $req=$db->query('SELECT id_cours,titre_cours,etat_lecon,eval_lecon FROM cours WHERE  id_theme = "'.$id_th.'"');
              $tab_cours=$req->fetchAll();
              
           }
            
     }
           
         echo json_encode($tab_cours);
 ?>      