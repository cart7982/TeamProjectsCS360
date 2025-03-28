<!DOCTYPE html>
<html>
    <head>
        <title>Checkout</title>
        <meta charset = "utf-8">
        <meta name = "viewport" content = "width = device-width, initial-scale = 1">
        <link href = "https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel = "stylesheet">
        <link href = "style2.css" rel = "stylesheet">

        <script src = "https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
    </head>
    <body>
    <?php
    session_start();
    ?>
        <div class = "navbar">    
            <div class="dropdown" tabindex="1">
                <i class="db2" tabindex="1"></i>
                <a class="dropbtn">Account</a>
                <div class="dropdown-content">
                    <a href = "signup.html">Sign Up</a>
                    <a href = "login.html">Log In</a>
                    <a href = "logout.php">Log Out</a>
                </div>
            </div>

            <div class="dropdown" tabindex="1">
                <i class="db2" tabindex="1"></i>
                <a class="dropbtn">Trade</a>
                <div class="dropdown-content">
                    <a href = "product_listings.php">Product Listings</a>
                    <a href = "cart.php">Cart</a>
                    <a href = "checkout.php">Checkout</a>
                </div>
            </div>
        </div>
        <h1>CHECKOUT</h1>

        <div class = "card">
            <div class = "card-body">
                This page serves as final confirmation for the purchased items.  
            </div>
        </div>

        <button type = submit class = "btn btn-primary">Confirm Trade?</button>
    </body>
</html>