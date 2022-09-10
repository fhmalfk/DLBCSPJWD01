<?php
// Enable the access of session variables
session_start();
$products_in_cart = isset($_SESSION['basket']) ? $_SESSION['basket'] : array();

// If the cart is not empty
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
}
?>

<!DOCTYPE html>
<html>
	<head>
        <meta charset="UTF-8">
        <title>Index</title>
        <!-- Include css files -->
        <link rel="stylesheet" href="css\defaults.css">
	</head>

    <!-- In the text area no comments are possible, otherwise they would get copied to the email body. All commands also have to stand at the beginning of 
    a line!
    define a text area
    call all products from the shoppingcart and display the name, amount and price
    A rfc defined string for linebreaks in emailbodies
    add the total price -->
    <div id = "mail">
        <textarea id="message" style="display: inline-block">
<?php foreach ($products as $product): ?>
<?=$product['name']?> <?=$product['price']?>€ x <?=$products_in_cart[$product['id']]?>
%0D%0A
<?php endforeach; ?>
%0D%0A
<?php echo($_SESSION['totalPrice'])?>€
        </textarea>
    </div>




    

<!-- Define our javafunction to send an email -->
<script type="text/javascript">

function sendMail(){
// Get the current date
  var date = new Date(); 
  var now =  date.getHours()+":"+date.getMinutes()+" ,"+date.getDate()+"."+(date.getMonth()+1)+"."+date.getFullYear();

  var newLine = "%0D%0A";
//Define our email body
  var emailBody=("Ordertime: "+now+newLine+newLine+document.getElementById('message').value+newLine+newLine+"Mit freundlichen Grüßen");
//Set the RCPT-address
  var emailTo="webshop@iubh.de";
// Set an email subject
  var emailSub="New order";
// Open the default email application and insert all defined variables
  document.location = "mailto:"+emailTo+"?subject="+emailSub+"&body="+emailBody;
//Redirect the browser to the cart.php page
  window.location.replace("http://localhost/cart.php");
}
</script>


<!-- Call our javascript -->
<?php echo '<script type="text/javascript">sendMail();</script>';?> 

