<?php
$servername = "localhost";
$username = "root"; 
$password = ""; 

session_start();


if (isset($_POST['name'])) {
    $database = strtolower(trim($_POST['name'])) . "_db"; 
    $_SESSION['name'] = $database; 
    $_SESSION['name'] = htmlspecialchars($_POST['name']); 
    $_SESSION['email'] = htmlspecialchars($_POST['email']); 
    $_SESSION['phone'] = htmlspecialchars($_POST['phone']); 
    $_SESSION['address'] = htmlspecialchars($_POST['address']);
} elseif (isset($_SESSION['name'])) {
    $database = $_SESSION['name'];
} else {
    die("Database name is not provided!");
}

try {
    
    $conn = new mysqli($servername, $username, $password);

    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    echo "Connected successfully to MySQL server.<br>";

    
    $sql = "CREATE DATABASE IF NOT EXISTS `$database`";
    if ($conn->query($sql) === TRUE) {
        echo "Database '$database' created successfully.<br>";
    } else {
        echo "Error creating database: " . $conn->error . "<br>";
    }

    
    $conn->select_db($database);

    
    $table_sql = "
        CREATE TABLE IF NOT EXISTS users (
            id INT AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(100) NOT NULL,
            email VARCHAR(100) NOT NULL UNIQUE,
            phone VARCHAR(15) NOT NULL,
            address TEXT NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )
    ";
    if ($conn->query($table_sql) === TRUE) {
        echo "Table 'users' created successfully.<br>";
    } else {
        echo "Error creating table: " . $conn->error . "<br>";
    }

    // Insert user data 
    if (isset($_SESSION['name'], $_SESSION['email'], $_SESSION['phone'], $_SESSION['address'])) {
        $insert_sql = "INSERT INTO users (name, email, phone, address) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($insert_sql);
        $stmt->bind_param(
            "ssss",
            $_SESSION['name'],
            $_SESSION['email'],
            $_SESSION['phone'],
            $_SESSION['address']
        );

        
        $stmt->close();
    } else {
        
    }

} catch (Exception $e) {
    
}
if (isset($_SERVER['HTTP_REFERER'])) {
    $referrer = basename($_SERVER['HTTP_REFERER']);
    if ($referrer === 'signup.html') {
        header('Location: index.php');
        exit;
    }
}
?>
