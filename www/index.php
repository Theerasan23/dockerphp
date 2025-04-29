<?php 


require_once __DIR__ . '/../vendor/autoload.php'; // สมมุติ vendor อยู่ที่ root

use Dotenv\Dotenv;

// ชี้ไปที่ root directory ที่เก็บ .env
$dotenv = Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

// ใช้งานได้
$test_env = $_ENV['TEST_ENV_TEXT'];

print("AAAAAAAAAAAAAa")

?>