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
        return $this->sqlSupportService::getById('countries', 'name', $name);
    }
    public function getOneCountryById($countryId): array
    {
        return $this->sqlSupportService::getById('countries', 'country_id', $countryId);
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
    public function getRoutesWithAllInformation(): array{
        $stmt = $this->pdo->prepare("SELECT 
            routes.route_id,
            routes.origin_port_id,
            origin_ports.name AS origin_port_name,
            origin_ports.location AS origin_port_location,
            origin_countries.name AS origin_country_name,
            routes.destination_port_id,
            destination_ports.name AS destination_port_name,
            destination_ports.location AS destination_port_location,
            destination_countries.name AS destination_country_name,
            routes.estimated_time,
            routes.distance
        FROM 
            routes
        INNER JOIN 
            ports AS origin_ports ON routes.origin_port_id = origin_ports.port_id
        INNER JOIN 
            countries AS origin_countries ON origin_ports.country_id = origin_countries.country_id
        INNER JOIN 
            ports AS destination_ports ON routes.destination_port_id = destination_ports.port_id
        INNER JOIN 
            countries AS destination_countries ON destination_ports.country_id = destination_countries.country_id
        WHERE 
            container.routes.origin_port_id IS NOT NULL 
            AND routes.destination_port_id IS NOT NULL;
        ");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getAllRoutesByDestinationAndOriginPortID(int $destinationPortID,int $originPortID): array
    {
        $stmt = $this->pdo->prepare("SELECT * FROM routes WHERE destination_port_id = :destination_port_id AND origin_port_id = :origin_port_id");
        $stmt->execute(['destination_port_id' => $destinationPortID, 'origin_port_id' => $originPortID]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}