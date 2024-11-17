<?php

namespace App\Services;

use PDO;

class RentService
{
    private PDO $pdo;
    private SqlSupportServiceTemplate $sqlSupportService;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
        $this->sqlSupportService = new SqlSupportServiceTemplate($pdo);
    }
    public function deleteRental(string $rentalId): void
    {
        $this->sqlSupportService::delete('rentals', 'rental_id', $rentalId);
    }
    public function insertRental(string $startDate, string $endDate, string $status, float $price, string $paymentStatus, int $containerId, int $clientId,string $description): void
    {
        $stmt = $this->pdo->prepare("INSERT INTO rentals (start_date, end_date,status, price, payment_status, container_id,client_id,description) VALUES (:start_date, :end_date, :status, :price, :payment_status, :container_id, :client_id, :description)");
        $stmt->execute(['start_date'=>$startDate, 'end_date'=>$endDate, 'status'=>$status, 'price'=>$price, 'payment_status'=>$paymentStatus, 'container_id'=>$containerId, 'client_id'=>$clientId, 'description'=>$description]);
    }
    public function getOneRental($rentalId): array
    {
        return $this->sqlSupportService::getById('rentals', 'rental_id', $rentalId);
    }
    public function getOneRentalByClientAndContainer($container_id,$client_id): array
    {
        $stmt = $this->pdo->prepare("SELECT * FROM rentals WHERE container_id = :container_id AND client_id = :client_id ORDER BY start_date DESC  LIMIT 1");
        $stmt->execute([':container_id' => $container_id, 'client_id' => $client_id]);

        return $stmt->fetch(PDO::FETCH_ASSOC) ?: [];
    }
    public function getOneRentalByContainerId($containerId): array
    {
        return $this->sqlSupportService::getById('rentals', 'container_id', $containerId);
    }
    public function getOneRentalByClientId($clientId): array
    {
        return $this->sqlSupportService::getById('rentals', 'client_id', $clientId);
    }
    public function getAllRentals(): array
    {
        return $this->sqlSupportService::getAll('rentals');
    }
}