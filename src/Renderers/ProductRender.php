<?php

namespace App\Renderers;

use App\Entity\Product\Controller\ProductController;

class ProductRender
{
    public static function renderProducts($products)
    {
        if (count($products) > 0) {
            foreach ($products as $product) {
                echo self::renderProductItem($product);
            }
        } else {
            echo '<div class="list__error">Database is empty.</div>';
        }
    }

    private static function renderProductItem($product)
    {
        $sku = self::escapeHtml($product->getSku());
        $name = self::escapeHtml($product->getName());
        $price = self::escapeHtml($product->getPrice());
        $attributeDescription = self::escapeHtml($product->getAttributeDescription());
        $attribute = self::escapeHtml($product->getAttribute());
        $unit = self::escapeHtml($product->getUnit());

        return <<<HTML
            <div class="list__item">
                <input type="checkbox" class="delete-checkbox" name="ids[]" value="{$sku}" >
                <div class="list__item-content">
                    <div class="list__item-sku">{$sku}</div>
                    <div class="list__item-name">{$name}</div>
                    <div class="list__item-price">{$price}</div>
                    <div class="list__item-attribute">{$attributeDescription}:<br>{$attribute} {$unit}</div>
                </div>
            </div>
        HTML;
    }

    private static function escapeHtml($value)
    {
        return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
    }
}