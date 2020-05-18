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
        if(!empty($_POST['id_user']) && !empty($_POST['num_niv']))
           {
            $id_user=$_POST['id_user'];
            $num_niv=$_POST['num_niv'];
       /*        $id_user=1;
            $num_niv=1;*/
            
            $req1=$db->query('SELECT id_niveau FROM niveaux WHERE num_niveau = "'.$num_niv.'" AND id_user = "'.$id_user.'"');
            $row1= $req1->fetch();
            $id_niv=$row1['id_niveau'];
            
            
            $req2=$db->query('SELECT id_theme FROM themes WHERE titre_theme ="signalisation" AND id_niveau = "'.$id_niv.'"');
             $row2= $req2->fetch();
            $id_th=$row2['id_theme'];
            
            switch ($num_niv)
            {
              case 1:
               $req3=$db->query('SELECT id_cours FROM cours WHERE titre_cours = "danger" AND id_theme = "'.$id_th.'"');
                $row3= $req3->fetch();
                $id_cour=$row3['id_cours'];
                 $id_coursf=$id_cour+6;
                break;
               case 2:
                $req4=$db->query('SELECT id_cours FROM cours WHERE titre_cours = "obligation" AND id_theme = "'.$id_th.'"');
                $row4= $req4->fetch();
                $id_cour=$row4['id_cours'];
                 $id_coursf=$id_cour+6;
                break;
               case 3:
                $req5=$db->query('SELECT id_cours FROM cours WHERE titre_cours = "indication" AND id_theme = "'.$id_th.'"');
                $row5= $req5->fetch();
                $id_cour=$row5['id_cours'];
                 $id_coursf=$id_cour+5;
                break;
                default:
                break;
            }
           
           
            
            $req6=$db->query('SELECT titre_cours,eval_lecon,etat_lecon,id_cours FROM cours WHERE id_cours BETWEEN "'.$id_cour.'" AND"'.$id_coursf.'"');
             $tab_trace= $req6->fetchALL();
           
             
            
             }
            
    }
     
          echo json_encode($tab_trace);
 ?>