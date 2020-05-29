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
     $results['niveau1'] = "";
      $results['niveau2'] = "";
      $results['niveau3']="";
      $results['error']=false;
      $results['message']="";
    
      
     if(isset($_POST)){
     if(!empty($_POST['id_user'])){
       
        $id_user=$_POST['id_user'];
        
          $req1=$db->query("SELECT id_niveau,num_niveau,etat_niveau,eval_niv FROM niveaux WHERE id_user='$id_user'");
          while($rows1=$req1->fetch()){
           switch ($rows1['num_niveau'])
            {
                case 1:
                                    $id_niv1=$rows1['id_niveau'];
                                    $results['id_niveau_1']=$id_niv1;
                                    switch ($rows1['etat_niveau']){
                                      case 0 :
                                        $results['niveau1'] ="blocked";
                                      break;
                                      case 1:
                                        switch ($rows1['eval_niv']) {
                                            case 0 ;
                                            $results['niveau1']="unblocked";
                                            break;
                                            case 1;
                                            $results['niveau1']="onestar";
                                            break;
                                            case 2;
                                            $results['niveau1']="twostars";
                                            break;
                                            case 3;
                                            $results['niveau1']="threestars";
                                            break;
                                            default: break;
                                        }



                                      break;
                                      default: break;
                                    }


                                     
                break;
                case 2:
                                   $id_niv2=$rows1['id_niveau'];
                                      switch ($rows1['etat_niveau']){
                                      case 0 :
                                        $results['niveau2'] ="blocked";
                                      break;
                                      case 1:
                                        switch ($rows1['eval_niv']) {
                                            case 0 ;
                                            $results['niveau2']="unblocked";
                                            break;
                                            case 1;
                                            $results['niveau2']="onestar";
                                            break;
                                            case 2;
                                            $results['niveau2']="twostars";
                                            break;
                                            case 3;
                                            $results['niveau2']="threestars";
                                            break;
                                            default: break;
                                        }



                                      break;
                                      default: break;
                                    }

                 break;    
                case 3:
                                     $id_niv3=$rows1['id_niveau'];
                                      switch ($rows1['etat_niveau']){
                                      case 0 :
                                        $results['niveau3'] ="blocked";
                                      break;
                                      case 1:
                                        switch ($rows1['eval_niv']) {
                                            case 0 ;
                                            $results['niveau3']="unblocked";
                                            break;
                                            case 1;
                                            $results['niveau3']="onestar";
                                            break;
                                            case 2;
                                            $results['niveau3']="twostars";
                                            break;
                                            case 3;
                                            $results['niveau3']="threestars";
                                            break;
                                            default: break;
                                        }



                                      break;
                                      default: break;
                                    }

                 break;
                 default:
                   $results['error']=true;
                    
                    
                     
                    
            } 

        }

      }
       else{
        $results['error']=true;
        $results['message']="id_ vide";
            
       }
  }
        
        echo json_encode($results); 
?>