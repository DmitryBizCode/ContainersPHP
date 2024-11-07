<?php

namespace App\Services;

use App\Model\ContainerModel;
use PDO;

class PlaceService
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }
    public function insertCountries(string $name,int $interest_tax): void
    {
        $stmt = $this->pdo->prepare("INSERT INTO countries (name, interest_tax) VALUES (:name, :interest_tax)");
        $stmt->execute(['name' => $name, 'interest_tax' => $interest_tax]);
    }
    public function getOneCountry($name): array
    {
        $stmt = $this->pdo->prepare("SELECT * FROM countries where name = :name");
        $stmt->execute(['name' => $name]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function insertPorts(string $name,int $location, int $country_id): void
    {
        $stmt = $this->pdo->prepare("INSERT INTO ports (name, location,country_id) VALUES (:name, :location,:country_id)");
        $stmt->execute(['name' => $name, 'location' => $location, 'country_id' => $country_id]);
    }
    public function deletePorts(int $port_id): void
    {
        $stmt = $this->pdo->prepare("DELETE FROM ports WHERE port_id = :port_id");
        $stmt->execute(['port_id' => $port_id]);
    }
    public function getOnePorts($name): array
    {
        $stmt = $this->pdo->prepare("SELECT * FROM ports where name = :name");
        $stmt->execute(['name' => $name]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

}