<?php

namespace App\Services;

use PDO;

class SqlSupportService
{
    private static PDO $pdo;

    public function __construct(PDO $pdo)
    {
        self::$pdo = $pdo;
    }
    public static function getAll(string $tableName):array {
        $stmt = self::$pdo->prepare("SELECT * FROM $tableName");
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC) ?? [];
    }
    public static function getById(string $tableName, string $idTableName,int $id):array {
        $stmt = self::$pdo->prepare("SELECT * FROM $tableName WHERE $idTableName = :id");
        $stmt->execute([':id' => $id]);

        return $stmt->fetch(PDO::FETCH_ASSOC) ?? [];
    }


}