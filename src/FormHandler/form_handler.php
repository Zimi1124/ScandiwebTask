<?php
require '../vendor/autoload.php';

use App\Entity\Product\Factory\ProductFactory;
use App\Entity\Product\Validator\Validator;
use App\Entity\Product\Controller\ProductController;


// Instantiate necessary objects
$productController = new ProductController();
$validator = new Validator($_POST);

$errors = [];

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $errors = $validator->validateForm();

    if (empty($errors)) {
        $type = $_POST['productType'];
        $sku = $_POST['sku'];
        $name = $_POST['name'];
        $price = $_POST['price'];
        $attributes = [];

        if (isset($_POST['weight'])) {
            $attributes['weight'] = $_POST['weight'];
        }
        if (isset($_POST['size'])) {
            $attributes['size'] = $_POST['size'];
        }
        if (isset($_POST['height'])) {
            $attributes['height'] = $_POST['height'];
        }
        if (isset($_POST['width'])) {
            $attributes['width'] = $_POST['width'];
        }
        if (isset($_POST['length'])) {
            $attributes['length'] = $_POST['length'];
        }

        try {
            $product = ProductFactory::createProduct($type, $sku, $name, $price, $attributes);
        } catch (Exception $e) {
            $errors[] = $e->getMessage();
        }

        if (empty($errors)) {
        // Save product to database
            if ($productController->insertProduct($product)) {
                header("Location: /");
                exit;
            } else {
                $errors[] = "Error occurred while trying to add a record to Database. Try again.";
            }
        }
    }
}
?>
