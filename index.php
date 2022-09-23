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
        <!-- Create a span which will get changed through our javascript -->
                <span id="changing">Free stuff</span> 
            </div>
<main>

<!-- Set the welcome text -->
<div class="hello">
<h1 id="Welc">Welcome to our shop!</h1>
    <p>We offer you the finest deals on computer hardware and peripherals.</p>
    <p>From the newest graphiccards over top of the line CPUs, we are sure you will find something to your liking. If you have any questions regarding our
        offers or deals, dont hestitate to send us an email, we will be happy to hear from you! Please be aware that you need to have a locally installed emailclient
        to send us an order. Since we are still a small business in development we currently havent deployed our own mailingservers, if our business continoues
        to grow as expected, we will implement them very soon.
    </p>
    <p>Have fun shopping and if you are happy with our service, please leave a review, if you are not satisfied please send us an email and we surely will
        find a way to solve all problems. 
    </p>

    </div>
<!-- Define our picture for the welcome page -->
    <div class="welcomeImage">
        <img src="pics/shop.png" alt="transaction.png" id="img">    
    </div>

<!-- Define our footer and its elements -->
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
