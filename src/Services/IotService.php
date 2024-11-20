<?php

namespace App\Services;
use PDO;
use PDOException;

class IotService
{
    private PDO $pdo;
    private SqlSupportServiceTemplate $sqlSupportService;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
        $this->sqlSupportService = new SqlSupportServiceTemplate($pdo);
    }
    public function getLatestElementIoT($type, $containerId, $rental_id){
        $stmt = $this->pdo->prepare("SELECT * FROM metrics WHERE type = :type AND container_id = :container_id AND rental_id = :rental_id ORDER BY metric_id DESC LIMIT 1");
        $stmt->execute([':type' => $type, ':container_id' => $containerId, ':rental_id' => $rental_id]);
        return $stmt->fetch(PDO::FETCH_ASSOC) ?? [];
    }
    public function getElementIoTByRental($type, $containerId, $rental_id){
        $stmt = $this->pdo->prepare("SELECT * FROM metrics WHERE type = :type AND container_id = :container_id AND rental_id = :rental_id");
        $stmt->execute([':type' => $type, ':container_id' => $containerId, ':rental_id' => $rental_id]);
        return $stmt->fetchall(PDO::FETCH_ASSOC) ?? [];
    }
    public function insertTable(int $containerId, int $rental_id, string $type, float $value, string $time = null): void
    {
        if ($time === null) {
            $stmt = $this->pdo->prepare("
            INSERT INTO metrics (container_id, rental_id, type, value) 
            VALUES (:container_id, :rental_id, :type, :value)
        ");
            $stmt->execute([
                ':container_id' => $containerId,
                ':rental_id' => $rental_id,
                ':type' => $type,
                ':value' => $value
            ]);
        } else {
            $stmt = $this->pdo->prepare("
            INSERT INTO metrics (container_id, rental_id, type, value, time) 
            VALUES (:container_id, :rental_id, :type, :value, :time)
        ");
            $stmt->execute([
                ':container_id' => $containerId,
                ':rental_id' => $rental_id,
                ':type' => $type,
                ':value' => $value,
                ':time' => $time
            ]);
        }
    }

    public function getByIdForIot(string $type,int $rental_id, int $containerId): array
    {
        $stmt = $this->pdo->prepare("SELECT * FROM metrics WHERE type = :type AND container_id = :container_id AND rental_id = :rental_id");
        $stmt->execute([':type' => $type, ':container_id' => $containerId, ':rental_id' => $rental_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC) ?? [];
    }

    public function getById(int $id): array
    {
        return $this->sqlSupportService::getById('metrics', 'metric_id', $id);
    }

    // Temperatures
    public function getAllTemperaturesByContainerId(int $containerId,int $rental_id): array
    {
        return $this->getByIdForIot('temperatures',$rental_id, $containerId);
    }

    public function getArrayTimeTemperatures(int $containerId,int $rental_id): array
    {
        return array_column($this->getAllTemperaturesByContainerId($containerId,$rental_id), 'time');
    }

    public function getArrayValueTemperatures(int $containerId,int $rental_id): array
    {
        return array_column($this->getAllTemperaturesByContainerId($containerId, $rental_id), 'value');
    }

    public function insertTemperature(float $temperature, int $containerId,int $rental_id): void
    {
        $this->insertTable($containerId, $rental_id, 'temperatures',$temperature);
    }

    // Humidity
    public function getAllHumidityByContainerId(int $containerId,int $rental_id): array
    {
        return $this->getByIdForIot('humidity',$rental_id, $containerId);
    }

    public function getArrayTimeHumidity(int $containerId,int $rental_id): array
    {
        return array_column($this->getAllHumidityByContainerId($containerId), 'time');
    }

    public function getArrayValueHumidity(int $containerId,int $rental_id): array
    {
        return array_column($this->getAllHumidityByContainerId($containerId), 'value');
    }

    public function insertHumidity(float $humidity, int $containerId,int $rental_id): void
    {
        $this->insertTable($containerId, $rental_id,'humidity', $humidity);
    }

    // Vibrometers
    public function getAllVibrometersByContainerId(int $containerId,int $rental_id): array
    {
        return $this->getByIdForIot('vibrometers',$rental_id, $containerId);
    }

    public function getArrayTimeVibrometers(int $containerId,int $rental_id): array
    {
        return array_column($this->getAllVibrometersByContainerId($containerId), 'time');
    }

    public function getArrayValueVibrometers(int $containerId,int $rental_id): array
    {
        return array_column($this->getAllVibrometersByContainerId($containerId), 'value');
    }

    public function insertVibrometer(float $vibration, int $containerId,int $rental_id): void
    {
        $this->insertTable($containerId,$rental_id, 'vibrometers', $vibration);
    }

    // Inclines
    public function getAllInclinesByContainerId(int $containerId,int $rental_id): array
    {
        return $this->getByIdForIot('inclines',$rental_id, $containerId);
    }

    public function getArrayTimeInclines(int $containerId,int $rental_id): array
    {
        return array_column($this->getAllInclinesByContainerId($containerId), 'time');
    }

    public function getArrayValueInclines(int $containerId,int $rental_id): array
    {
        return array_column($this->getAllInclinesByContainerId($containerId), 'value');
    }

    public function insertIncline(float $incline, int $containerId,int $rental_id): void
    {
        $this->insertTable($containerId, $rental_id,'inclines', $incline);
    }

    // Openings
    public function getAllOpeningsByContainerId(int $containerId,int $rental_id): array
    {
        return $this->getByIdForIot('openings',$rental_id, $containerId);
    }

    public function getArrayTimeOpenings(int $containerId,int $rental_id): array
    {
        return array_column($this->getAllOpeningsByContainerId($containerId), 'time');
    }

    public function getArrayValueOpenings(int $containerId,int $rental_id): array
    {
        return array_column($this->getAllOpeningsByContainerId($containerId), 'value');
    }

    public function insertOpening(float $opening, int $containerId,int $rental_id): void
    {
        $this->insertTable($containerId,$rental_id, 'openings', $opening);
    }

    // GPS
    public function getAllGpsByContainerId(int $containerId,int $rental_id): array
    {
        return $this->getByIdForIot('gps',$rental_id, $containerId);
    }

    public function getArrayTimeGps(int $containerId,int $rental_id): array
    {
        return array_column($this->getAllGpsByContainerId($containerId), 'time');
    }

    public function getArrayValueGps(int $containerId,int $rental_id): array
    {
        return array_column($this->getAllGpsByContainerId($containerId), 'value');
    }

    public function insertGps(float $gps, int $containerId,int $rental_id): void
    {
        $this->insertTable($containerId, 'gps', $gps);
    }

    // Illuminated
    public function getAllIlluminatedByContainerId(int $containerId,int $rental_id): array
    {
        return $this->getByIdForIot('illuminated',$rental_id, $containerId);
    }

    public function getArrayTimeIlluminated(int $containerId,int $rental_id): array
    {
        return array_column($this->getAllIlluminatedByContainerId($containerId), 'time');
    }

    public function getArrayValueIlluminated(int $containerId,int $rental_id): array
    {
        return array_column($this->getAllIlluminatedByContainerId($containerId), 'value');
    }

    public function insertIlluminated(float $illuminated, int $containerId,int $rental_id): void
    {
        $this->insertTable($containerId, 'illuminated', $illuminated);
    }

    // Gases
    public function getAllGasesByContainerId(int $containerId,int $rental_id): array
    {
        return $this->getByIdForIot('gases',$rental_id, $containerId);
    }

    public function getArrayTimeGases(int $containerId,int $rental_id): array
    {
        return array_column($this->getAllGasesByContainerId($containerId), 'time');
    }

    public function getArrayValueGases(int $containerId,int $rental_id): array
    {
        return array_column($this->getAllGasesByContainerId($containerId), 'value');
    }

    public function insertGas(float $gas, int $containerId,int $rental_id): void
    {
        $this->insertTable($containerId, $rental_id, 'gases', $gas);
    }
}