<?php
 declare (strict_types = 1);
 include 'AutoLoader.inc.php';
   $host="ec2-54-175-117-212.compute-1.amazonaws.com";
   $user="avcbhofmvdyimr";
   $password="9293fa13e288c9f59e28d1160c1ff2990de396746eba97f34492fb9e97cd776d";
   $dbName="d99or182kh1tu3";
   $port = "5432";

  try{
  $dsn = "pgsql:host=" . $host . ";port=" . $port .";dbname=" . $dbName . ";user=" . $user . ";password=" . $password.";" ;
  $pdo= new PDO($dsn,$user,$password);
  $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
  }
  catch(PDOException $e) {
   echo "oooops sorry something went wrong with the connection :( <br>".$e->getMessage();
 }
 
$id_user =1;            
$rcp_id1 = $pdo->query("SELECT username FROM utilisateurs WHERE id_user='$id_user'");
$tab=$rcp_id1->fetchAll();

echo '</pre>';
print_r($tab);
echo '</pre>';
echo $tab[0]['username'];

?>
