<?php
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "caravanserai";

session_start();

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

$_ProductName = $_POST['product-name'];
$_Amount = $_POST['amount'];
$_Description = $_POST['description'];

//Get the image file names:
$_Filename = basename($_FILES['uploadfile']['name']);
$_TempFilename = $_FILES['uploadfile']['tmp_name'];
$targetDir = './Images/';
$targetFile = $targetDir . $_Filename;

echo "_Filename is: ".$_Filename;
echo "_TempFilename is: ".$_TempFilename;

//Grab the highest ID in the ProductID column, then increment it by one for the new ProductID to be assigned.
$result = mysqli_query($conn, "SELECT MAX(ProductID) AS max FROM products");
$row = mysqli_fetch_array($result);
$PrevID = $row['max'];
$_ProductID = intval($PrevID) + 1;

//UserID from the session global
$_UserID = $_SESSION["UserID"];

if(isset($_ProductName) && isset($_Amount) && isset($_Description) && isset($_Filename)) 
{
    //Insert information for new product
    //bind_param is used to sanitize
    $stmt = $conn->prepare("INSERT INTO products (ProductName, ProductID, UserID, Amount, Description, ImagePath) VALUES (?,?,?,?,?,?)");
    $stmt->bind_param("ssssss", $_ProductName, $_ProductID, $_UserID, $_Amount, $_Description, $_Filename);
    $stmt->execute();

    if (move_uploaded_file($_TempFilename, $targetFile)) {
        echo "File uploaded successfully to $targetFile!";
    } else {
        echo "Failed to move uploaded file.";
    }

    $stmt->close();
    $conn->close();
}

header('Location:profile.php');

?>