<?php
class Database
{
    private $host = 'localhost';
    private $username = 'root';
    private $password = '';
    private $database = 'users';
    private $connection;

    public function __construct()
    {
        $this->connection = new mysqli($this->host, $this->username, $this->password, $this->database);
        if ($this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
        }
    }

    public function query($query)
    {
        $result = $this->connection->query($query);
        if (!$result) {
            die("Error executing query: " . $this->connection->error);
        }
        return $result;
    }

    public function queryUser($username)
    {
        $query = "SELECT * FROM users WHERE email='$username'";
        $result = $this->connection->query($query);
        if (!$result) {
            die("Error executing query: " . $this->connection->error);
        }
        if ($result->num_rows > 0) {
            return true;
        } else {
            return false;
        }
    }


    public function registerUser($username, $password)
    {
        $username = $this->connection->real_escape_string($username);
        //$password = $this->connection->real_escape_string($password);
        $passwordHash = hash('sha256', $password);
        $query = "INSERT INTO users (email, password) VALUES ('$username', '$passwordHash')";
        $result = $this->connection->query($query);
        if (!$result) {
            die("Error executing query: " . $this->connection->error);
        } 
        return true;
    }

    public function loginUser($username, $password)
    {
        $username = $this->connection->real_escape_string($username);
        $password = hash('sha256', $password);
        $query = "SELECT * FROM users WHERE email='$username' AND password='$password'";
        $result = $this->connection->query($query);
        if (!$result) {
            die("Error executing query: " . $this->connection->error);
        }
        if ($result->num_rows > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function close()
    {
        $this->connection->close();
    }
}
