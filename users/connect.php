<?php
 $host="ec2-54-175-117-212.compute-1.amazonaws.com";
 $user="avcbhofmvdyimr";
 $password="9293fa13e288c9f59e28d1160c1ff2990de396746eba97f34492fb9e97cd776d";
 $dbName="d99or182kh1tu3";
 $port = "5432";

    try{
        $dsn = "pgsql:host=" . $host . ";port=" . $port .";dbname=" . $dbName . ";user=" . $user . ";password=" . $password.";" ;
        $connexion = new PDO($dsn, $user, $password);
        $connexion->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
        $connexion->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
        $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      }
      catch (PDOException $e) {
     echo "oooops sorry something went wrong with the connection :( <br>".$e->getMessage();
      }
?>