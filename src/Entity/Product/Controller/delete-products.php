<?php
// This script handles the deletion of products

require_once '../../../../vendor/autoload.php';
use App\Entity\Product\Controller\ProductController;

// Create an instance of the ProductController
$productController = new ProductController();

// Get the product IDs from the $_POST array
$product_ids = isset($_POST['ids']) ? $_POST['ids'] : array();

foreach ($product_ids as $product_id) {
    // Delete each product by calling the deleteProduct method
    $productController->deleteProduct($product_id);
}

// Redirect to the root URL
$url = "/";
header("Location: $url");
exit;






