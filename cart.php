<?php
session_start();
if (!isset($_SESSION['name']) || empty($_SESSION['name'])) {
    header('Location: signup.html');
    exit;
}
$cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
$total = array_reduce($cart, fn($sum, $item) => $sum + $item['price'], 0);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Your Shopping Cart</title>
    <link rel="stylesheet" href="styles.css">
    <style>
    .footer {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 20px 0;
            margin-top: 370px;
            margin-bottom: -50px;
            /*top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            max-width: 1280px;
            width: 95%;
            background: #10182F;
            border-radius: 6px; */
        }

        .footer a {
            color: #00bcd4;
            text-decoration: none;
        }

        .footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
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

        
        <button class="logout" onclick="location.href='logout.php'">Logout</button>
    </div>

    <!--Cart -->
    <div class="container">
        <h1>Your Shopping Cart</h1>
        <?php if (empty($cart)): ?>
            <p>Your cart is empty.</p>
        <?php else: ?>
            <table>
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Product Name</th>
                        <th>Price</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($cart as $item): ?>
                        <tr>
                            <td>
                                <img src="<?php echo htmlspecialchars($item['image']); ?>" alt="Product Image" width="100">
                            </td>
                            <td>
                                <?php echo htmlspecialchars($item['name2'] ?? 'Unknown Product'); ?>
                            </td>
                            <td><?php echo htmlspecialchars($item['price']); ?> taka</td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <h2>Total: <?php echo $total; ?> taka</h2>
        <?php endif; ?>

        <button onclick="location.href='index.php'">Continue Shopping</button>
        <button class="clear-btn" onclick="location.href='clear_cart.php'" style="background-color: red; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer;">Clear Cart</button>
    

    
        
        

        <!--address -->
        <h3>Your Payment Method:</h3>
        <ul>
            <li><p>Cash on Delivery</p></li>
        </ul>                 

        <form action="success.php" method="POST">
            <button type="submit" style="background-color: green; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer;">
            Buy Now
            </button>
        </form>

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
