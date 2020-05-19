<?php
 
 class dbh{
  private $host="ec2-54-175-117-212.compute-1.amazonaws.com";
  private $user="avcbhofmvdyimr";
  private $password="9293fa13e288c9f59e28d1160c1ff2990de396746eba97f34492fb9e97cd776d";
  private $dbName="d99or182kh1tu3";
  private $port = "5432";

  protected function connect()
  {
    try{
        $dsn = "pgsql:host=$this->host;port=5432;dbname=$this->dbname;user=$this->username;password=$this->password";
        $pdo = new PDO($dsn, $this->user, $this->password);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
        $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      }
      catch (PDOException $e) {
     echo "oooops sorry something went wrong with the connection :( <br>".$e->getMessage();
      }
    }
}
        ?>
