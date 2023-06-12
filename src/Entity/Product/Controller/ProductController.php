<?php

namespace App\Entity\Product\Controller;

use App\Entity\Product\Product;
use App\Entity\Product\Extensions\Book;
use App\Entity\Product\Extensions\Furniture;
use App\Entity\Product\Extensions\DVD;
use App\Database\Connection\Connection;

class productController
{
    protected $con;

    public function __construct()
    {
        $this->con = new Connection();
    }


    function selectAllProducts()
    {
        $sql = "SELECT * FROM product";
        $connection = $this->con->openConn();
        $result = $connection->query($sql);
        $products = array();

        while ($row = $result->fetch_assoc()) {
            if ($row['type'] === "Book") {
                $product = new Book($row["sku"], $row["name"], $row["price"], $row["attribute"]);
            } else if ($row['type'] === "DVD") {
                $product = new DVD($row["sku"], $row["name"], $row["price"], $row["attribute"]);
            } else if ($row['type'] === "Furniture") {
                $product = new Furniture($row["sku"], $row["name"], $row["price"], $row["attribute"]);
            } else {
                $product = null;
            }

            if ($product !== null)
                $products[] = $product;
        }

        $this->con->closeConn($connection);

        return $products;
    }

    function insertProduct(Product $product)
    {


        $sku = $product->getSku();
        $name = $product->getName();
        $price = $product->getPrice();
        $type = $product->getType();
        $attribute = $product->getAttribute();

        $sql = "INSERT INTO product(sku, name, price, type, attribute)
            VALUES ('$sku', '$name', '$price', '$type', '$attribute')
            ";

        $connection = $this->con->openConn();
        $connection->query($sql);

        if ($connection->affected_rows == 1) {
            $this->con->closeConn($connection);
            return true;
        } else {
            $this->con->closeConn($connection);
            return false;
        }
    }

    function deleteProduct(string $sku)
    {
        $sql = "DELETE FROM product WHERE sku ='" . $sku . "'";
        $connection = $this->con->openConn();
        $connection->query($sql);
        $this->con->closeConn($connection);
    }

    function skuExists(string $sku)
    {
        $sql = "SELECT sku FROM product WHERE sku ='" . $sku . "'";
        $connection = $this->con->openConn();
        $result = $connection->query($sql);

        if ($result->num_rows > 0) {
            $this->con->closeConn($connection);
            return true;
        } else {
            $this->con->closeConn($connection);
            return false;
        }
    }
}