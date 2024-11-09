<?php

namespace App\Services;
use PDO;

//
class CountingService
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

}