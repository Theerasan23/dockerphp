<?php

  class Database {
    
      private $servername = "db";
      private $username = "root";
      private $password = "12345";
      private $dbname = "SYSTEM_DB";
      private $conn;

      // Constructor: ใช้เชื่อมต่อฐานข้อมูลเมื่อสร้าง class
      public function __construct() {
          $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);

          if ($this->conn->connect_error) {
              die("Connection failed: " . $this->conn->connect_error);
          }
      }

      // Query: ใช้ในการดำเนินการ SQL query
      public function query($sql) {
          return $this->conn->query($sql);
      }

      // getNumRows: ดึงจำนวนแถวที่ได้รับจากการ query
      public function getNumRows($sql) {
          $result = $this->query($sql);
          return $result ? $result->num_rows : 0;
      }

      // fetchAll: ดึงข้อมูลทั้งหมดจากผลลัพธ์ query
      public function fetchAll($sql) {
          $result = $this->query($sql);
          $data = [];
          if ($result) {
              while ($row = $result->fetch_assoc()) {
                  $data[] = $row;
              }
          }
          return $data;
      }

      // fetchOne: ดึงข้อมูลแถวเดียวจากผลลัพธ์ query
      public function fetchOne($sql) {
          $result = $this->query($sql);
          return $result ? $result->fetch_assoc() : null;
      }

      // close: ปิดการเชื่อมต่อฐานข้อมูล
      public function close() {
          $this->conn->close();
      }
  }
?>
