<?php

class LoginModel
{
    private $connection;

    public function __construct()
    {
        $this->connectDB();
    }

    private function connectDB()
    {
        $DBHostname = "localhost";
        $DBUsername = "root";
        $DBPassword = "";
        $DBname = "wanderway";

        $this->connection = new mysqli($DBHostname, $DBUsername, $DBPassword, $DBname);

        if ($this->connection->connect_error) {
            die("Database connection failed: " . $this->connection->connect_error);
        }
    }

    
    public function getConnection()
    {
        return $this->connection;
    }

    public function authenticate($email, $password)
    {
        $stmt = $this->connection->prepare("SELECT * FROM tourguide WHERE tg_email = ? AND tg_password = ?");
        $stmt->bind_param("ss", $email, $password);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result && $result->num_rows > 0) {
            return $result->fetch_assoc(); // Return user data
        } else {
            return false; 
        }
    }

    public function closeConnection()
    {
        $this->connection->close();
    }
}


?>