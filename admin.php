<!-- full page is full of error -->

<?php
session_start();

// not working
// if (!isset($_SESSION['admin']) || $_SESSION['admin'] !== true) {
//     header('Location: login.php'); // Redirect to login page if not logged in
//     exit();
// }


// $conn = new mysqli('localhost', 'root', '', 'web415');

//check connection
// if ($conn->connect_error) {
//     die('Connection failed: ' . $conn->connect_error);
// }

//add product

// if (isset($_POST['add_product'])) {
//     $name = $conn->real_escape_string($_POST['name']);
//     $price = $conn->real_escape_string($_POST['price']);
//     $image = $conn->real_escape_string($_POST['image']);
    
//     $sql = "INSERT INTO products (name, price, image) VALUES ('$name', '$price', '$image')";
//     if ($conn->query($sql)) {
//         $message = "Product added successfully!";
//     } else {
//         $message = "Error adding product: " . $conn->error;
//     }
// }

//delete
// if (isset($_POST['delete_product'])) {
//     $product_id = (int) $_POST['product_id'];
//     $sql = "DELETE FROM products WHERE id = $product_id";
//     if ($conn->query($sql)) {
//         $message = "Product deleted successfully!";
//     } else {
//         $message = "Error deleting product: " . $conn->error;
//     }
// }

// Fetch all products
// $products = $conn->query("SELECT * FROM products");

// $conn->close();
// ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="styles.css?v=<?php echo time(); ?>">
    
</head>
<body>
    <div class="container">
        <div class="logout">
            <a href="logout.php">Logout</a>
        </div>
        <h1>Admin Panel</h1>
        <?php if (isset($message)) { ?>
            <div class="message"><?php echo $message; ?></div>
        <?php } ?>
        <!-- Add Product Form -->
        <h2>Add Product</h2>
        <form method="POST">
            <input type="text" name="name" placeholder="Product Name" required>
            <input type="text" name="price" placeholder="Product Price" required>
            <input type="text" name="image" placeholder="Image URL" required>
            <button type="submit" name="add_product">Add Product</button>
        </form>

        
        <h2>Product List</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($products->num_rows > 0) { ?>
                    <?php while ($product = $products->fetch_assoc()) { ?>
                        <tr>
                            <td><?php echo $product['id']; ?></td>
                            <td><?php echo htmlspecialchars($product['name']); ?></td>
                            <td>$<?php echo htmlspecialchars($product['price']); ?></td>
                            <td><img src="<?php echo htmlspecialchars($product['image']); ?>" alt="Product Image" width="50"></td>
                            <td>
                                <form method="POST" style="display: inline;">
                                    <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
                                    <button type="submit" name="delete_product" style="background-color: red; color: white;">Delete</button>
                                </form>
                            </td>
                        </tr>
                    <?php } ?>
                <?php } else { ?>
                    <tr>
                        <td colspan="5">No products found</td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>
