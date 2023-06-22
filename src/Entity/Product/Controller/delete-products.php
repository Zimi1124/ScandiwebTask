<?php
// This script handles the deletion of products

require_once '../../../../vendor/autoload.php';
use App\Entity\Product\Controller\ProductController;

// Create an instance of the ProductController
$productController = new ProductController();

// Get the product IDs from the request body
$requestBody = file_get_contents('php://input');
$product_ids = json_decode($requestBody, true);

foreach ($product_ids as $product_id) {
    // Delete each product by calling the deleteProduct method
    $productController->deleteProduct($product_id);
}

// Respond with a success message
$response = array('success' => true);
echo json_encode($response);
exit;

