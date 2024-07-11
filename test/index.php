<?php
    
    require_once('connection.php');
  
    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class=" bg-[#DDDDDD] ">
    
    <div class="">
      
        <div class="flex flex-col gap-4 justify-center items-center h-screen">

            <div class="bg-[#AAFFC8]  p-6 rounded-lg shadow-lg">
                <code> <?php echo "tailwind: is Good !"; ?> </code>
            </div>

            <div class="bg-[#AADCFF] text-[#554200] p-6 rounded-lg shadow-lg">
                <code> <?php echo "php: is running"; ?> </code>
            </div>

            <div class="bg-[#FEABFF] p-6 rounded-lg shadow-lg">
                <code class="bg-white p-4 rounded-lg" > <?php echo "mysql: Connected successfully"; ?> </code>
            </div>

            
        </div>

    </div>

</body>
</html>
