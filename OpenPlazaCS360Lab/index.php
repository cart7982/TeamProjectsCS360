<!DOCTYPE html>
<html>
    <head>
        <title>Landing Page</title>
        <meta charset = "utf-8">
        <meta name = "viewport" content = "width = device-width, initial-scale = 1">
        <link href = "https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel = "stylesheet">
        <link href = "styleII.css" rel = "stylesheet">

        <script src = "https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
    </head>
    <body>
        
        <h1>CaravanSerai</h1>
        <h3>LANDING PAGE</h3>

        <div class = "card">
            <div class = "card-header">
                Welcome to CaravanSerai!
            </div>
            <div class = "card-body">
                CaravanSerai is an anonymous trading site that allows you to 
                exchange goods securely, without needing any intermediary steps. 
            </div>
            <div class = "card-body">
                If you've already created an account, log in <a href = "login.html">here</a>
            </div>
            <div class = "card-body">
                If you're new and you'd like to start trading, sign up <a href = "signup.html">here</a>
            </div>
        </div>

        
        <?php
        //$_UserID = $_SESSION["UserID"];
        $conn = mysqli_connect("localhost","root","","caravanserai");
        $result = mysqli_query($conn,"SELECT * FROM products LIMIT 50");
        $data = $result->fetch_all(MYSQLI_ASSOC);
        ?>

        <table border="1">
        <tr>
            <th>Product Name</th>
            <th>Price</th>
            <th>Amount</th>
            <th>Description</th>
            <th>Action</th>
        </tr>
        <?php foreach($data as $row): ?>
        <tr>
            <td><?= htmlspecialchars($row['ProductName']) ?></td>
            <td><?= htmlspecialchars($row['Price']) ?></td>
            <td><?= htmlspecialchars($row['Amount']) ?></td>
            <td><?= htmlspecialchars($row['Description']) ?></td>
            <td><form action="add_cart.php" method="post">
                <label for="Quantity">Quantity></label>
                <input style="height:30px; width:100px" id="Quantity" name="Quantity"></input>
                <button style="height:30px; width:100px" input type="submit" name="ProductID" value="<?= $row['ProductID'] ?>">Add to Cart</button></form></td>
            </tr>
        <?php endforeach ?>
        </table>       
        


    </body>
</html>