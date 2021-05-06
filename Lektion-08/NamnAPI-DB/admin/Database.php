<?php

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
            //echo "<p class='alert alert-success'>Connected successfully</p>";
        } catch (PDOException $e) {
            echo "<p class='alert alert-danger mt-3'>Connection failed: " . $e->getMessage() . "</p>";
        }
    }

    /**
     * Get data from a table
     * Returns Array
     */

    public function getArrayFromTable($table)
    {
        $stmt = $this->conn->prepare("SELECT * FROM $table");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_COLUMN, 0);
        return $result; // Index Array
    }

    public function getFirstNamesMale()
    {
        $firstNamesMale = $this->getArrayFromTable("firstNamesMale");
        return $firstNamesMale;
    }
    public function getFirstNamesFemale()
    {
        $firstNamesFemale = $this->getArrayFromTable("firstNamesFemale");
        return $firstNamesFemale;
    }
    public function getLastNames()
    {
        $lastNames = $this->getArrayFromTable("lastNames");
        return $lastNames;
    }


    public function insertInto($table, $name)
    {
        try {
            $sql = "INSERT INTO $table VALUES (:name)";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':name', $name);
            $stmt->execute();
            $this->printMessage("$name inserted successfully.", "success");
        } catch (PDOException $e) {
            //var_dump($stmt);
            //print_r($stmt->errorInfo());
            // 1062 - Duplicate entry
            if ($stmt->errorInfo()[1] == 1062) {
                $this->printMessage("$name finns redan i databasen!");
            } else {
                $this->printMessage($e->getMessage());
            }
        }
    }

    /**
     * En funktion som skriver ut ett felmeddelande
     * $messageType enligt Bootstrap Alerts
     * https://getbootstrap.com/docs/5.0/components/alerts/
     */
    public function printMessage($message, $messageType = "danger")
    {
        echo "<div class='my-2 col-md-6 offset-md-3 alert alert-$messageType alert-dismissible fade show' role='alert'>
            $message
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>";
    }
}
