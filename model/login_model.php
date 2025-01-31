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
        $DBname = "wanderWay";

        $this->connection = new mysqli($DBHostname, $DBUsername, $DBPassword, $DBname);

        if ($this->connection->connect_error) {
            die("Database connection failed: " . $this->connection->connect_error);
        }
    }

    public function authenticate($email, $password)
    {
        $stmt = $this->connection->prepare("SELECT * FROM customer WHERE cu_email = ? AND cu_password = ?");
        $stmt->bind_param("ss", $email, $password);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result && $result->num_rows > 0) {
            return $result->fetch_assoc(); // Return user data
        } else {
            return false; // Login failed
        }
    }

    public function closeConnection()
    {
        $this->connection->close();
    }
}

?>
