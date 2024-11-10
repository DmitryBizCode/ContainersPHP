<?php

namespace App\Services;

use PDO;

class CalculateShipments
{
    private PDO $pdo;
    private SqlSupportServiceTemplate $sqlSupportService;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
        $this->sqlSupportService = new SqlSupportServiceTemplate($pdo);
    }
    public function deleteShipment(string $shipmentId): void
    {
        $this->sqlSupportService::delete('shipments', 'shipment_id', $shipmentId);
    }
    public function insertShipment(string $departure_date, string $arrival_date, string $status, int $rentalId, int $routeId): void
    {
        $stmt = $this->pdo->prepare("INSERT INTO shipments (departure_date, arrival_date,status, rental_id, route_id) VALUES (:departure_date, :arrival_date, :status, :rental_id, :route_id)");
        $stmt->execute(['departure_date'=>$departure_date, 'arrival_date'=>$arrival_date, 'status'=>$status, 'rental_id'=>$rentalId, 'route_id'=>$routeId]);
    }
    public function getOneShipment($shipmentId): array
    {
        return $this->sqlSupportService::getById('shipments', 'shipment_id', $shipmentId);
    }
    public function getOneShipmentByContainerId($rentalId): array
    {
        return $this->sqlSupportService::getById('shipments', 'rental_id', $rentalId);
    }
    public function getOneShipmentByClientId($routeId): array
    {
        return $this->sqlSupportService::getById('shipments', 'route_id', $routeId);
    }
    public function getAllShipments(): array
    {
        return $this->sqlSupportService::getAll('shipments');
    }
}