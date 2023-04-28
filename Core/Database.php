<?php
// Connect to data base (PDO), (Php data objects)

namespace Core;
use PDO;

class Database
{
    public $connection;
    public $statement;

    public function __construct($config, $username = 'root', $password = '')
    { // --> Constructor
        $dsn = 'mysql:' . http_build_query($config, '', ';');

        $this->connection = new PDO($dsn, $username, $password, [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ]); // dsn -> Data source name
    }

    public function query($query, $params = [])
    {
        // statement here is a pdo object
        $this->statement =$this->connection->prepare($query); // Prepare the database to execute
        $this->statement->execute($params);
        // We return here a database object
        return $this;
    }

    public function find(){
      return $this->statement->fetch();
    }
    public function get(){
      return $this->statement->fetchAll();
    }

    public function findOrFail(){
      $result = $this->statement->fetch();
      
      if(!$result)
        abort();
      
      return $result;
    }

}
