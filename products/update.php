<?php
require_once "../controller/ProductController.php";  
$controller = new ProductController();
try {
    $controller->update($_POST, $_GET["id"]);
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}    
