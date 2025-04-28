
<?php

session_start();



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_SESSION['name'] = htmlspecialchars($_POST['name']); //store 
    $_SESSION['email'] = htmlspecialchars($_POST['email']); 
    $_SESSION['phone'] = htmlspecialchars($_POST['phone']); 
    $_SESSION['address'] = htmlspecialchars($_POST['address']);
}

if (isset($_SERVER['HTTP_REFERER'])) {
    $referrer = basename($_SERVER['HTTP_REFERER']);
    if ($referrer === 'signup.html') {
        header('Location: database.php');
        exit;
    }
}
if (isset($_SERVER['HTTP_REFERER'])) {
    $referrer = basename($_SERVER['HTTP_REFERER']);
    if ($referrer === 'cart.php') {
        header('Location: success.php');
        exit;
    }
}
if (isset($_SERVER['HTTP_REFERER'])) {
    $referrer = basename($_SERVER['HTTP_REFERER']);
    if ($referrer === 'index.php') {
        header('Location: profile.php');
        exit;
    }
}
$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "web415"; 


$conn = new mysqli($servername, $username, $password, $dbname);

// check 
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $address = htmlspecialchars($_POST['address']);
    

    
    $sql = "INSERT INTO users (name, email, phone, address) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $name, $email, $phone, $address);

    // -------------------

    // if ($stmt->execute()) {
    //     
    //     session_start();
    //     $_SESSION['address'] = $address;
    // } else {
    //     $message = "Error: " . $stmt->error;
    // }
    
    // $stmt->close();
// ------------------------
    $_SESSION['address'] = $address;

    if ($stmt->execute()) {
        
    } else {
        $message = "Error: " . $stmt->error;
    }

    $stmt->close();

    //  quote
    $quotes = [
        "Success is not final, failure is not fatal: It is the courage to continue that counts.",
        "The only limit to our realization of tomorrow is our doubts of today.",
        "Success usually comes to those who are too busy to be looking for it.",
        "Don't watch the clock; do what it does. Keep going.",
        "The way to get started is to quit talking and begin doing."
    ];
    $randomQuote = $quotes[array_rand($quotes)];
} else {
    echo "No form data submitted!";
    exit;
}


$conn->close();
?>


