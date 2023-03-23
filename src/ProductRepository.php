<?php

namespace App;

use PDO;
use PDOException;

class ProductRepository
{
    protected $pdo;

    protected function getPdo(): PDO
    {
        if ($this->pdo === null) {
            $options = [
              PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
              PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ];

            try {
                $this->pdo = new PDO('mysql:host=localhost;dbname=test;charset=utf8mb4;', 'root', '', $options);
            } catch(PDOException $PDOException) {
                throw new PDOException($PDOException->getMessage(), (int) $PDOException->getCode());
            }
        }
        return $this->pdo;
    }

    public function fetchProducts(): array
    {
        return $this->getPdo()->prepare("SELECT * FROM products")->fetchAll(PDO::FETCH_ASSOC);
    }
}
