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
      $results['theme1']= "";
      $results['theme2']= "";
      $results['theme3']= "";
      $results['test']="";
      $results['id_theme1']= "";
          

   
   if(isset($_POST)){
             if(!empty($_POST['id_niveau'])){
            $id_niv=$_POST['id_niveau'];
                $req=$db->query('SELECT id_theme,titre_theme,etat_theme,eval_theme FROM themes WHERE  id_niveau = "'.$id_niv.'"');
                while($rows=$req->fetch())
                    {
                        switch ($rows['titre_theme'])
                         {
                              case "signalisation": 

                              $results['id_theme1']=$rows['id_theme'];
                                  switch ($rows['etat_theme']) {
                                    case 0:
                                      $results['theme1'] ="blocked";
                                      break;
                                      case 1:
                                          switch ($rows['eval_theme'] ) {
                                            case 0:
                                              $results['theme1'] ="unblocked";
                                              break;
                                              case 3:
                                               $results['theme1'] ="threestars";
                                                break;
                                            
                                            default:
                                            
                                              break;
                                          }
                                      break;
                                    
                                    default:
                                    
                                      break;
                                  }
                               
                              break;
                              case "circulation":
                                switch ($rows['etat_theme']) {
                                    case 0:
                                      $results['theme2'] ="blocked";
                                      break;
                                      case 1:
                                          switch ($rows['eval_theme'] ) {
                                            case 0:
                                              $results['theme2'] ="unblocked";
                                              break;
                                              case 3:
                                               $results['theme2'] ="threestars";
                                                break;
                                            
                                            default:
                                            
                                              break;
                                          }
                                      break;
                                    
                                    default:
                                   
                                      break;
                                  }
                               
                              break;
                              case "divers":
                                  switch ($rows['etat_theme']) {
                                    case 0:
                                      $results['theme3'] ="blocked";
                                      break;
                                      case 1:
                                          switch ($rows['eval_theme'] ) {
                                            case 0:
                                              $results['theme3'] ="unblocked";
                                              break;
                                              case 3:
                                               $results['theme3'] ="threestars";
                                                break;
                                            
                                            default:
                                              # code...
                                              break;
                                          }
                                      break;
                                    
                                    default:
                                      # code...
                                      break;
                                  }
                              break;
                             default:
                             break;
                         }
                    }

                  $testniveau=$db->query('SELECT * FROM niveaux WHERE  id_niveau = "'.$id_niv.'"');
                  $etat_test=$testniveau->fetch();
                  if($etat_test["etat_test_niveau"]==0){$results["test"]="blocked";}
                  else{$results["test"]="unblocked";}
                     
 }   }
        
         echo json_encode($results);
 ?>