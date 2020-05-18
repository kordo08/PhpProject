<?php 
//ROLE : retourne les informations sur les 3 niveaux d'un utilisateur "niveauX:blocked,0stars,1,2 or 3stars"
function user_niveau_info(&$result,$id_user){
include("connexion.php");
  
	   $result_niv = $connexion->query('SELECT * FROM niveaux WHERE id_user="'.$id_user.'"');
	   $niv=$result_niv->fetchAll();
        
	    for ($i =0;$i<count($niv);$i++)
      {
        	$id_niveau=$niv[$i]["id_niveau"];
        	$num_niveau=$niv[$i]["num_niveau"]; 
        	$etat_niveau=$niv[$i]["etat_niveau"];
        	$evaluation_niveau=$niv[$i]["eval_niv"];
        if ($num_niveau==1)
        	{
            switch($etat_niveau)
            {
        	   case 0 ;
        	   $result['Niveau1']='blocked';
             break;
             case 1;
             switch($evaluation_niveau)
             {
        	    case 0 ;
        	    $result['Niveau1']='unblocked';
              break;
              case 1;
              $result['Niveau1']='onestar';
              break;
              case 2;
              $result['Niveau1']='twostars';
              break;
              case 3;
              $result['Niveau1']='threestars';
              break;
              default:
         
             }  
          
             break;
             default:
             
            }
          }
        else
          {
            if($num_niveau == 2) 
            {
              switch($etat_niveau)
               {
        	      case 0 ;
        	      $result['Niveau2']='blocked';
                break;
                case 1;
                switch($evaluation_niveau)
                 {
        	        case 0 ;
        	        $result['Niveau2']='unblocked';
                  break;
                  case 1;
                  $result['Niveau2']='onestar';
                  break;
                  case 2;
                  $result['Niveau2']='twostars';
                  break;
                  case 3;
                  $result['Niveau2']='threestars';
                  break;
                  default:
                  echo "l evaluation est incorrecte ";
                 }  
                break;
                default:
                
               }
            }
            else {
            		if($num_niveau==3){
            				switch($etat_niveau)
                    {
        	            case 0 ;
        	            $result['Niveau3']='blocked';
                      break;
                      case 1;
                      switch($evaluation_niveau)
                       {
        	              case 0 ;
        	              $result['Niveau3']='unblocked';
                        break;
                        case 1;
                        $result['Niveau3']='onestar';
                        break;
                        case 2;
                        $result['Niveau3']='twostars';
                        break;
                        case 3;
                        $result['Niveau3']='threestars';
                        break;
                        default:
                      
                       }  
                    break;
                    default:
                    ;
                    }
                }
                
            		}
            }
          } 

        }
            ?>
            