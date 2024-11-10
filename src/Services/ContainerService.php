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