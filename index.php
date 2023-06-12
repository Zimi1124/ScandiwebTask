<?php

require_once 'vendor/autoload.php';

use App\Entity\Product\Controller\ProductController;
use App\Renderers\ProductRender;

$productController = new ProductController();
$products = $productController->selectAllProducts();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add product</title>

    <!-- =============== CSS ================ -->
    <link rel="stylesheet" href="public/css/style.css">
</head>

<body>
    <!-- -------------- header ----------------- -->
    <header class="header">
        <nav class="nav container">
            <div class="nav__title" onclick="window.location.href=window.location.href">
                <h1>Product List</h1>
            </div>
            <div class="nav__buttons">
                <button id="add-product-btn">ADD</button>
                <button id="delete-product-btn">MASS DELETE</button>
            </div>
        </nav>
        <hr class="horizontal-line container">
    </header>

    <!-- -------------- product grid ----------------- -->
    <main class="main container">
        <form id="delete_form" action="src/Entity/Product/Controller/delete-products.php" method="post">
            <div class="list__grid">
                <?php ProductRender::renderProducts($products); ?>
            </div>
        </form>
    </main>

    <!-- -------------- footer ----------------- -->
    <?php include 'templates/footer.php' ?>

    <!-- ============== JS scripts ============== -->
    <script src="public/js/productList.js"></script>
</body>

</html>