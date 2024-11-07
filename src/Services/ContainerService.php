<?php

namespace App\Services;
use App\Model\ContainerModel;
use Exception;
use PDO;
class ContainerService
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }
    public function insertStatuses(string $status,int $container_id): void
    {
        $stmt = $this->pdo->prepare("INSERT INTO statuses (status, container_id) VALUES (:status, :container_id)");
        $stmt->execute(['status' => $status, 'container_id' => $container_id]);
    }
    public function getOneStatusesOfContainer($id_container): array
    {
        $stmt = $this->pdo->prepare("SELECT * FROM statuses where container_id = :id ORDER BY status_id DESC LIMIT 1;");
        $stmt->execute(['id' => $id_container]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getAllStatusesOfContainer($id_container): array
    {
        $stmt = $this->pdo->prepare("SELECT * FROM statuses where container_id = :id");
        $stmt->execute(['id' => $id_container]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAllContainer(): array
    {
        $stmt = $this->pdo->query("SELECT * FROM containers");
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $containers = [];
        foreach ($data as $containerData) {
            $containers[] = ContainerModel::fromArray($containerData);
        }

        return $containers;
    }

    public function getOne(string $id): ContainerModel
    {
        $stmt = $this->pdo->prepare("SELECT * FROM containers WHERE container_id = :id");
        $stmt->execute(['id' => $id]);
        $containerData = $stmt->fetch(PDO::FETCH_ASSOC);

        return $containerData ? ContainerModel::fromArray($containerData) : ContainerModel::emptyContainerModel();
    }

    public function insertContainers(ContainerModel $container): void
    {
        $stmt = $this->pdo->prepare("INSERT INTO containers (name, width, length, height, country_id,owner_id,old,iot) VALUES (:name, :width, :length, :height, :country_id,:owner_id,:old,:iot)");
        $stmt->execute($container->toArray());
    }

    public function update(string $id, array $data): void
    {
        $stmt = $this->pdo->prepare("UPDATE containers SET old = :old, iot = :iot WHERE container_id = :id");
        $stmt->execute([
            'id' => $id,
            'old' => $data['old'],
            'iot' => $data['iot'],
        ]);
    }

    public function delete(string $id): void
    {
        $stmt = $this->pdo->prepare("DELETE FROM containers WHERE container_id = :id");
        $stmt->execute(['id' => $id]);
    }

    public function generateImageHash(string $name): string
    {
        return hash('sha256', uniqid('', true) . pathinfo($name, PATHINFO_FILENAME)) . '.' . pathinfo($name, PATHINFO_EXTENSION);
    }


    ///maintenances
}