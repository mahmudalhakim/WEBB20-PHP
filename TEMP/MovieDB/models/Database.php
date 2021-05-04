<?php

/******************************************************
 * 
 *               PHP OOP Database Class
 * 
 * Date: 2021-05-03
 * Developer: Mahmud Al Hakim
 * Copyright: MIT
 * 
 ******************************************************/

class Database
{
    private $conn;

    public function __construct($database, $username = "root", $password = "root", $servername = "localhost")
    {
        $dns = "mysql:host=$servername;dbname=$database;charset=UTF8";

        try {
            $this->conn = new PDO($dns, $username, $password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //echo "<p class='alert alert-success'>Connected successfully</p>";
        } catch (PDOException $e) {
            throw new Exception($e->getMessage());
        }
    }

    /******
     * Execute PDOStatement
     * https://www.php.net/manual/en/pdostatement.execute
     */
    private function execute($statement, $input_parameters = [])
    {
        try {
            $stmt = $this->conn->prepare($statement);
            $stmt->execute($input_parameters);
            return $stmt;
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    /***
     * SELECT
     */
    public function select($statement, $input_parameters = [])
    {
        $stmt = $this->execute($statement, $input_parameters);
        return $stmt->fetchAll();
    }

    /***
     * INSERT
     */
    public function insert($statement, $input_parameters = [])
    {
        $this->execute($statement, $input_parameters);
        return $this->conn->lastInsertId();
    }

    /***
     * UPDATE
     */
    public function update($statement, $input_parameters = [])
    {
        $this->execute($statement, $input_parameters);
    }

    /***
     * DELETE
     */
    public function delete($statement, $input_parameters = [])
    {
        $this->execute($statement, $input_parameters);
    }
}
