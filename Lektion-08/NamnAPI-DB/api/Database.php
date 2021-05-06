<?php

/**
 * En klass som hanterar data från namnapi-databasen
 */
class Database
{

    // Instansvariabler (fields)
    private $servername = "localhost";
    private $username = "root";
    private $password = "root";
    private $database = "namnapi";
    private $conn = null;


    public function __construct()
    {
        try {
            $this->conn = new PDO(
                "mysql:host={$this->servername};dbname={$this->database}",
                $this->username,
                $this->password
            );
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    /**
     * Select är en instansmetod (hjälpmetod)
     * som hämtar den första kolumnen 
     * från en valfri tabell
     * Returnerar en indexerad array
     */
    private function select($table){
        $stmt = $this->conn->prepare("SELECT * FROM $table");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_COLUMN, 0);
        return $result;
    }

    /**
     * Hämta alla manliga förnamn 
     * Returnerar en PHP-Array
     */
    public function getFirstNamesMale(){
        $firstNamesMale = $this->select("firstNamesMale");
        return $firstNamesMale;
    }

    /**
     * Hämta alla kvinnliga förnamn 
     * Returnerar en PHP-Array
     */
    public function getFirstNamesFemale(){
        return  $this->select("firstNamesFemale");
    }

    /**
     * Hämta alla efternamn
     * Returnerar en PHP-Array
     */
    public function getLastNames(){
        return  $this->select("lastNames");
    }

}
