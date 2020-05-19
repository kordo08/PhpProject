<?php
 
 class dbh{
  private $host="ec2-52-44-166-58.compute-1.amazonaws.com";
  private $user="qyibhmxopyddza";
  private $password="a5302718426dba13dabab2c95c30e562660027a2323ed9b1463888fb53fc889c";
  private $dbName="d8688apcrq2s88";
  private $port = "5432";

  protected function connect()
  {
    try{
        $dsn = "pgsql:host=" . $this->host . " port=" . $this->port ." dbname=" . $this->dbname . " user=" . $this->user . " password=" . $this->password ;
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