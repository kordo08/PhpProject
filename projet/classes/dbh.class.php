<?php
 
 class dbh{
  private $host="ec2-34-200-72-77.compute-1.amazonaws.com";
  private $user="lbwymdnqknqhau";
  private $password="88431a880f5b3fe88f9d071d0c72d335628cd8a25331af024cea065029d6acf9";
  private $dbName="d6bplr9hrnmj0j";
  private $port = "5432";

  protected function connect()
  {
    try{
        $dsn = "pgsql:host=" . $this->host . ";port=" . $this->port .";dbname=" . $this->dbname . ";user=" . $this->user . ";password=" . $this->password . ";" ;
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