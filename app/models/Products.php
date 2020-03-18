<?php

require_once 'DB.php';

class Products
{
    private $_db = null;

    public function __construct()
    {
        $this->_db = DB::getInstance();
    }

    public function getProducts()
    {
        $result = $this->_db->query("SELECT * FROM `products` ORDER BY `id` DESC");
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getProductsLimited($order, $limit)
    {
        $result = $this->_db->query("SELECT * FROM `products` ORDER BY {$order} DESC LIMIT {$limit}");
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getProductsCategory($category)
    {
        $result = $this->_db->query("SELECT * FROM `products` WHERE `category` = '{$category}'");
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getOneProduct($id)
    {
        $result = $this->_db->query("SELECT * FROM `products` WHERE `id` = {$id}");
        return $result->fetch(PDO::FETCH_ASSOC);

    }

    public function getProductsForPagination($begin, $limit)
    {
        $result = $this->_db->query("SELECT * FROM `products` ORDER BY `id` DESC LIMIT {$begin}, {$limit}");
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }
}