<?php
// Start the session, so we can access the global session arrays
session_start();

// Our shopping cart will be represented throug an associative array. All product IDs are resembled through array keys, the key value equals its amount in the shopping cart 

// If id and quantitiy where transfered through the post call, store both values in int variables
if(isset($_POST['id'], $_POST['quantity'])){
    $id = (int)$_POST['id'];
    $quantity = (int)$_POST['quantity'];

// Check if the SessionID-basket is already existing
    if(isset($_SESSION['basket'])){
// Check if an array key, of the basket array, matches the transferred Post-id value
        if (array_key_exists($id, $_SESSION['basket'])) {
            // if the key is already existing, update its value
            $_SESSION['basket'][$id] += $quantity;
        } else {
                // The product is so far not existing in the cart, so add it
                $_SESSION['basket'][$id] = $quantity;
            }
    }
    else {
        // Since the session array basket was not existing, its the first product to be added
        $_SESSION['basket'] = array($id => $quantity);
    }    
}


// If the update button was clicked, we can see that through the post-update value and start our update-function
if (isset($_POST['update']) && isset($_SESSION['basket'])) {
    //Loop through the post data and update every key value
    foreach ($_POST as $k => $v) {
        if (strpos($k, 'quantity') !== false && is_numeric($v)) {
            $id = str_replace('quantity-', '', $k);
            $quantity = (int)$v;
           //Update key values of array
                $_SESSION['basket'][$id] = $quantity;
            }
    }

}


//Check if the remove tag was transferred over a get request and if its value is numerical
if (isset($_GET['remove']) && is_numeric($_GET['remove']) && isset($_SESSION['basket']) && isset($_SESSION['basket'][$_GET['remove']])) {
    // Remove the product from the shopping cart
    unset($_SESSION['basket'][$_GET['remove']]);
}


// Check the session variable for products in cart
$products_in_cart = isset($_SESSION['basket']) ? $_SESSION['basket'] : array();
$products = array();
$_SESSION['totalPrice'] = 0.00;
// If there are products in cart
if ($products_in_cart) {

//Create a PDO-object to connect our database
function connect() {
    return new PDO('mysql:host=' . 'localhost' . ';dbname=' . 'webshop' . ';charset=utf8', 'Hausmann', 'password');
}
// Assign the PDO-object to the object variable
$object = connect();

    //Select all products which are in the cart from our database
    // transfer the shopping cart to a questionmark array to later fill it with the correct product ids
    $array_to_question_marks = implode(',', array_fill(0, count($products_in_cart), '?'));
    $stmt = $object->prepare('SELECT * FROM products WHERE id IN (' . $array_to_question_marks . ')');
    // Use the array keys to replace the question marks and fetch all correspoding products from the database
    $stmt->execute(array_keys($products_in_cart));
    // Return all products as an associated array
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
    // Calculate the total
    foreach ($products as $product) {
        $_SESSION['totalPrice'] += (float)$product['price'] * (int)$products_in_cart[$product['id']];
    }
}

//Prevent resubmission through deleting the post-data
unset($_POST);

?>

<!DOCTYPE html>
<html>
	<head>
        <meta charset="UTF-8">
        <title>Index</title>
        <!-- Include css files -->
        <link rel="stylesheet" href="css\defaults.css">
        <link rel="stylesheet" href="css\store.css">
        <link rel="stylesheet" href="css\dyn.css">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	</head>
	<body>
        <!-- Define navbar -->
        <div class="topnav" id="myTopnav">
                <a href="cart.php">Checkout</a>
                <a href="store.php">Store</a>
                <a href="index.php">Home</a> 
                <a href="javascript:void(0);" class="icon" onclick="myFunction()">
                <i class="fa fa-bars"></i>
            </a>
        <!-- Create a span which will get changed over our javascript -->
                <span id="changing">Free stuff</span> 
            </div>

<main>

<!-- // Prevent site redirection after submitting form -->
<iframe name="dummyframe" id="dummyframe" style="display: none;"></iframe>

<div class="tableWidth">
<form action="cart.php" method="post">
        <table>
            <thead>
                <tr>
                    <td colspan="1">Product</td>
                    <td>Price</td>
                    <td>Quantity</td>
                    <td>Total</td>
                </tr>
            </thead>
            <tbody>
                <!-- If the cart is empty, display a message -->
                <?php if (empty($_SESSION['basket'])): ?>
                <tr>
                    <td colspan="5" style="text-align:center;">No products in shopping cart to display</td>
                </tr>
                <?php else: ?>
                <!-- Display all products of the shopping cart in a table -->
                <?php foreach ($products as $product): ?>
                <tr>
                    <td>
                        <?=$product['name']?>
                        <br>
                        <a href="cart.php?remove=<?=$product['id']?>" class="remove">Remove</a>
                    </td>
                    <td>&euro;<?=$product['price']?></td>
                    <td>
                        <input type="number" name="quantity-<?=$product['id']?>" value="<?=$products_in_cart[$product['id']]?>" min="1" max="<?=$product['quantity']?>" placeholder="Quantity" required>
                    </td>
                    <td>&euro;<?=$product['price'] * $products_in_cart[$product['id']]?></td>
                </tr>
                <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
     </div>
        <div class="vertical-center">
                </br>
            <span>Endprice</span>
            <span class="underline"><?=$_SESSION['totalPrice']?>&euro;</span>
            </br>
            </br>
            <table>
                <tr>
            <!-- Submit form and start the update function -->
            <input type="submit" value="Update" name="update" id="updateButton">
    </form>
                <!-- Submit form to start email function on a different php page -->
                <form action="mail.php" method="post">
                <input type="submit" value="Place Order" name="placeorder" id="orderButton">

                </form>
                </tr>
                </table>
        </div>    

</main>
         <div class="footer">
            <table id="footerID">
                <tr>
                    <td><p>Schönhauser Allee 64, 10437 Berlin</p></td>
                    <td><p>Steuer-ID: 103948273</p></td>
                    <td><p>Inhaber: Reiche Gesellschaft XYZ</p></td>
                </tr>
            </table>
        </div>
<!-- include javascript for dynamic effects -->
    <script src="javascript\dynamic.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>