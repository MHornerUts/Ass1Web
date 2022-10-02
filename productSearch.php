<?php 
session_start();
?>

<!DOCTYPE html>
<html>
<head>
</head>
<body>
<?php
    $servername = "localhost";
    $username = "matt";
    $password = "password";
    $dbname = "assignment1";
                
               
    $conn = new mysqli($servername, $username, $password, $dbname);
                // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        }
        
    $product_ID = $_REQUEST["product_ID"];
    $_SESSION['currentID'] = $product_ID; 
                
    $sql = "SELECT * FROM products WHERE product_id =".$product_ID;
    $result = $conn->query($sql);
                
    echo "<table>
    <tr>
    <th>Product ID</th>
    <th>Product Name</th>
    <th>Price</th>
    <th>Quantity</th>
    <th>Stock</th>
    </tr>";            
                
    if ($result->num_rows > 0) {
               
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["product_id"] . "</td>";
        echo "<td>" . $row["product_name"] . "</td>";
        echo "<td>" . $row["unit_price"] . "</td>";
        echo "<td>" . $row["unit_quantity"] . "</td>";
        echo "<td>" . $row["in_stock"] . "</td>";
        echo "</tr>";
    }
    } else {
        echo "No result";
    }
    
    echo "</table>";
                
    $conn->close();    
?>

</body>
</html>

