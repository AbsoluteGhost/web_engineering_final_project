<?php
session_start();


if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}


$hoodies = [
    ["name2" => "Cozy Red Hoodie", "price" => 250, "image" => "images/red_hoodie.png"],
    ["name2" => "Classic Black Hoodie", "price" => 300, "image" => "images/black_hoodie.png"],
    ["name2" => "Pink hoodie", "price" => 350, "image" => "images/pink_hoodie.png"],
    ["name2" => "Forest Green Hoodie", "price" => 280, "image" => "images/green_hoodie.png"],
    ["name2" => "Snow White Hoodie", "price" => 320, "image" => "images/white_hoodie.png"],
    ["name2" => "Regular watch", "price" => 80, "image" => "images/Regular watch.png"],
    ["name2" => "Classic watch", "price" => 100, "image" => "images/Classic watch.png"],
    
];



//add an item 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $item = [
        'name2' => $_POST['name2'],
        'price' => $_POST['price'],
        'image' => $_POST['image'],
    ];

    
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    
    $_SESSION['cart'][] = $item;

    header('Location: index.php');
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Winter Hoodie Shop</title>
    <link rel="stylesheet" href="styles.css">
    <style>
    .footer {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 20px 0;
            margin-top: 30px;
        }

        .footer a {
            color: #00bcd4;
            text-decoration: none;
            margin: 0 10px;
        }

        .footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
	<div class="navbar">
        <div>
			<nav>
        		<div class="logo">
            		
					<ul class="nav-links">
					<a href="profile.php">Profile</a>
            		<a href="cart.php">Cart</a>
        			</ul>
        		</div>
        	
    		</nav>
            <!-- <a href="index.php">Home</a> -->			
        </div>
        

		
        <button class="logout" onclick="location.href='logout.php'">Logout</button>
    </div>
    <div class="container">
        <h1>Welcome to the Winter Hoodie Shop</h1>
        <!-- <p>Find your perfect hoodie for the chilly weather!</p> -->

        <div class="product-list">
            <?php foreach ($hoodies as $hoodie): ?>
                <div class="product">
                    <img src="<?php echo htmlspecialchars($hoodie['image']); ?>" alt="<?php echo htmlspecialchars($hoodie['name2']); ?>" class="product-image">
                    <h2><?php echo htmlspecialchars($hoodie['name2']); ?></h2>
                    <p>Price: <?php echo htmlspecialchars($hoodie['price']); ?> taka</p>
					
                    <form method="POST">
    					<input type="hidden" name="name2" value="<?php echo htmlspecialchars($hoodie['name2']); ?>">
    					<input type="hidden" name="price" value="<?php echo htmlspecialchars($hoodie['price']); ?>">
    					<input type="hidden" name="image" value="<?php echo htmlspecialchars($hoodie['image']); ?>">
    					<button type="submit">Add to Cart</button>
					</form>

                </div>
            <?php endforeach; ?>
        </div>
        <a href="cart.php" class="view-cart">View Cart</a>
    </div>
    <footer class="footer">
        <p>Contact us: diu.winter.shop@example.com | Phone: +123-456-7890</p>
        <p>Follow us on: 
            <a href="#">Facebook</a> | 
            <a href="#">Instagram</a> | 
            <a href="#">Twitter</a>
        </p>
        <p>&copy; 2024 DIU Winter Shop. All rights reserved.</p>
    </footer>
</body>
</html>
