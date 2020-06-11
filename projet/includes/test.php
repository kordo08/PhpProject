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
         
        $id_user='1';        


  $req1=$db->query("INSERT INTO niveaux (num_niveau ,etat_niveau ,etat_test_niveau, eval_niv ,id_user) VALUES (1,true,false,0.0,'$id_user'),
                                               (2,false,false,0.0,'$id_user'),
                                              (3,false,false,0.0,'$id_user');");
   $rcp_id1 = $db->query("SELECT id_niveau FROM niveaux WHERE num_niveau = 1 && id_user= '$id_user'");
     $row1 = $rcp_id1->fetch();
    $id_niv=$row1['id_niveau'];
    
   
 
    //insertion des theme dans la table theme
            $id_niveau=$id_niv;
            for($i=0;$i<3;$i++)
            {
                 if($i==0){
                       $req211=$db->query("INSERT INTO themes  (titre_theme,etat_theme,eval_theme,video_sensibilisation,id_niveau
                       ) VALUES ('signalisation',true,0.0,'url_vedio','$id_niv')");
                          }
                       else{
                        $req211=$db->query("INSERT INTO themes  (titre_theme,etat_theme,eval_theme,video_sensibilisation,id_niveau
                        ) VALUES ('signalisation',false,0.0,'url_vedio','$id_niv')");
                          }
           
              $req222=$db->query("INSERT INTO themes  (titre_theme,etat_theme,eval_theme,video_sensibilisation,id_niveau
              ) VALUES ('circulation',false,0.0,'url_vedio','$id_niv'),
                                                            ('divers',false,0.0,'url_vedio','$id_niv');");
                                                        
               $id_niv=$id_niv+1;
            }
       
        $rcp_id2 = $db->query("SELECT id_theme FROM themes WHERE titre_theme = 'signalisation' AND id_niveau ='$id_niveau'");
              $row2 = $rcp_id2->fetch();
               $id_th=$row2['id_theme'];
               $id_theme=$id_th;
               
 //***********************************************insertion des cours
   //theme1
 $req3=$db->query("INSERT INTO cours (titre_cours
,etat_lecon,eval_lecon,id_theme) VALUES ('danger',true,0,'$id_th'),
                                            ('intersection',false,0,'$id_th');");
              
 //theme2
$id_th=$id_th+1;

$req4=$db->query("INSERT INTO cours (titre_cours
,etat_lecon,eval_lecon,id_theme) VALUES ('sans panneau-partie1',false,0,'$id_th'),
                                           ('sans panneau-partie2',false,0,'$id_th') ; ");
  
                                                                                                              
              
 //theme3
 $id_th=$id_th+1;
$req5=$db->query("INSERT INTO cours (titre_cours
,etat_lecon,eval_lecon,id_theme) VALUES ('Categorie B',false,0,'$id_th'),
                                           ('L\'eclerage',false,0,'$id_th'),
                                           ('Urgences, bus et véhicules encombrants',false,0,'$id_th'); ");
                                            
                 
                 
                                                                                            
                 
               
                 
//theme4
$id_th=$id_th+1;

 $re6=$db->query("INSERT INTO cours (titre_cours
,etat_lecon,eval_lecon,id_theme) VALUES ('obligation',false,0,'$id_th'),
                                           ('interdiction',false,0,'$id_th'); ");
                                                                                                        
                
//theme5
$id_th=$id_th+1;
$req7=$db->query("INSERT INTO cours (titre_cours
,etat_lecon,eval_lecon,id_theme) VALUES ('avec panneau-partie1',false,0,'$id_th'),
                                           ('avec panneau-partie2',false,0,'$id_th');");
                
//theme6
$id_th=$id_th+1;
 $req8=$db->query("INSERT INTO cours (titre_cours
,etat_lecon,eval_lecon,id_theme) VALUES ('La vitesse',false,0,'$id_th'),
                                            ('Les distances de sécurité',false,0,'$id_th'),
                                            ('L\'arrêt et le stationnement',false,0,'$id_th');  ");
                                          
 //theme7
 $id_th=$id_th+1;
                $req9=$db->query("INSERT INTO cours (titre_cours
,etat_lecon,eval_lecon,id_theme) VALUES ('indication',false,0,'$id_th'),
                                                           ('temporaire',false,0,'$id_th');");
               
//theme8
$id_th=$id_th+1;
$req10=$db->query("INSERT INTO cours (titre_cours
,etat_lecon,eval_lecon,id_theme) VALUES ('carrfours à sens giratoire',false,0,'$id_th')");
//theme9
 $id_th=$id_th+1;
$req11=$db->query("INSERT INTO cours (titre_cours
,etat_lecon,eval_lecon,id_theme) VALUES ('Les dépassements',false,0,'$id_th'),
                                            ('La conduite sur autoroute',false,0,'$id_th'),
                                           ('Conduite en conditions difficiles',false,0,'$id_th') ;");
                                         
               
                
 $rcp_id3 = $db->query("SELECT id_cours FROM cours WHERE titre_cours = 'danger' AND  id_theme = '$id_theme'");
$row3 = $rcp_id3->fetch();
 $id_co=$row3['id_cours'];
               
  $id_cours_qst=$id_co;
        // danger
$req12=$db->query("INSERT INTO questions(type_quiz,contenu,image_quiz,reponse,id_cours
) VALUES ('multi','L\'usager de la route doit faire attention à un danger :'
                                                 ,'pd_10','Pouvant ou non être précisée par un panonceau','$id_co'),
                                                    ('multi','L\'usager de la route doit faire attention à un danger :'
                                                 ,'pd_12','Débouché sur un quai ou une berge','$id_co'),
                                                 ('multi','L\'usager de la route doit faire attention à un danger :'
                                                 ,'pd_38','De succession de virages dont le premier est à droite à 1500m','$id_co'),
                                                 ('multi','L\'usager de la route doit faire attention à un danger :'
                                                 ,'pd_45','D\'une chaussée glissante à cause du verglas ','$id_co'),
                                               ('multi','Ce pannneau annonce :'
                                                 ,'pd_8','Succession de virages dont le premier est à gauche','$id_co'),
                                              ('multi','Ce pannneau annonce :'
                                                 ,'pd_9','Succession de virages dont le premier est à droite','$id_co'),
                                              ('multi','Ce pannneau annonce :','pd_19','Passage pour piéton','$id_co'),
                                              ('multi','Ce pannneau annonce :','pd_26','Ralentisseur','$id_co'),
                                              ('multi','Ce pannneau annonce :','pd_27','Cassis ou dos-d\'âne ','$id_co'),
                                              ('multi','Ce pannneau annonce :','pd_28','De feux tricolores','$id_co'),                                                
                                            ('multi','Ce pannneau annonce :','pd_20','Carrefour à sens giratoire','$id_co'),
                                            ('multi','Quelle est la source de danger :','pd_11','Descente dangereuse','$id_co'), 
                                          ('multi','Quelle est la source de danger :','pd_15','Chaussée particulièrement glissante',
                                          '$id_co'),        
                                          ('multi','Quelle est la source de danger :','pd_16',
                                          'Débouché de cyclistes venant de droite ou de gauche','$id_co'),        
                                            ('multi','Quelle est la source de danger :','pd_31','Travesée d\'une aire de danger aérien',
                                          '$id_co'),        
                                            ('multi','Quelle est la source de danger :','pd_35','Circulation dans les deux sens à 150 m',
                                          '$id_co'),        
                                            ('multi','Quelle est la source de danger :','pd_37','Passage à niveau sans barriéres,lignes éléctrifiées',
                                          '$id_co'),        
                                            ('multi','Quelle est la source de danger :','pd_31','Traversée d\'une aire de danger aérien avec barriéres gardées',
                                          '$id_co'),        
                                         ('multi','Ce panneau alerte d\'un danger:','pd_33','D\'un passage à niveau sans barriéres',
                                          '$id_co'),
                                            ('multi','Ce panneau alerte d\'un danger:','pd_34','D\'un passage à niveau muni de barriéres',
                                          '$id_co'),            
                                        ('vrai/faux','Ce panneau alerte d\'un dangeren provenance :d\'un pont mobile','pd_32',
                                        'faux', '$id_co'),
                                   ('vrai/faux','Ce panneau alerte d\'un dangeren provenance :d\'un passage de tramwa','pd_13',
                                        'faux', '$id_co'),
                                         ('vrai/faux','Ce panneau alerte d\'un danger en provenance :endroit fréquenté par les enfants',
                                        'pd_18','vrai', '$id_co'),
                                        ('vrai/faux','Ce panneau alerte d\'un dangeren provenance :d\'un passage à niveau muni de barriéres,lignes éléctrifiées','pd_36', 'vrai', '$id_co'),
                                 ('vrai/faux','Ce panneau désigne : risque de chute de pierres ou de présence sur la route de pierres tombées','pd_14','vrai','$id_co'),
                                 ('vrai/faux','Ce panneau désigne : passage d\'animaux domestiques','pd_23','faux','$id_co'),
                                 ('vrai/faux','Ce panneau désigne : passage d\'animaux sauvages','pd_21','faux','$id_co'),
                                 ('vrai/faux','Ce panneau désigne : succession de virages dont le premier est à gauche',
                                 'pd_6','faux','$id_co'),
                                 ('vrai/faux','Ce panneau désigne : sortie d\'engin', 'pd_39','vrai','$id_co'),
                                 ('vrai/faux','Ce panneau désigne : risque de chute de pierres sur 500 m ', 'pd_40'
                                 ,'vrai','$id_co'),
                                 ('vrai/faux','Ce panneau désigne : chaussée déformée', 'pd_44','vrai','$id_co'),
                                 ('vrai/faux','Ce panneau indique :circulation dans les deux sens', 'pd_1','vrai','$id_co'),
                                 ('vrai/faux','Ce panneau indique : chaussée rétrécie', 'pd_3','faux','$id_co'),
                                 ('vrai/faux','Ce panneau indique :chaussée rétrécie par la droite', 'pd_2','faux','$id_co'),
                                 ('vrai/faux','Ce panneau indique :chaussée rétrécie par la gauche', 'pd_4','vrai','$id_co'),
                                 ('vrai/faux','Ce panneau indique :passage de chameaux', 'pd_24','faux','$id_co'),
                                 ('vrai/faux','Ce panneau indique :passage de cavaliers', 'pd_25','faux','$id_co'),
                                 ('vrai/faux','Ce panneau indique :chaussée glissante à cause de la boue', 'pd_42','vrai','$id_co'),
                                 ('vrai/faux','Ce panneau indique :virage dangereux à gauche à 200 m', 'pd_43','vrai',
                                 '$id_co')
                               ;");
                                             
                                  

 $id_co=$id_co+1;
 // intersections
 $req13=$db->query("INSERT INTO questions(type_quiz
,contenu,image_quiz,reponse,id_cours
) VALUES ('multi','Ce panneau annonce:' ,'pit_1','Une route à grande circulation'
                                                   ,'$id_co'),
                                               ('multi','Ce panneau annonce:' ,'pit_2','Une route prioritaire'
                                                   ,'$id_co'),
                                               ('multi','Ce panneau annonce:' ,'pit_3','La fin d\'une route prioritaire'
                                                   ,'$id_co'),
                                               ('multi','Ce panneau est nommé:' ,'pit_4','Stop '
                                                   ,'$id_co'),
                                               ('multi','Ce panneau est nommé:' ,'pit_5','Cédez le passage '
                                                   ,'$id_co'),
                                               ('multi','Ce panneau est nommé:' ,'pit_9','Stop à 150 m '
                                                   ,'$id_co'),
                                               ('multi','Ce panneau est nommé:' ,'pit_10','Cédez le passage à 150 m'
                                                   ,'$id_co'),
                                             ('multi','L\'usager de la route doit faire attention à une:' ,'pit_7',
                                           'Intersection de deux routes secondaires dangereuses','$id_co'),
                                             ('multi','L\'usager de la route doit faire attention à une:' ,'pit_6',
                                             'Intersection de deux routes secondaires','$id_co'),
                                              ('multi','L\'usager de la route doit faire attention à une:' , 'pit_8',
                                             'Intersection de deux routes dangereusesà grande circulation','$id_co'),
                                         ('vrai/faux','L\'usager de la route doit faire attention à une: intersection de deux routes secondaires dangereuses','pit_7','vrai','$id_co'),
                                         
                                         ('vrai/faux','L\'usager de la route doit faire attention à une:intersection de deux routes secondaires dangereuses','pit_8','faux','$id_co'),
                                         
                                         ('vrai/faux','L\'usager de la route doit faire attention à une: intersection de deux routes secondaires','pit_7','faux','$id_co'),
                                         
                                         
                                         ('vrai/faux','L\'usager de la route doit faire attention à une:intersection de deux routes secondaires','pit_6','vrai','$id_co'),
                                         
                                         ('vrai/faux','L\'usager de la route doit faire attention à une:intersection de deux routes dangereuses à grande circulation','pit_7','faux','$id_co'),
                                         
                                         ('vrai/faux','L\'usager de la route doit faire attention à une: intersection de deux routes dangereuses à grande circulation','pit_8','vrai','$id_co'),
                                 
                                          ('vrai/faux','Ce panneau me prévient que je rencontrerai : un panneau (stop) à 150 m ','pit_9','vrai','$id_co'),
                                                  ('vrai/faux','Ce panneau me prévient que je rencontrerai :un panneau (cédez le passage) à 150 m','pit_10','vrai','$id_co'),
                                        ('vrai/faux','Ce panneau me prévient que je rencontrerai : un panneau (stop) à 150 m ','pit_10','faux','$id_co'),
                                                  ('vrai/faux','Ce panneau me prévient que je rencontrerai : un panneau (cédez le passage) à 150 m','pit_9','faux','$id_co'),  
                            
                            ('vrai/faux','Lorsque je rencontre ce panneau,cela signifie que: les autres usagers doivent me céder le passage à la prochaine intersection','pit_1','vrai','$id_co'),
                           ('vrai/faux','Lorsque je rencontre ce panneau,cela signifie que: je doit céder le passage à la prochiane intersection','pit_1','faux','$id_co'),
                         ('vrai/faux','Lorsque je rencontre ce panneau,cela signifie que: je circule sur une route prioritaire, je dois être vigilant quant à la signalisation pour connaitre le régles de priorité lorsque j\'aborde les prochaines  intersections','pit_2','faux','$id_co'),
                         ('vrai/faux','Lorsque je rencontre ce panneau,cela signifie que: je circule sur une route prioritaire,les autres usagers devront me céder le passage à chaque intersection','pit_2','vrai','$id_co'),
                      ('vrai/faux','Lorsque je rencontre ce panneau,cela signifie que: je dois m\'arrêter pour céder le passage aux véhicules prioritaires'
                      ,'pit_4','vrai','$id_co'),
                       ('vrai/faux','Lorsque je rencontre ce panneau,cela signifie que: les autres usagers doivent me céder le passage','pit_4','faux','$id_co'),
                    ('vrai/faux','Lorsque je rencontre ce panneau,cela signifie que:  le panneau de (cédez-le-passage) comme le panneau de stop impose l\'arret obligatoire de véhicule','pit_5','faux','$id_co'),
                    ('vrai/faux','Lorsque je rencontre ce panneau,cela signifie que: le panneau de (cédez-le-passage)  n’imposent pas l\'arrêt du véhicule.',
                    'pit_5','vrai','$id_co')
                    ;");
         

  $id_co=$id_co+1;
        // intersection_cours niv1 lecon1  
            $req14=$db->query("INSERT INTO questions(type_quiz
,contenu,image_quiz,reponse,id_cours
) VALUES ('multi','Parmis ces différents choix indiquer le plus approprié pour eviter le risque d\'accident dans le circuit suivant :' ,'exo3_01','2/1','$id_co'),
                           ('multi','Parmis ces différents choix indiquer le plus approprié pour eviter le risque d\'accident dans le circuit suivant :' ,'exo17_01','1/2','$id_co'),
                           ('multi','Parmis ces différents choix indiquer le plus approprié pour eviter le risque d\'accident dans le circuit suivant :' ,'exo28_01','2/1/3','$id_co'),
                           ('vrai/faux','Le bonne ordre de passage est: la blanche s\'engage, la rouge, la  bleue puis la rouge continue','exo10_01','vrai', '$id_co'),
                            ('vrai/faux','Le bonne ordre de passage est: la bleue s\'engage, la rouge, la verte puis la bleue continue','exo11_01','faux', '$id_co'),
                            ('vrai/faux','Le bonne ordre de passage est: la rouge s\'engage, la jaune, la bleue puis la rouge continue','exo35_01','vrai', '$id_co')
                           
                           ;");
      $id_co=$id_co+1;
        // intersection_cours niv1 lecon2 
        $req15=$db->query("INSERT INTO questions(type_quiz
,contenu,image_quiz,reponse,id_cours
) VALUES ('multi','Parmis ces différents choix indiquer le plus approprié pour eviter le risque d\'accident dans le circuit suivant :' ,'exo41_01','1/2','$id_co'),
                           ('multi','Parmis ces différents choix indiquer le plus approprié pour eviter le risque d\'accident dans le circuit suivant :' ,'exo42_01','2/3/1','$id_co'),
                            ('multi','Parmis ces différents choix indiquer le plus approprié pour eviter le risque d\'accident dans le circuit suivant :' ,'exo43_01','1/2/3','$id_co'),
                           ('vrai/faux','L\'ordre de passage indiqué ci dessus evite-il le risque d\'accident ?: ',
                           'exo44_01','vrai', '$id_co'),
                            ('vrai/faux','L\'ordre de passage indiqué ci dessus evite-il le risque d\'accident ?: ',
                            'exo46_01','vrai', '$id_co'),
                            ('vrai/faux','Dans ce cas d\'absence de panneau et présence de balise la règle de la priorité à droite s\'applique.','exo45_01','vrai', '$id_co')
                           ;");
       $id_co=$id_co+1;
        // intersection_cours niv1 diver1
       $req16=$db->query("INSERT INTO questions(type_quiz
,contenu,image_quiz,reponse,id_cours
) VALUES ('multi','Quelle est la durée de validité du Permis B ?','','10 ans','$id_co'),
                                                       ('multi','Avec un permis B, quel est le nombre maximal de passagers peut-on transporter ?' ,'','Le conducteur plus 8 passagers au maximum','$id_co'),
  ('multi','Quelle catégorie de permis vous passez ?' ,'','Je passe le permis de catégorie  B  Age requis 17 ans et 6 mois et plus, je peux conduire un véhicule dont le poids total est moins de 3,5 T','$id_co'), 
      /*    ('multi','Comment distinguer le nouveau pilote ?' ,'','Par limite de vitesse inférieure à 80 km/h est apposée à l\'arrière du véhicule','$id_co'),*/
                                            
('vrai/faux','Le poids maximal du matériels qui peut etre transporter par un véhicule conduisiez avec un permis B est: 3.5 tonnes','','vrai', '$id_co'),
('vrai/faux','L\'âge légal pour s\'inscrire à l\'examen en vue de l\'obtention du permis B est de 18 ans','','vrai', '$id_co'),
('vrai/faux','Je passe le permis de catégorie  B , je peux tracter à mon véhicule une remorque de moins : de 800 Kg','','faux', '$id_co'),
('vrai/faux','Je limite ma vitesse à 80 K/h pendant : 1ans','','faux', '$id_co')
                           ;");
        
         $id_co=$id_co+1;
        // _cours niv1 diver2
       $req17=$db->query("INSERT INTO questions(type_quiz
,contenu,image_quiz,reponse,id_cours
) VALUES ('multi','S\'il pleut la journée je dois allumer les feux de :'
                                                        ,'','Position uniquement','$id_co'),
    ('multi','S\'il neige et qu\'il fait jour je dois allumer les feux de :' ,'','Croisement uniquement','$id_co'),
 ('multi','Quand les feux de route ne peuvent-ils pas être allumés?' ,'','Si vous risquez d\'éblouir les usagers venant en sens inverse','$id_co'),
 
('multi','Les feux de croisements éclairent au minimum à :' ,'','30 mètres','$id_co'),
 ('vrai/faux','La nuit pour prévenir de mon approche dans une intersection dangereuse je peux faire un appel lumineux','','vrai', '$id_co'),
('vrai/faux','Les feux de position me permettent : d\'être vu par les autres usagers',
                                        '','vrai', '$id_co'),
('vrai/faux','Il fait nuit sans éclairage et personne à l\'avant, j\'utilise les feux de: position ','','faux', '$id_co'),
('vrai/faux','Les feux de position seuls sont suffisants en cas d\'intempéries:',
                                        '','faux', '$id_co'),
 ('vrai/faux',' L\’utilisation des feux de route en ville ou des feux de brouillard arrière par temps de pluie, puissent représenter un usage abusif des feux',
                                        '','vrai', '$id_co')
                                        ;");
                                        
                                        
                                            
                        
       
         $id_co=$id_co+1;
        // _cours niv1 diver3
       $req18=$db->query("INSERT INTO questions(type_quiz
,contenu,image_quiz,reponse,id_cours
) VALUES
   ('multi','Pour le conducteur à deux roues par rapport à une voiture :','','Moins facile à détecter','$id_co'),
 ('multi','Un véhicule d\'intervention d\'urgence est :','','Prioiritaire uniquement si le gyrophare ou la sirène est activée','$id_co'),
 ('multi','Un usager vulnérable est:','','Un usager qui n\'a pas ou peu de protections','$id_co'),
 ('multi','Un choc à 50 km/h les chances de survie d\'un piéton est de:' ,'','20 %','$id_co'),
('multi','Un choc à 30 km/h les chances de survie d\'un piéton est de:','','80 %','$id_co'),
                         
 ('vrai/faux','Plus il est haut ,plus le conducteur d\'un véhicule peut voir ce qui se passe immédiatement devant lui','','faux', '$id_co'),
 ('vrai/faux','Lorsqu\'il tourne, le conducteur d\'un véhicule articulé ne voit plus rien dans le rétroviseur situé du côté où il tourne','','vrai', '$id_co'),
('vrai/faux','Pour dépasser un usager vulnérable en ville la distance minimale à respecter est de : 2 mètres','','faux', '$id_co'),
('vrai/faux','Pour dépasser un usager vulnérable en dehors de la ville la distance minimale à respecter est de : 1,5 mètre','','vrai', '$id_co'),
('vrai/faux','Un véhicule de police en intervention est : prioritaire','','vrai', '$id_co')
                         ;");
       
         $id_co=$id_co+1;
                // _cours  obligation 
       $req20=$db->query("INSERT INTO questions(type_quiz
,contenu,image_quiz,reponse,id_cours
) VALUES ('multi','Que signifie ce panneau ?' ,'po_1','Direction obligatoire
                                                        à la prochaine intersection : tout droit','$id_co'),
                                                        ('multi','Que signifie ce panneau ?', 'po_4','Obligation de
                                                        tourner à gauche avant le panneau','$id_co'),
                                                        ('multi','Que signifie ce panneau ?' ,'po_5','Obligation de
                                                        tourner à droite avant le panneau','$id_co'),
                                                        ('multi','Que signifie ce panneau ?' ,'po_11','Bande obligatoire pour
                                                        les cyclistes','$id_co'),
                                                        ('multi','Que signifie ce panneau ?','po_12' ,'Voie obligatoire pour
                                                        les cavaliers','$id_co'),
                             ('multi','Que signifie ce panneau ?','po_20' ,'Sens giratoire obligatoire','$id_co'),
                 ('multi','Que signifie ce panneau ?' ,'po_26','Fin de l\'obligation d\'utiliser des chaînes à neige','$id_co'),
        ('multi','Que signifie ce panneau ?','po_27' ,'Fin de voie résérvée aux tramways','$id_co'),
        ('multi','Ce panneau indique une obligation de:','po_2' ,'Contournement par la gauche','$id_co'),
     ('multi','Ce panneau indique une obligation de:','po_3' ,'Contournement par la droite','$id_co'),
     ('multi','Il s\'agit d\'une obligation d\'aller:','po_6' ,'A gauche à la prochaine intersection','$id_co'),
      ('multi','Il s\'agit d\'une obligation d\'aller:','po_7' ,'A droite à la prochaine intersection','$id_co'),
  ('multi','Il s\'agit d\'une obligation d\'aller:' ,'po_8', 'A droite ou à gauche à la prochaine intersection','$id_co'),
('multi','Il s\'agit d\'une obligation d\'aller:' ,'po_9', 'Tout droit ou à gauche à la prochaine intersection','$id_co'),
        ('multi','Il s\'agit d\'une obligation d\'aller:','po_10' ,'Tout droit ou à droite à la prochaine intersection','$id_co'),
                                                        
                                                        
                                     ('vrai/faux','Les chaines à neige sont obligatoires sur au moins deux roues motrices ?',
                                         'po_18','vrai','$id_co'),
                                    ('vrai/faux','Le chemin concerné est obligatoire pour les piétons',
                                         'po_15','vrai','$id_co'),
                                   ('vrai/faux','Il est interdit de rouler à 50 km/h',
                                         'po_19','faux','$id_co'),
                                         ('vrai/faux','Ce panneau annonce: fin devoie obligatoire pour les piétons',
                                         'po_22','faux','$id_co'),
                                         ('vrai/faux','Ce panneau annonce: fin de bande obligatoire pour les cyclistes',
                                         'po_21','faux','$id_co'),
                                         ('vrai/faux','Ce panneau annonce: debut de voie obligatoire pour les cavaliers',
                                         'po_23','faux','$id_co'),
                                         ('vrai/faux','Ce panneau annonce: fin de voie résérvée aux véhicules de transport
                                         en commun','po_24','vrai','$id_co'),
                                         ('vrai/faux','Ce panneau annonce: fin de l\'obligation d\'allumer les feux'
                                       ,'po_25','vrai','$id_co'),
                                         ('vrai/faux','Il est obligatoire de rouler à 30 km/h',
                                         'po_28','faux','$id_co'),
                                         ('vrai/faux','Ce panneau indique: une voie résérvée aux véhicules de transport
                                         en commun','po_14','faux','$id_co'),
                                         ('vrai/faux','Ce panneau indique: une voie résérvée aux véhicules de transport
                                         en commun','po_14','faux','$id_co'),
                                         ('vrai/faux','Ce panneau indique: voie résérvée aux tramways',
                                         'po_13','faux','$id_co'),
                                         ('vrai/faux','Ce panneau indique: voie obligatoire pour les piétons',
                                         'po_15','vrai','$id_co'),
                                         ('vrai/faux','Ce panneau indique: voie résérvée aux véhicules lents',
                                         'po_17','vrai','$id_co'),
                                         ('vrai/faux','Est il obligatoire d\'allumer les feux ?',
                                         'po_16','vrai','$id_co')
                                          ;");
                                     
                                                       
                                                     
                                                       
                         
                         
         $id_co=$id_co+1;
        // _cours interdiction
       $req19=$db->query("INSERT INTO questions(type_quiz
,contenu,image_quiz,reponse,id_cours
) VALUES ('multi','Ce panneau signifie qu\'il est interdit:','pir_11',
                         'Aux véhicules agricoles à moteur d\'accéder','$id_co'),
                                                      ('multi','Ce panneau signifie qu\'il est interdit:','pir_12',
                                                      'Aux véhicules tractant une caravane ou une remorque','$id_co'),
                                                      ('multi','Ce panneau signifie qu\'il est interdit:','pir_13',
                                                      'Aux véhicules de transport de marchadises','$id_co'),
                                                      ('multi','Ce panneau signifie qu\'il est interdit:','pir_14',
                                                      'Aux véhicules de transport en commun','$id_co'),
                                                      ('multi','Ce panneau signifie qu\'il est interdit:','pir_15',
                                                      'Aux véhicules dont le poids sur esieu est supérieur à 2,5 t','$id_co'),
                                                      ('multi','Ce panneau signifie qu\'il est interdit:','pir_16',
                                                      'Aux transport de produits explositifs ou inflammables','$id_co'),
                                                      ('multi','Ce panneau signifie qu\'il est interdit:','pir_17',
                                                      'Aux transports de produits de nature à polluer les eaux','$id_co'),
                                                      ('multi','Ce panneau signifie qu\'il est interdit:','pir_18',
                                                      'Aux transport des matiéres dangereuses','$id_co'),
                                                      ('multi','Ce panneau signifie qu\'il est interdit:','pir_21',
                                                      'Aux véhicules ayant une logueur de plus de 10 m','$id_co'),
                                                      ('multi','Ce panneau signifie qu\'il est interdit:','pir_26',
                                                      'De dépasser tous les véhicules','$id_co'),
                                                      ('multi','Ce panneau signifie qu\'il est interdit:','pir_27',
                                                      'Dépasser les véhicules de transport de marchandises','$id_co'),
                                                      ('multi','Ce panneau signifie qu\'il est interdit:','pir_29',
                                                      'De circuler sans maintenir un intervalle d\'au moins 70m','$id_co'),
                                                      ('multi','Ce panneau signifie qu\'il est interdit:','pir_37',
                                                      'De dépasser tous les véhicules sur 500m','$id_co'),
                                                      ('multi','Ce panneau signifie qu\'il est interdit:','pir_38',
                                                      'Aux bus de tourner à droite','$id_co'),
                                                      ('multi','Ce panneau signifie qu\'il est interdit:','pir_42',
                                                      'Aux véhicules de transport de marchandises dont le poids >19t','$id_co'),
                                                      ('multi','Ce panneau signifie qu\'il est interdit:','pir_43',
                                                      'De circuler sans maintenir une distance d\'au minimum 70m pour les
                                                      véhicules de transports de matiéres dangereuses','$id_co'),
                                                      ('multi','Ce panneau signifie qu\'il est interdit:','pir_49',
                                                      'De stationner de 7h à 20h','$id_co'),
                                                       ('multi','Ce panneau signifie qu\'il est interdit:','pir_63',
                                                      'Aux cyclomoteurs d\'arrêter et stationneer','$id_co'),
                                                        ('multi','Que signifie ce panneau:','pir_1',
                                                      'Circulation interdite dans les 2 sens','$id_co'),
                                                        ('multi','Que signifie ce panneau:','pir_2',
                                                      'Sens interdit','$id_co'),
                                                       ('multi','Que signifie ce panneau:','pir_3',
                                                      'Interdiction de tourner à gauche','$id_co'),
                                                       ('multi','Que signifie ce panneau:','pir_4',
                                                      'Interdiction de faire demi tour','$id_co'),
                                                       ('multi','Que signifie ce panneau:','pir_7',
                                                      'Accés interdit aux charettes à bras','$id_co'),
                                                       ('multi','Que signifie ce panneau:','pir_10',
                                                      'Accés interdit aux véhicules à traction animale','$id_co'),
                                                       ('multi','Que signifie ce panneau:','pir_19',
                                               'Accés interdit aux véhicules à moteur à l\'exception des cyclomoteurs','$id_co'),
                                                       ('multi','Que signifie ce panneau:','pir_20',
                                                      'Accés interdit aux véhicules à moteur','$id_co'),
                                                      ('multi','Que signifie ce panneau:','pir_30',
                                                      'Cédez le passage à la circulation venant en sens inverse','$id_co'),
                                                       ('multi','Que signifie ce panneau:','pir_40',
                                                      'Entrée d\'une zone à vitesse limitée','$id_co'),
                                                       ('multi','Que signifie ce panneau:','pir_41',
                                                      'Vitesse limitée dans la voie indiquée','$id_co'),
                                                       ('multi','Que signifie ce panneau:','pir_31',
                                                      'Halte péage','$id_co'),
                                                       ('multi','Que signifie ce panneau:','pir_32',
                                                      'Halte police','$id_co'),
                                                       ('multi','Que signifie ce panneau:','pir_33',
                                                      'Halte gendarmerie','$id_co'),
                                                       ('multi','Que signifie ce panneau:','pir_46',
                                                      'Stationnement interdit','$id_co'),
                                                       ('multi','Que signifie ce panneau:','pir_48',
                                                      'Stationnement interdit du 16 au 31 du mois','$id_co'),
                                                       ('multi','Que signifie ce panneau:','pir_53',
                                                      'Stationnement avec disque de contrôle','$id_co'),
                                                       ('multi','Que signifie ce panneau:','pir_54',
                                                      'Stationnement payant','$id_co'),
                                                       ('multi','Que signifie ce panneau:','pir_57',
                                                      'Entrée d\'une zone à stationnement interdit','$id_co'),
                                                       ('multi','Que signifie ce panneau:','pir_58',
                                                      'Entrée d\'une zone à stationnement  unilatéral semi-mensuelle','$id_co'),
                                                      ('multi','Que signifie ce panneau:','pir_60',
                                                      'Entrée d\'une zone à stationnement avec contrôle par disque','$id_co'),
                                                       ('multi','Que signifie ce panneau:','pir_61',
                                                      'Arrêt et stationnement interdits','$id_co'),
                                                       ('multi','Que signifie ce panneau:','pir_70',
                                                      'Arrêt et stationnement interdits à droite du panneau sur 60 m','$id_co'),
                                                       ('multi','Que signifie ce panneau:','pir_71',
                                                      'Fin de toutes les interdictions sauf arrêt et stationement','$id_co'),
                                                       ('multi','Que signifie ce panneau:','pir_72',
                                                      'Fin d\'interdiction de dépasser','$id_co'),
                                                       ('multi','Que signifie ce panneau:','pir_76',
                                                      'Sortie d\'une zone de stationnement interdit','$id_co'),
                            ('vrai/faux','L\'intervale de 70 m entre les 2 véhicule correspond à l\'intervalle minimum à
                                   respecter','pir_29','vrai', '$id_co'),
                                   ('vrai/faux','L\'accès interdit s\'applique aux véhicules : transportant des matières dangereuses','pir_16','faux', '$id_co'),
                          ('','vrai/faux','Le stationnement est interdit aux véhicules de transports en commun','pir_51'
                                   ,'vrai','$id_co'),
                                ('','vrai/faux','Le stationnement est intert aux véhicules de transport de marchandises','pir_52'
                                   ,'vrai','$id_co'),
                                   ('','vrai/faux','On est le Vendredi le stationnement est-ilautorisé ? ','pir_55'
                                   ,'faux','$id_co'),
                                   ('','vrai/faux','Si je stationne après le panneau est-il interdit ?','pir_56'
                                   ,'vrai','$id_co'),
                                   ('','vrai/faux','Ce panneau indique: entrée d\'une zone à stationnement avec contrôle par
                                   disque','pir_59' ,'faux','$id_co'),
                                   ('','vrai/faux','Ce panneau indique: entrée d\'une zone à stationnement  payant','pir_59'
                                   ,'vrai','$id_co'),
                                   ('','vrai/faux','Arrêt et stationnement autorisé le lundi','pir_62'
                                   ,'faux','$id_co'),
                                   ('','vrai/faux','Il est 9h 30 minute je peut stationné ','pir_64'
                                   ,'faux','$id_co'),
                                   ('','vrai/faux','Arrêt interdits aux véhicules de transport en commun','pir_65'
                                   ,'faux','$id_co'),
                                    ('','vrai/faux','Stationnement interdits aux véhicules de transport de matiéres dangereuses',
                                    'pir_66' ,'faux','$id_co'),
                                   ('','vrai/faux','Arrêt et stationnement interdits après le panneau ','pir_67'
                                   ,'faux','$id_co'),
                                    ('','vrai/faux','Arrêt et stationnement interdits à gauche du panneau','pir_68'
                                   ,'vrai','$id_co'),
                                    ('','vrai/faux','Arrêt  interdits à droite du panneau ','pir_69'
                                   ,'faux','$id_co'),
                                    ('','vrai/faux','Ce panneau interdit: la circulation des piétons ','pir_6'
                                   ,'vrai','$id_co'),
                                    ('','vrai/faux','Ce panneau interdit: l\'accés aux charettes à bras','pir_8'
                                   ,'faux','$id_co'),
                                    ('','vrai/faux','Ce panneau interdit: l\'accés aux cyclomoteurs','pir_9'
                                   ,'vrai','$id_co'),
                                    ('','vrai/faux','Ce panneau interdit: l\'accés aux véhicules ayant une logueur de plus de 10 m',
                                    'pir_22','faux','$id_co'),
                                    ('','vrai/faux','Ce panneau interdit: l\'accés aux véhicules dont la hauteur est supérieur à
                                    3,5 m','pir_22' ,'vrai','$id_co'),
                                    ('','vrai/faux','Ce panneau interdit: l\'accés aux véhicules dont le poids total en charge
                                    est supérieur à 15t ','pir_24','vrai','$id_co'),
                                     ('','vrai/faux','L\'useger peut-il dépasser 50km/h  ','pir_25','faux','$id_co'),
                                      ('','vrai/faux','La vitesse est limiter  à 60km/h dans 150 m ','pir_35','vrai','$id_co'),
                                     ('','vrai/faux','Est-il interdit aux véhicules de transport de marchandises de
                                     7 h jusqu\'à 20 h','pir_39','vrai','$id_co'),
                                      ('','vrai/faux','Est-il interdit interdit de dépasser tous les véhicules de
                                      transport de marchandises ','pir_44','faux','$id_co'),
                                       ('','vrai/faux','La vitesse est-elle limiter à 40km/h à tout type de véhicules',
                                       'pir_45','faux','$id_co')
                                         ;"); 
                          $id_co=$id_co+1;
  
        // _cour intersection niv2 lecon1
       $req21=$db->query("INSERT INTO questions(type_quiz
,contenu,image_quiz,reponse,id_cours
) VALUES ('multi','Parmis ces différents choix indiquer le plus
                           approprié pour eviter le risque d\'accident dans le circuit suivant :' ,'exo1_01','3/2/1','$id_co'),
                           ('multi','Parmis ces différents choix indiquer le plus
                           approprié pour eviter le risque d\'accident dans le circuit suivant :' ,'exo4_01','1/3/2','$id_co'),
                           ('multi','Parmis ces différents choix indiquer le plus
                           approprié pour eviter le risque d\'accident dans le circuit suivant :' ,'exo13_01','1/3/2','$id_co'),
                           ('multi','Parmis ces différents choix indiquer le plus
                           approprié pour eviter le risque d\'accident dans le circuit suivant :' ,'exo14_01','1/3/2','$id_co'),
                           ('multi','Parmis ces différents choix indiquer le plus
                           approprié pour eviter le risque d\'accident dans le circuit suivant :' ,'exo15_01','1/3/2','$id_co'),
                           ('multi','Parmis ces différents choix indiquer le plus
                           approprié pour eviter le risque d\'accident dans le circuit suivant :' ,'exo16_01','2/1','$id_co'),
                           ('multi','Parmis ces différents choix indiquer le plus
                           approprié pour eviter le risque d\'accident dans le circuit suivant :' ,'exo18_01','3/1/2','$id_co'),
                           ('multi','Parmis ces différents choix indiquer le plus
                           approprié pour eviter le risque d\'accident dans le circuit suivant :' ,'exo19_01','2/3/1','$id_co'),
                           ('multi','Parmis ces différents choix indiquer le plus
                           approprié pour eviter le risque d\'accident dans le circuit suivant :' ,'exo20_01','2/1/3','$id_co'),
                           ('multi','Parmis ces différents choix indiquer le plus
                           approprié pour eviter le risque d\'accident dans le circuit suivant :' ,'exo21_01','3/1/2','$id_co'),
                           
                           
                          ('vrai/faux','L\'ordre de passage indiqué ci dessus est-il correcte : 2/3/1',
                            'exo26_01','vrai', '$id_co'),
                           ('vrai/faux','L\'ordre de passage indiqué ci dessus est-il correcte : 2/3/1',
                            'exo29_01','faux', '$id_co'),
                           ('vrai/faux','Le véhicule qui a la prioritaire dans cet situation : rouge',
                            'exo32_01','vrai', '$id_co'),
                           ('vrai/faux','Le véhicule qui a la prioritaire dans cet situation : jaune',
                            'exo33_01','faux', '$id_co'),
                           ('vrai/faux','L\'ordre de passage indiqué ci dessus est-il correcte : 1/2',
                            'exo34_01','vrai', '$id_co'),
                           ('vrai/faux','L\'ordre de passage indiqué ci dessus est-il correcte : 2/1/3',
                            'exo37_01','faux', '$id_co'),
                           ('vrai/faux','Le véhicule de transport de marchandises qui a la priorité dans cet situation',
                            'exo38_01','vrai', '$id_co'),
                           ('vrai/faux','Le véhicule qui a la prioritaire dans cet situation : bleu',
                            'exo39_01','faux', '$id_co'),
                            ('vrai/faux','Le véhicule rouge qui passe en premier ensuite le véhicule jaune',
                            'exo40_01','vrai', '$id_co')
                           
                         ;");
          
             $id_co=$id_co+1;
        // _cour intersection niv2 lecon2
       $req22=$db->query("INSERT INTO questions(type_quiz
,contenu,image_quiz,reponse,id_cours
) VALUES ('multi','Parmis ces différents choix indiquer le plus
                           approprié pour eviter le risque d\'accident dans le circuit suivant :' ,'exo5_01','1/4/3/2','$id_co'),
                           ('multi','Parmis ces différents choix indiquer le plus
                           approprié pour eviter le risque d\'accident dans le circuit suivant :' ,'exo6_01','2/1/3','$id_co'),
                           ('multi','Parmis ces différents choix indiquer le plus
                           approprié pour eviter le risque d\'accident dans le circuit suivant :' ,'exo7_01','2/3/1','$id_co'),
                           ('multi','Parmis ces différents choix indiquer le plus
                           approprié pour eviter le risque d\'accident dans le circuit suivant :' ,'exo8_01','4/3/2/1','$id_co'),
                           ('multi','Parmis ces différents choix indiquer le plus
                           approprié pour eviter le risque d\'accident dans le circuit suivant :' ,'exo9_01','3/2/1','$id_co'),
                           
                           
                           
                           ('vrai/faux','L\'ordre de passage indiqué ci dessus est-il correcte : 1/2/3',
                            'exo12_01','vrai', '$id_co'),
                           ('vrai/faux','L\'ordre de passage indiqué ci dessus est-il correcte : 2/3/1',
                            'exo22_01','faux', '$id_co'),
                           ('vrai/faux','Le véhicule qui a la prioritaire dans cet situation : jaune',
                            'exo27_01','vrai', '$id_co'),
                           ('vrai/faux','Le véhicule qui a la prioritaire dans cet situation : rouge',
                            'exo31_01','faux', '$id_co'),
                           ('vrai/faux','Le véhicule qui a la prioritaire dans cet situation : vert',
                            'exo36_01','faux', '$id_co')
                           
                           ;");
              $id_co=$id_co+1;
        // _cours niv2 diver1
       $req23=$db->query("INSERT INTO questions(type_quiz
,contenu,image_quiz,reponse,id_cours
) VALUES ('multi','Quelle est l\'augmentation de consommation à 120km/h si on a une galerie sur le toit ?' ,'','10%','$id_co'),
  ('multi','La limite de vitesse quand il pleut sur une route à double sens est :','','80 km/h','$id_co'),
('multi','La limite de vitesse quand il pleut sur route à sens unique hors agglomération est :' ,'','100 km/h','$id_co'),
                       ('multi','La vitesse est responsable de :' ,'','1 accident mortel sur 5','$id_co'),
                                               
                    
 ('vrai/faux','La vitesse doit être réglée en fonction de l\'état de la chaussée ,des difficultés de la circulation et des obstacles prévisibles',
                            '','vrai', '$id_co'),
('vrai/faux','Les vitesses maximales autorisée en agglomération : 50 km (chaussée humide :40 km/h)',
                            '','vrai', '$id_co'),
('vrai/faux','Un choc à 50 km/h équivaut à : une chute d\'un 4ème étage','','faux', '$id_co'),
('vrai/faux','Dans le cadre du permis probatoire, la vitesse sur autoroute est limitée à : 130 km/h',
                            '','faux', '$id_co'),
('vrai/faux','Les vitesses maximales autorisée dans les routes en générale : 100km (chaussée humide :80 km/h)','','vrai', '$id_co')
                         ;");
       
       
         $id_co=$id_co+1;
        // _cours niv2 diver2
       $req24=$db->query("INSERT INTO questions(type_quiz
,contenu,image_quiz,reponse,id_cours
) VALUES ('multi','La distance de sécurité quand on roule à 70 km/h est :' ,'',
                                                       '42 m','$id_co'),
                                                     ('multi','Quelle est la distance latérale de sécurité à la campagne ?' ,
                                                     '','1,5 m','$id_co'),
                                                     ('multi','Quelle est la distance latérale de sécurité en ville ?','',
                                                     '1 m','$id_co'),
    ('multi','A 50 km/h la distance de sécurité minimum obligatoire sera environ de :' ,'','30 m','$id_co'),
     ('multi','Par temps de pluie, les distances de freinage sont multipliées par :' ,'','2','$id_co'),
                         
('vrai/faux','La distance d\'arrêt de mon véhicule est égale à la distance de freinage','','faux', '$id_co'),
('vrai/faux','Le temps de réaction dépend : Du conducteur et du véhicule','','faux', '$id_co'),
('vrai/faux','Le temps de réaction du conducteur est d\'environ : 1 seconde','','vrai', '$id_co'),
('vrai/faux','L\’avantage de la distance de sécurité : Permet au conducteur d\'éviter le danger ', '','vrai', '$id_co'),
('vrai/faux','La distance de sécurité est d\’autant plus grande lorsque la vitesse est élevée','','vrai', '$id_co')
                         ;");
       
         $id_co=$id_co+1;
        // _cours niv2 diver3
  $req25=$db->query("INSERT INTO questions(type_quiz
,contenu,image_quiz,reponse,id_cours
) VALUES('multi','Parmi ces cas lesquelles sont des cas d\'arrêt et de stationnement dangereux :'
                                                  ,'','Virage, sommet de coté','$id_co'),
 ('multi','Parmi ces cas lesquelles sont des cas d\'arrêt et de stationnement gênant ?','','Carrefour, hôpital, arrêt de bus','$id_co'),
 ('multi','Il est interdit sur une bande cyclable:' ,'','De s\'arrêter et de se stationner','$id_co'),
 ('multi','Ligne jaune continue sur la chaussée ou le trottoir :' ,'','Arrêt et stationnement interdit','$id_co'),
                               
 ('vrai/faux','Le stationement sur un passage a niveau non gardé est un stationement dangeureux','','vrai', '$id_co'),
('vrai/faux','En entrant en agglomération : Je dois me stationner uniquement sur la droite de la chaussée sur les routes à double sens de circulation','','vrai', '$id_co'),
 ('vrai/faux','L\'un des type de stationnement : le stationnement en creneau ', '','vrai', '$id_co'),
('vrai/faux','Ligne jaune discontinue sur la chaussée ou le trottoir : arrêt et stationnement interdit','','faux', '$id_co')

                         ;");
                                    
                  
         $id_co=$id_co+1;
        // _cours indication
       $req26=$db->query("INSERT INTO questions(type_quiz
,contenu,image_quiz,reponse,id_cours
) VALUES('multi','Ce panneau indique:' ,'pin_7',
                                                       'Fin de route pour automobiles','$id_co'),
                                                       ('multi','Ce panneau indique:' ,'pin_9',
                                                       'Fin de route pour piétons','$id_co'),
                                                       ('multi','Ce panneau indique:' ,'pin_15',
                                                       'Une route pour les véhicules dont la longueur >10 m','$id_co'),
                                                       ('multi','Ce panneau indique:' ,'pin_17',
                                                       'Un arrêt d\'autobus','$id_co'),
                                                       ('multi','Ce panneau indique:' ,'pin_18',
                                                       'Une Station de taxis','$id_co'),
                                                       ('multi','Ce panneau indique:' ,'pin_20',
                                                       'Une voie de détresse','$id_co'),
                                                       ('multi','Ce panneau indique:' ,'pin_21',
                                                       'Un chemin sans issue','$id_co'),
                                                       ('multi','Ce panneau indique:' ,'pin_23',
                                                       'Une route à sens unique','$id_co'),
                                                       ('multi','Ce panneau indique:' ,'pin_24',
                                                       'Un passage pour piétons','$id_co'),
                                                       ('multi','Ce panneau indique:' ,'pin_26',
                                                       'Entrée d\'autoroute','$id_co'),
                                                       ('multi','Ce panneau indique:' ,'pin_27',
                                                       'Sortie d\'autoroute','$id_co'),
                                                       ('multi','Ce panneau indique:' ,'pin_28',
                                                       'Emplacement d\'arrêt d\'urgence','$id_co'),
                                                       ('multi','Ce panneau indique:' ,'pin_32',
                                                       'Fin de section de route avec affectation des voies','$id_co'),
                                                       ('multi','Ce panneau indique:' ,'pin_33',
                                                       'Gare auto/train','$id_co'),
                                                       ('multi','Ce panneau indique:' ,'pin_39',
                                                       'Hôtel','$id_co'),
                                                      
                                        ('vrai/faux','Ce panneau m\'indique: un lieu aménagé pour le stationnement',
                                       'pin_1','vrai','$id_co'),
                                    ('vrai/faux','Ce panneau m\'indique: un lieu aménagé pour le stationnement des cycles',
                                       'pin_2','vrai','$id_co'),
                                    ('vrai/faux','Ce panneau m\'indique: un lieu aménagé pour le stationnement des caravanes',
                                       'pin_3','vrai','$id_co'),
                                       ('vrai/faux','Ce panneau m\'indique: la proximité d\'un hôtel',
                                       'pin_37','faux','$id_co'),
                                       ('vrai/faux','Ce panneau m\'indique: un poste d\'appel d\'urgence',
                                       'pin_40','faux','$id_co'),
                                       ('vrai/faux','Ce panneau m\'indique: un poste de secours',
                                       'pin_38','faux','$id_co')
                                       ;");                                    
                         
                         
         $id_co=$id_co+1;
        // _cours  temporaire 
       $req27=$db->query("INSERT INTO questions(type_quiz
,contenu,image_quiz,reponse,id_cours
) VALUES ('multi','L\'usager de la route doit faire attention à un danger temporaire :' ,'pt_1','Chaussée rétrécie temporaire','$id_co'),
                                             ('multi','L\'usager de la route doit faire attention à un danger temporaire :' ,'pt_2','Projection de gravillons','$id_co'),
                                             ('multi','Quelle est la source de danger :' ,'pt_3',
                                             'Chaussée glissante temporaire','$id_co'),
                                             ('multi','Ce panneau indique :' ,'pt_4',
                                             'Cassis ou dos-d\'âne temporaires','$id_co'),
                                             ('multi','Quelle est la source de danger :' ,'pt_8',
                                             'Route barrée à 200m','$id_co'),
                                             ('multi','Ce panneau indique :' ,'pt_16',
                                             'Déviation pour les véhicules de transport de marchandises à 600 m','$id_co'),
                                             ('multi','Ce panneau indique :' ,'pt_17',
                                             'Voie centrale interdite aux poids lourds temporaire','$id_co'),
                                             ('multi','Quelle est la source de danger :' ,'pt_20',
                                             'Présignalisation de déviation','$id_co'),
                           ('vrai/faux','L\'usager doit faire attention  aux traveaux','pt_5','vrai','$id_co'),
                           ('vrai/faux','Ce panneau signifie qu\'il faut redoubler de vigilance','pt_6','vrai','$id_co'),
                           ('vrai/faux','Ce panneau annonce: des feux tricolores','pt_7','vrai','$id_co'),
                           ('vrai/faux','Ce panneau annonce: une affectation de voies','pt_19','faux','$id_co'),
                           ('vrai/faux','Ce panneau annonce: réduction du nombre des voies','pt_18','faux','$id_co'),
                           ('vrai/faux','Ceci est: une barriére de déviation','pt_12','faux','$id_co'),
                           ('vrai/faux','Ceci est: un piquet de signalisation de position','pt_10','vrai','$id_co'),
                           ('vrai/faux','Ceci est: un cône de chantier','pt_11','vrai','$id_co'),
                           ('vrai/faux','Ceci est: une barriére de chantier','pt_9','faux','$id_co'),
                           ('vrai/faux','Ceci est: un fanion','pt_13','vrai','$id_co'),
                         ('vrai/faux','A la vue de ce panneau vous devez suivre la déviation pendant 800 m ?',
                         'pt_14','faux','$id_co'),
                         ('vrai/faux','A la vue de ce panneau vous devez suivre la déviation pendant 500 m ?',
                         'pt_15','faux','$id_co')
                             ;");
                                             
                       
         $id_co=$id_co+1;
        // _cour intersection niv3 lecon unique
       $req28=$db->query("INSERT INTO questions(type_quiz
,contenu,image_quiz,reponse,id_cours
) VALUES ('multi','Parmis ces différents choix indiquer le plus
                           approprié pour eviter le risque d\'accident dans le circuit suivant :' ,'exo23_01','2/1','$id_co'),
                           ('multi','Parmis ces différents choix indiquer le plus
                           approprié pour eviter le risque d\'accident dans le circuit suivant :' ,'exo24_01','3/1/2','$id_co'),
                           ('multi','Parmis ces différents choix indiquer le plus
                           approprié pour eviter le risque d\'accident dans le circuit suivant :' ,'exo25_01','1/2','$id_co'),
                          
                           ('vrai/faux','L\'ordre de passage indiqué ci dessus est-il correcte : 2/1',
                            'exo47_01','vrai', '$id_co'),
                           ('vrai/faux','Aprés le passage de véhicule bleu le véhicule rouge peut-il faire le rond-point ? ',
                            'exo24_01','faux', '$id_co'),
                           ('vrai/faux','Le véhicule : bleu',
                            'exo48_01','faux', '$id_co')
                           
                         ;");
        $id_co=$id_co+1;
        // _cours niv3 diver1
       $req29=$db->query("INSERT INTO questions(type_quiz
,contenu,image_quiz,reponse,id_cours
) VALUES ('multi','Si je dépasse un vélo en ville la distance minimale à respecter est de :' ,'','1 m','$id_co'),
  ('multi','Si le marquage au sol est une ligne de dissuasion Je peux dépasser :' ,'','tous type de véhicule','$id_co'),
  ('multi','Si je dépasse un piéton en ville la distance minimale à respecter est de :' ,'','1 m','$id_co'),
('multi','Si je suis sur le point d’être dépasser, dans ce cas :' ,'', 'Je serre à droite sans  accélérer l\’allure','$id_co'),
                                             
                                              
('vrai/faux','Le dépassement d\'un véhicule de déneigement en action est toujours interdit','','vrai', '$id_co'),
('vrai/faux','Le dépassement se fait en général par : la gauche','','vrai', '$id_co'),
('vrai/faux','Le dépassement s\’effectue par la droite lorsque : le véhicule qui me précède a signalé son intention de tourner à droite','','faux', '$id_co'),
('vrai/faux','Le dépassement par la droite est toujours interdit','','faux', '$id_co'),
('vrai/faux','Si je dépasse un piéton en dehors de la ville la distance minimale à respecter est de: 1,5 m','','vrai', '$id_co')
                                            
                         ;");
                $id_co=$id_co+1;
        // _cours niv3 diver2
       $req30=$db->query("INSERT INTO questions(type_quiz
,contenu,image_quiz,reponse,id_cours
) VALUES ('multi','En circulation normale je dois être :' ,'',
                                                 'Sur la voie de circulation la plus à droite','$id_co'),
                                      
                                              ('multi','Si l\'autoroute a plus de 2 voies de circulation quels usagers n\'a pas le droit d\'utiliser plus que ces deux voies :' ,'',
                                              'Les véhicules de plus de 3 tonnes 5 ou les véhicules de plus de 7 mètres de long'
                                              ,'$id_co'),
                                               ('multi','La bande d\'arrêt d\'urgence sur l\'autoroute me permet de m\'arrêter si :'
                                              ,'','Je suis en panne','$id_co'),
                                              ('multi','Sur autoroute, quels véhicules doivent emprunter la voie lente ?' ,
                                              '','Ceux qui roulent à moins de 60 km/h','$id_co'),
('vrai/faux','La vitesse minimal sur la voie de gauche est 80 km/h','','faux', '$id_co'),
('vrai/faux','Les vitesses maximales autorisée sur autoroute sont 120 km/h et 100 km/h dans le cas d\'une chaussée humide','','vrai', '$id_co'),
('vrai/faux','Il possible de faire marche arrière et demi-tour sur l\’autoroute','','faux', '$id_co'),
('vrai/faux','On ne doit jamais dépasser par la droite un usager qui s’entête à rouler sur une voie située à gauche','','vrai', '$id_co'),
 ('vrai/faux','Il y a du brouillard sur l\'autoroute et que je ne vois pas à 50 mètres je dois circuler au maximum à : 50 km/h','','vrai', '$id_co')
                                ;");
 
         $id_co=$id_co+1;
        // _cours niv3 diver3
       $req31=$db->query("INSERT INTO questions(type_quiz
,contenu,image_quiz,reponse,id_cours
) VALUES  ('multi','Si je circule sur une zone exposée au vent :'
                                                        ,'','Je ralentis et maintient plus mon volant','$id_co'),
                                              ('multi','En cas de brouillard le principal risque est :' ,'',
                                              'Le manque de visibilité','$id_co'),
                                              ('multi','La nuit, une  voiture qui me suit m\'éblouit avec ses feux de route :' ,'','Je ralentis légèrement et Je mets le rétroviseur intérieur
                                              en position haute','$id_co'),
                                              ('multi','Si il neige la distance d\'arrêt du véhicule sera :' ,'',
                                              'Allongée','$id_co'),
                                              
 ('vrai/faux','Je circule à 11 km/h avec des chaines à neige, vais-je trop vite ?','','faux', '$id_co'),
('vrai/faux','Le principal risque sous la pluie est : d\'éclabousser les autres usagers', '','faux', '$id_co'),
 ('vrai/faux','Si la route est mouillée la distance de freinage sera multipliée environ par : deux','','vrai', '$id_co'),
('vrai/faux','Sur une chaussée enneigée, pour ralentir j\'utilise le frein moteur','','vrai', '$id_co'),
('vrai/faux','En cas d\'intempéries ma distance de sécurité avec les autres usagers : doit augmenter','','vrai', '$id_co')
                         ;");

  
    
    
 }        
   
?>
