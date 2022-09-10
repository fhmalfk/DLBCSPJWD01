<?php
//Create a PDO-object to connect our database
function connect() {
    return new PDO('mysql:host=' . 'localhost' . ';dbname=' . 'webshop' . ';charset=utf8', 'Hausmann', 'password');
}
// Assign the PDO-object to the object variable
$object = connect();

//Connect the pdo object with a select command to load all entries from the database where category equals CPU
$CPU = $object->prepare("SELECT * FROM products WHERE Category = 'CPU'");
//Execute the statement 
$CPU->execute();$object->prepare("SELECT * FROM products WHERE Category = 'CPU'");
//Store all CPU products in an associated array in the variable CPUS
$CPUS = $CPU->fetchAll(PDO::FETCH_ASSOC);
//Connect the pdo object with a select command to load all entries from the database where category equals CPU
$GPU = $object->prepare("SELECT * FROM products WHERE Category = 'GPU'");
//Execute the statement 
$GPU->execute();
//Store all CPU products in an associated array in the variable CPUS
$GPUS = $GPU->fetchAll(PDO::FETCH_ASSOC);
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

    <h2 class="header2">CPUs</h2>
    <table class="table">
    <tbody class="filterBody">
        <tr class="filterRow">
        <!-- Start a for each loop that loads every entry from the previously stored associated array and write the defined attributes in a HTML-template -->
        <?php foreach ($CPUS as $product): ?>
            
                <td>
                    <!-- Load the picture path from our database, define the picure as a figure to later assign it a figure caption. This enables
                    us to align the picture and the corresponding element data -->
                    <figure>
                    <img src="pics/<?=$product['picture']?>" class="storePics" alt="<?=$product['name']?>">
                    <figcaption>
                    <span class="name"><?=$product['name']?></span>
                    <span class="price"><?=$product['price']?>&euro;</span>
                    <!-- Create a form for every added product and on submit transfer the defined values to the cart.php site, through our dummyframe
                    we stay on the store.php page and only post the data to cart.php. Also a Java-alert is displayed to confirm the product adding -->
                    <form  action="cart.php" id="addedSuccess" method="post" onsubmit="addedSuccess()" target="dummyframe">
                    <!-- Define all objects that get transfered on submit -->
                    <input type="number" name="quantity" value="" min="1" max="<?=$product['quantity']?>" placeholder="Quantity" required>
                    <!-- Hide the product id from the html page, it is only relevant for data retrival in the next step -->
                    <input type="hidden" name="id" value="<?=$product['id']?>">
                    <input type="submit" value="Add To Cart">
                    </form>
                    </figcaption>
                    </figure>
                </td>
        <?php endforeach; ?>
        </tr>
        </tbody>
    </table>
    

        </br>


    <h2 class="header2">GPUs</h2>
    <table class="table">
    <tbody class="filterBody">
        <tr class="filterRow">
        <!-- Start a for each loop that loads every entry from the previously stored associated array and write the defined attributes in a HTML-template -->
        <?php foreach ($GPUS as $product): ?>
            <td>
                    <!-- Load the picture path from our database, define the picure as a figure to later assign it a figure caption. This enables
                    us to align the picture and the corresponding element data -->
                    <figure>
                    <img src="pics/<?=$product['picture']?>" class="storePics" alt="<?=$product['name']?>">
                    <figcaption>
                    <span class="name"><?=$product['name']?></span>
                    <span class="price"><?=$product['price']?>&euro;</span>
                    <!-- Create a form for every added product and on submit transfer the defined values to the cart.php site, through our dummyframe
                    we stay on the store.php page and only post the data to cart.php. Also a Java-alert is displayed to confirm the product adding -->
                    <form  action="cart.php" id="addedSuccess" method="post" onsubmit="addedSuccess()" target="dummyframe">
                    <!-- Define all objects that get transfered on submit -->
                    <input type="number" name="quantity" value="" min="1" max="<?=$product['quantity']?>" placeholder="Quantity" required>
                    <!-- Hide the product id from the html page, it is only relevant for data retrival in the next step -->
                    <input type="hidden" name="id" value="<?=$product['id']?>">
                    <input type="submit" value="Add To Cart">
                    </form>
                    </figcaption>
                    </figure>
                </td>
        <?php endforeach; ?>
        </tr>
        </tbody>
    </table>
<!-- Load our footer -->
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
<!-- Test -->

