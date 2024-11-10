<?php

namespace App\Services;
use PDO;

//
class CountingService
{
    private PDO $pdo;
    private SqlSupportServiceTemplate $sqlSupportService;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
        $this->sqlSupportService = new SqlSupportServiceTemplate($pdo);

    }
    public function deleteTransaction(string $transactionId): void
    {
        $this->sqlSupportService::delete('transactions', 'transaction_id', $transactionId);
    }
    public function insertTransactions(string $amount, string $currency,int $status, string $rentalId): void
    {
        $stmt = $this->pdo->prepare("INSERT INTO transactions (amount, currency, status, rental_id) VALUES (:amount, :currency,:status, :rental_id)");
        $stmt->execute(['amount' => $amount, 'currency' => $currency, 'status' => $status, 'rental_id' => $rentalId]);
    }
    public function getOneTransaction($transactionId): array
    {
        return $this->sqlSupportService::getById('transactions', 'transaction_id', $transactionId);
    }
    public function getAllTransactions(): array
    {
        return $this->sqlSupportService::getAll('transactions');
    }
    public function getAllTransactionsByRentalId($rentalId): array
    {
        return $this->sqlSupportService::getById('transactions', 'rental_id', $rentalId);
    }

}