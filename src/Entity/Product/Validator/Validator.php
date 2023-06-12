<?php

namespace App\Entity\Product\Validator;

use App\Entity\Product\Controller\ProductController;
class Validator
{

    private $data;
    private $errors = [];
    private static $inputs = ['sku', 'name', 'price', 'productType', 'size', 'weight', 'height', 'width', 'length'];

    public function __construct($post_data)
    {
        $this->data = $post_data;
    }

    public function validateForm()
    {
        foreach (self::$inputs as $field) {
            if (!array_key_exists($field, $this->data)) {
                trigger_error("$field is not present in data");
                return;
            }
        }

        $this->validateSku();
        $this->validateName();
        $this->validatePrice();
        $this->validateAttribute();

        return $this->errors;
    }

    private function addError($key, $val)
    {
        $this->errors[$key] = $val;
    }


    private function validateSku()
    {
        $productController = new ProductController();
        $value = trim($this->data['sku']);
        if (empty($value)) {
            $this->addError('sku', 'Please, provide the data of indicated type');
        } else if (!preg_match('/^[a-zA-Z0-9\s]+$/', $value)) {
            $this->addError('sku', 'Please, provide the data of indicated type');
        } else if ($productController->skuExists($value)) {
            $this->addError('sku', 'Please, provide the data of indicated type');
        }
    }

    private function validateName()
    {
        $value = trim($this->data['name']);
        if (empty($value)) {
            $this->addError('name', 'Please, provide the data of indicated type');
        } else if (!preg_match('/^[a-zA-Z0-9\s]+$/', $value)) {
            $this->addError('name', 'Please, provide the data of indicated type');
        }
    }

    private function validatePrice()
    {
        $value = trim($this->data['price']);
        if (empty($value)) {
            $this->addError('price', 'Please, provide the data of indicated type');
        } else if (!filter_var($value, FILTER_VALIDATE_FLOAT)) {
            $this->addError('price', 'Please, provide the data of indicated type');
        }
    }

    private function validateAttribute()
    {
        $type = $this->data['productType'];

        switch ($type) {
            case "DVD":
                $this->validateDVD();
                break;
            case "Book":
                $this->validateBook();
                break;
            case "Furniture":
                $this->validateFurniture();
                break;
            default:
                trigger_error("Type: $type does not exist");
        }
    }

    private function validateDVD()
    {
        $value = trim($this->data['size']);
        if (empty($value)) {
            $this->addError('size', 'Size cannot be empty. Please, submit required data.');
        } else if (!filter_var($value, FILTER_VALIDATE_INT)) {
            $this->addError('size', 'Size must be numeric. Please, provide the data of indicated type.');
        }
    }

    private function validateBook()
    {
        $value = trim($this->data['weight']);
        if (empty($value)) {
            $this->addError('weight', 'Weight cannot be empty. Please, submit required data.');
        } else if (!filter_var($value, FILTER_VALIDATE_FLOAT)) {
            $this->addError('weight', 'Weight must be numeric. Please, provide the data of indicated type.');
        }
    }

    private function validateFurniture()
    {
        $this->validateFurnitureDimensions('height');
        $this->validateFurnitureDimensions('width');
        $this->validateFurnitureDimensions('length');
    }

    private function validateFurnitureDimensions($dimensionName)
    {
        $value = trim($this->data[$dimensionName]);
        if (empty($value)) {
            $this->addError($dimensionName, ucfirst($dimensionName) . ' cannot be empty. Please, submit required data.');
        } else if (!filter_var($value, FILTER_VALIDATE_FLOAT)) {
            $this->addError($dimensionName, ucfirst($dimensionName) . ' must be numeric. Please, provide the data of indicated type.');
        }
    }
}