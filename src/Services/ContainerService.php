<?php

namespace App\Services;
use App\Model\ContainerModel;
use Exception;
use PDO;

///Maintenances,Statuses,Container

class ContainerService
{
    private PDO $pdo;
    private SqlSupportServiceTemplate $sqlSupportService;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
        $this->sqlSupportService = new SqlSupportServiceTemplate($pdo);

    }
    ////statuses
    public function insertStatus(string $status,int $containerId): void
    {
        $stmt = $this->pdo->prepare("INSERT INTO statuses (status, container_id) VALUES (:status, :container_id)");
        $stmt->execute(['status' => $status, 'container_id' => $containerId]);
    }
    public function getOneStatusOfContainer($idContainer): array
    {
        $stmt = $this->pdo->prepare("SELECT * FROM statuses where container_id = :id ORDER BY status_id DESC LIMIT 1;");
        $stmt->execute(['id' => $idContainer]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function getAllStatusesOfContainer($idContainer): array
    {
        return $this->sqlSupportService::getById('statuses', 'container_id',$idContainer);
    }
    public function getStatusAllByClient(int $idContainer){
        $stmt = $this->pdo->prepare("SELECT 
    containers.container_id,
    containers.name AS container_name,
    containers.width,
    containers.length,
    containers.height,
    containers.country_id,
    countries.name AS country_name,
    containers.old,
    containers.iot,
    statuses.status AS container_status,
    statuses.update_at AS status_update_time,
    rentals.rental_id,
    rentals.start_date AS rental_start_date,
    rentals.end_date AS rental_end_date,
    rentals.status AS rental_status,
    rentals.price AS rental_price,
    routes.distance,
    shipments.departure_date AS shipment_departure_date,
    shipments.arrival_date AS shipment_arrival_date,
    shipments.status AS shipment_status,
    routes.origin_port_id,
    origin_ports.name AS origin_port_name,
    origin_ports.location AS origin_port_location,
    routes.destination_port_id,
    destination_ports.name AS destination_port_name,
    destination_ports.location AS destination_port_location
FROM 
    rentals
INNER JOIN 
    containers ON rentals.container_id = containers.container_id
INNER JOIN 
    clients ON rentals.client_id = clients.client_id
INNER JOIN 
    countries ON containers.country_id = countries.country_id
LEFT JOIN 
    statuses ON containers.container_id = statuses.container_id
    AND statuses.update_at = (
        SELECT 
            MAX(s.update_at)
        FROM 
            statuses AS s
        WHERE 
            s.container_id = containers.container_id
    )
LEFT JOIN 
    shipments ON rentals.rental_id = shipments.rental_id
LEFT JOIN 
    routes ON shipments.route_id = routes.route_id
LEFT JOIN 
    ports AS origin_ports ON routes.origin_port_id = origin_ports.port_id
LEFT JOIN 
    ports AS destination_ports ON routes.destination_port_id = destination_ports.port_id
WHERE 
    clients.client_id = :client_id;

        ");
        $stmt->execute([':client_id' => $idContainer]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getFreeStatusAllContainers(): array{
        $stmt = $this->pdo->prepare("SELECT 
            containers.container_id,
            containers.name AS container_name,
            containers.width,
            containers.length,
            containers.height,
            containers.country_id,
            countries.name AS country_name,
            containers.old,
            containers.iot,
            statuses.status,
            statuses.update_at,
            owners.name AS owner_name,
            owners.email AS owner_email,
            owners.phone_number AS owner_phone
        FROM 
            containers
        INNER JOIN 
            owners ON containers.owner_id = owners.owner_id
        INNER JOIN 
            countries ON containers.country_id = countries.country_id
        INNER JOIN 
            statuses ON containers.container_id = statuses.container_id
            AND statuses.update_at = (
                SELECT 
                    MAX(s2.update_at)
                FROM 
                    statuses AS s2
                WHERE 
                    s2.container_id = containers.container_id
            )
        WHERE 
            statuses.status = 'free';
        ");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    ////Container
    public function getAllContainers(): array
    {
        $data = $this->sqlSupportService::getAll('containers');

        $containers = [];
        foreach ($data as $containerData) {
            $containers[] = ContainerModel::fromArray($containerData);
        }

        return $containers;
    }
    public function getAllContainersByOwnerID(int $ownerId): array
    {
        $data = $this->sqlSupportService::getById('containers', 'owner_id',$ownerId);

        $containers = [];
        foreach ($data as $containerData) {
            $containers[] = ContainerModel::fromArray($containerData);
        }

        return $containers;
    }
    public function getOneContainer(string $id): ContainerModel
    {
        $containerData = $this->sqlSupportService::getById('containers', 'container_id',$id);
        return $containerData ? ContainerModel::fromArray($containerData) : ContainerModel::emptyContainerModel();
    }

    public function insertContainer(ContainerModel $container): void
    {
        $stmt = $this->pdo->prepare("INSERT INTO containers (name, width, length, height, country_id,owner_id,old,iot) VALUES (:name, :width, :length, :height, :country_id,:owner_id,:old,:iot)");
        $stmt->execute($container->toArray());
    }

    public function updateContainer(string $id, array $data): void
    {
        $stmt = $this->pdo->prepare("UPDATE containers SET old = :old, iot = :iot WHERE container_id = :id");
        $stmt->execute(['id' => $id, 'old' => $data['old'], 'iot' => $data['iot'],]);
    }

    public function deleteContainer(string $id): void
    {
        $this->sqlSupportService::delete('containers', 'container_id', $id);
    }

    public function generateImageHash(string $name): string
    {
        return hash('sha256', uniqid('', true) . pathinfo($name, PATHINFO_FILENAME)) . '.' . pathinfo($name, PATHINFO_EXTENSION);
    }

////maintenances
    public function insertMaintenance($description, $cost, $id): void
    {
        $stmt = $this->pdo->prepare("INSERT INTO maintenances (description, cost, container_id) VALUES (:description, :cost, :container_id)");
        $stmt->execute(['description' => $description, 'cost' => $cost, 'container_id' => $id]);
    }
    public function updateMaintenance(string $id, string $description, float $cost): void
    {
        $stmt = $this->pdo->prepare("UPDATE maintenances SET description = :description, cost = :cost WHERE container_id = :id");
        $stmt->execute([
            'id' => $id,
            'description' => $description,
            'cost' => $cost,
        ]);
    }
    public function deleteMaintenance(string $id): void
    {
        $this->sqlSupportService::delete('maintenances', 'maintenance_id', $id);
    }
    public function getAllMaintenanceByContainerID(int $containerId): array
    {
        return $this->sqlSupportService::getById('maintenances', 'container_id',$containerId);
    }
}