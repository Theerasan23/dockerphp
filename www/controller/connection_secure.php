<?php

class Database {

    private $servername;
    private $username;
    private $password;
    private $dbname;
    private $conn;

    public function __construct() {

        // ตั้งค่าการเชื่อมต่อ
        $this->servername = $_ENV['MYSQL_SERVER'];
        $this->username   = $_ENV['MYSQL_USER'];
        $this->password   = $_ENV['MYSQL_PASSWORD'];
        $this->dbname     = $_ENV['MYSQL_DATABASE'];

        // เชื่อมต่อฐานข้อมูล
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);

        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    // ฟังก์ชันกรองข้อมูล (XSS-safe)
    public function sanitizeInput($data) {
        if (is_string($data)) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
        }
        return $data;
    }

    public function getNumRows($sql, $types = null, ...$params) {
        $stmt = $this->query($sql, $types, ...$params);
        $result = $stmt->get_result();
        return $result ? $result->num_rows : 0;
    }

    public function query($sql, $types = null, ...$params) {
        if ($stmt = $this->conn->prepare($sql)) {
            if ($types && $params) {
                foreach ($params as $i => $param) {
                    $params[$i] = $this->sanitizeInput($param);
                }
                $stmt->bind_param($types, ...$params);
            }
            $stmt->execute();
            return $stmt;
        } else {
            die("Error preparing statement: " . $this->conn->error);
        }
    }

    public function fetch($sql, $types = null, ...$params) {
        $stmt = $this->query($sql, $types, ...$params);
        $result = $stmt->get_result();
        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        return $data;
    }

    public function fetchOne($sql, $types = null, ...$params) {
        $stmt = $this->query($sql, $types, ...$params);
        $result = $stmt->get_result();
        return $result ? $result->fetch_assoc() : null;
    }

    public function close() {
        $this->conn->close();
    }
}

?>
