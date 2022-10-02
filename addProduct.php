<?php 
session_start();
?>

<!DOCTYPE html>
<html>
<head>
</head>
<body>
<?php
    $product_ID = $_SESSION['currentID'];
    $amount = $_REQUEST["product_Amount"];
    
    if( isset($_SESSION['Cart'])) {
        $_SESSION['Cart'] += [$product_ID => $amount];
    }  else {
        $_SESSION['Cart'][$product_ID] = $amount;
    }
    
    $test = $_SESSION['Cart'];
    
    foreach ($test as $value => $test){
        echo "$value <br>";
        echo "$test <br>";
    }
?>
</body>
</html>
