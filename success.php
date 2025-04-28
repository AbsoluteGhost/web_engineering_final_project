<?php
session_start(); 
if (!isset($_SESSION['name']) || empty($_SESSION['name'])) {
    header('Location: signup.html');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Successful</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="navbar">
        <div>
			<nav>
        		<div class="logo">
            		
					<ul class="nav-links">
					<a href="profile.php">Profile</a>
            		<a href="index.php">Home</a>
        			</ul>
        		</div>
        	
    		</nav>
            <!-- <a href="index.php">Home</a> -->			
        </div>
		
        <button class="logout" onclick="location.href='signup.html'">Logout</button>
    </div>
    <div class="container">
        <h1>Congratulations!</h1>
        <p>Your order has been placed successfully.</p>
        <p>We will deliver your order to the following address:</p>
        <p><strong><?php echo htmlspecialchars($_SESSION['address'] ?? "No address available"); ?></strong></p>
        <a href="index.php"><button>Go Back to Home</button></a>
    </div>
</body>
</html>
