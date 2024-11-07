<?php

namespace App\Services;
use PDO;
use PDOException;

class IotService
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }
    public function getAllTemperatures(): array{
        $stmt = $this->pdo->query("SELECT * FROM temperatures");
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $data;
    }
    public function getArrayCheckValueTemperatures(): array{
        return $this->getAllTemperatures();
    }
    public function insertTemperature($temperature){
        $stmt = $this->pdo->prepare(query: "INSERT INTO container.temperatures (check_value,time) VALUES(3.5,'2004-12-11 00:00:00')");
    }

    ///
    public function getTemperatureById(int $temperatureId): array{
        $stmt = $this->pdo->prepare("SELECT * FROM temperatures WHERE temperature_id_iot");
        $stmt->execute(['temperature_id_iot' => $temperatureId]);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        return $data;
    }
}