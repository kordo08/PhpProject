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
        if(!empty($_POST['id_user']) )
           {
            $id_user=$_POST['id_user'];
              
               $req=$db->query('SELECT num_note,note,id_note FROM bloc_note WHERE id_user="'.$id_user.'"');
                $tab_note= $req->fetchALL();
           }
           else{
            $results['error'] = true;
            $results['message']="id_user n'est pas remplie";
           }
    }
     echo json_encode ($tab_note);
?>