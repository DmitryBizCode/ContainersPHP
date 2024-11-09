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
    public function deleteTransactions(string $transactionId): void
    {
        $stmt = $this->pdo->prepare("DELETE FROM transactions WHERE transaction_id = :id");
        $stmt->execute(['id' => $transactionId]);
    }
    public function insertTransactions(string $amount, string $currency,int $status, string $rentalId): void
    {
        $stmt = $this->pdo->prepare("INSERT INTO transactions (amount, currency, status, rental_id) VALUES (:amount, :currency,:status, :rental_id)");
        $stmt->execute(['amount' => $amount, 'currency' => $currency, 'status' => $status, 'rental_id' => $rentalId]);
    }
    public function getOneTransactions($transactionId): array
    {
        $stmt = $this->pdo->prepare("SELECT * FROM transactions where transaction_id = :id");
        $stmt->execute(['id' => $transactionId]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function getAllTransactions(): array
    {
        $stmt = $this->pdo->prepare("SELECT * FROM transactions");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getAllTransactionsByRentalId($countryId): array
    {
        $stmt = $this->pdo->prepare("SELECT * FROM transactions WHERE rental_id = :id");
        $stmt->execute(['id' => $countryId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}