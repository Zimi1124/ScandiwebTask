<?php

namespace App\Database\Connection;

class Connection
{
    private $servername;
    private $username;
    private $password;
    private $db;

    public function __construct()
    {
        $this->servername = "localhost";
        $this->username = "id20866147_admin";
        $this->password = "Password1!";
        $this->db = "id20866147_mysql";
    }
    function openConn()
    {

        $connection = new \mysqli($this->servername, $this->username, $this->password, $this->db);

        if ($connection->connect_error) {
            die("Connection failed: " . $connection->connect_error);
        }

        return $connection;
    }

    function closeConn($conn)
    {
        $conn->close();
    }
}



