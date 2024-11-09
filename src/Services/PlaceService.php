<?php

namespace App\Services;

use App\Model\ContainerModel;
use PDO;


//Countries,Ports,Routes

class PlaceService
{
    private PDO $pdo;
    private SqlSupportServiceTemplate $sqlSupportService;

    public function __construct(PDO $pdo)
    {
        $this->sqlSupportService = new SqlSupportServiceTemplate($pdo);
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
        $this->sqlSupportService::delete('ports', 'port_id', $portId);
    }
    public function getOnePorts($name): array
    {
        $stmt = $this->pdo->prepare("SELECT * FROM ports where name = :name");
        $stmt->execute(['name' => $name]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function getAllPortsByCountryID(int $countryId): array
    {
        return $this->sqlSupportService::getById('ports', 'country_id', $countryId);
    }
//Routes
    public function insertRoute(int $originPortId,int $destinationPortId, int $estimatedTime, float $distance): void
    {
        $stmt = $this->pdo->prepare("INSERT INTO routes (origin_port_id, destination_port_id,estimated_time,distance) VALUES (:origin_port_id, :destination_port_id,:estimated_time,:distance)");
        $stmt->execute(['origin_port_id' => $originPortId, 'destination_port_id' => $destinationPortId, 'estimated_time' => $estimatedTime, 'distance' => $distance]);
    }
    public function deleteRoute(int $routeId): void
    {
        $this->sqlSupportService::delete('routes', 'route_id', $routeId);
    }
    public function getOneRoute($routeId): array
    {
        return $this->sqlSupportService::getById('routes', 'route_id', $routeId);
    }
    public function getAllRoutesByOriginPortID(int $originPortID): array
    {
        return $this->sqlSupportService::getById('routes', 'origin_port_id', $originPortID);
    }
    public function getAllRoutesByDestinationPortID(int $destinationPortID): array
    {
        return $this->sqlSupportService::getById('routes', 'destination_port_id', $destinationPortID);
    }
    public function getAllRoutesByDestinationAndOriginPortID(int $destinationPortID,int $originPortID): array
    {
        $stmt = $this->pdo->prepare("SELECT * FROM routes WHERE destination_port_id = :destination_port_id AND origin_port_id = :origin_port_id");
        $stmt->execute(['destination_port_id' => $destinationPortID, 'origin_port_id' => $originPortID]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}