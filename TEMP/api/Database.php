<?php

/**************************************
 * 
 *   En klass som hanterar en databas
 * 
 **************************************/

class Database
{
    private $servername = "localhost";
    private $username = "root";
    private $password = "root";
    private $database = "namnapi";
    private $conn = null;

    public function __construct()
    {
        $dns = "mysql:host={$this->servername};dbname={$this->database};charset=UTF8";

        try {
            $this->conn = new PDO($dns, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    /**
     * Select data from a table
     */
    public function select($table)
    {
        $stmt = $this->conn->prepare("SELECT * FROM $table");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_COLUMN, 0);
        return $result;
    }

    public function getFirstNamesMale()
    {
        $firstNamesMale = $this->select("firstNamesMale");
        return $firstNamesMale;
    }
    public function getFirstNamesFemale()
    {
        $firstNamesFemale = $this->select("firstNamesFemale");
        return $firstNamesFemale;
    }
    public function getLastNames()
    {
        $lastNames = $this->select("lastNames");
        return $lastNames;
    }

}
