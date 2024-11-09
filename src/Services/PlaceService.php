<?php

namespace App\Services;

use App\Model\ContainerModel;
use PDO;


//Countries,Ports,Routes

class PlaceService
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }
    public function insertCountries(string $name,int $interestTax): void
    {
        $stmt = $this->pdo->prepare("INSERT INTO countries (name, interest_tax) VALUES (:name, :interest_tax)");
        $stmt->execute(['name' => $name, 'interest_tax' => $interestTax]);
    }
    public function getOneCountry($name): array
    {
        $stmt = $this->pdo->prepare("SELECT * FROM countries where name = :name");
        $stmt->execute(['name' => $name]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function insertPorts(string $name,int $location, int $countryId): void
    {
        $stmt = $this->pdo->prepare("INSERT INTO ports (name, location,country_id) VALUES (:name, :location,:country_id)");
        $stmt->execute(['name' => $name, 'location' => $location, 'country_id' => $countryId]);
    }
    public function deletePorts(int $portId): void
    {
        $stmt = $this->pdo->prepare("DELETE FROM ports WHERE port_id = :port_id");
        $stmt->execute(['port_id' => $portId]);
    }
    public function getOnePorts($name): array
    {
        $stmt = $this->pdo->prepare("SELECT * FROM ports where name = :name");
        $stmt->execute(['name' => $name]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function getAllPortsByCountryID(int $countryId): array
    {
        $stmt = $this->pdo->query("SELECT * FROM ports WHERE country_id = :country_id");
        $stmt->execute(['country_id' => $countryId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
//Routes
    public function insertRoute(int $originPortId,int $destinationPortId, int $estimatedTime, float $distance): void
    {
        $stmt = $this->pdo->prepare("INSERT INTO routes (origin_port_id, destination_port_id,estimated_time,distance) VALUES (:origin_port_id, :destination_port_id,:estimated_time,:distance)");
        $stmt->execute(['origin_port_id' => $originPortId, 'destination_port_id' => $destinationPortId, 'estimated_time' => $estimatedTime, 'distance' => $distance]);
    }
    public function deleteRoute(int $portId): void
    {
        $stmt = $this->pdo->prepare("DELETE FROM routes WHERE route_id = :port_id");
        $stmt->execute(['port_id' => $portId]);
    }
    public function getOneRoute($name): array
    {
        $stmt = $this->pdo->prepare("SELECT * FROM routes where name = :name");
        $stmt->execute(['name' => $name]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function getAllRoutesByCountryID(int $countryId): array
    {
        $stmt = $this->pdo->query("SELECT * FROM routes WHERE country_id = :country_id");
        $stmt->execute(['country_id' => $countryId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}