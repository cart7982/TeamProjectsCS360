<!DOCTYPE html>
<html>
    <head>
        <title>Cart</title>
        <meta charset = "utf-8">
        <meta name = "viewport" content = "width = device-width, initial-scale = 1">
        <link href = "https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel = "stylesheet">
        <link href = "style2.css" rel = "stylesheet">

        <script src = "https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
    </head>
    <body>
    <?php
    session_start();
    if (!isset($_SESSION["UserID"]))
    {
        echo "Login failed!  No user ID found!";
        header("Location:login.html");
        exit();
    }
    ?>
        <div class = "navbar">    
            <div class="dropdown" tabindex="1">
                <i class="db2" tabindex="1"></i>
                <a class="dropbtn">Account</a>
                <div class="dropdown-content">
                    <a href = "signup.html">Sign Up</a>
                    <a href = "login.html">Log In</a>
                    <a href = "logout.php">Log Out</a>
                    <a href = "profile.php">Profile</a>
                </div>
            </div>
            <a href = "product_listings.php" class="dropbtn">Product Listings</a>
        </div> 
        
        <h1>CART</h1>

        <div class="card">
            <div class = "card-body">
                This page holds a list of all items a user has put into their cart, <br>
                along with the requested quantities.  <br>

                <?php
                $_UserID = $_SESSION["UserID"];
                $conn = mysqli_connect("localhost","root","","openplaza");
                $result = mysqli_query($conn,"SELECT * FROM transactions WHERE UserID='$_UserID' LIMIT 50");
                $data = $result->fetch_all(MYSQLI_ASSOC);
                ?>

                <table border="1">
                <tr>
                    <th>Product Name</th>
                    <th>Total Price</th>
                    <th>Quantity</th>
                    <th>Action</th>
                </tr>
                <?php foreach($data as $row): ?>
                <tr>
                    <td><?= htmlspecialchars($row['ProductName']) ?></td>
                    <td><?= htmlspecialchars($row['TotalPrice']) ?></td>
                    <td><?= htmlspecialchars($row['Quantity']) ?></td>
                    <td><form action="cart_increase.php" method="post">
                            <label for="Quantity">Quantity></label>
                            <input style="height:30px; width:100px" id="Quantity" name="Quantity"></input>
                            <input type="hidden" id="TransactionID" name="TransactionID" value="<?= htmlspecialchars($row['TransactionID']) ?>"></input>
                            <button style="height:30px; width:120px" input type="submit" name="ProductID" value="<?= htmlspecialchars($row['ProductID']) ?>">Add More</button></form></td>
                    <td><form action="cart_remove.php" method="post">
                            <label for="Quantity">Quantity></label>
                            <input style="height:30px; width:100px" id="Quantity" name="Quantity"></input>
                            <input type="hidden" id="TransactionID" name="TransactionID" value="<?= htmlspecialchars($row['TransactionID']) ?>"></input>
                            <button style="height:30px; width:100px" input type="submit" name="ProductID" value="<?= htmlspecialchars($row['ProductID']) ?>">Remove</button></form></td>
                        </tr>
                <?php endforeach ?>
                </table> 
            </div>
            <div class = "card-body">                
                <a class="dropbtn" href = "checkout.php" class="dropbtn">Checkout</a>
            </div>
        </div>


    </body>
</html>