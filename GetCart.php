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
    
    if (!empty($_SESSION['Cart'])) {
        
        $product_ID = $_REQUEST["product_ID"];
                    
        echo "<table>
        <tr>
        <th>Product ID</th>
        <th>Product Name</th>
        <th>Price</th>
        <th>Quantity</th>
        <th>Amount</th>
        </tr>";
        
        foreach ($_SESSION['Cart'] as $value=>$value_amount) {
            $sql = "SELECT * FROM products WHERE product_id =".$value;
            $result = $conn->query($sql);
                        
            if ($result->num_rows > 0) {
                       
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["product_id"] . "</td>";
                echo "<td>" . $row["product_name"] . "</td>";
                echo "<td>" . $row["unit_price"] . "</td>";
                echo "<td>" . $row["unit_quantity"] . "</td>";
                echo "<td>" . $value_amount . "</td>";
                echo "</tr>";
            }
            } else {
                echo "Empty";
            }
        }
        echo "</table>";
        
    } else {
        echo "The cart is empty! <br>";
    }
    
                
    $conn->close();    
?>
</body>
</html>
