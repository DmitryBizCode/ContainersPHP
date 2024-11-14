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

    public function insertTable(int $containerId, string $type, float $value, string $time = null): void
    {
        $stmt = $this->pdo->prepare("INSERT INTO metrics (container_id,type,value,time) VALUES(:container_id, :type, :value,:time)");
        $stmt->execute([':container_id' => $containerId, ':type' => $type, ':value' => $value, ':time' => $time]);
    }

    public function getByIdForIot(string $type, int $containerId): array
    {
        $stmt = $this->pdo->prepare("SELECT * FROM metrics WHERE type = :type AND container_id = :container_id");
        $stmt->execute([':type' => $type, ':container_id' => $containerId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC) ?? [];
    }

    public function getById(int $id): array
    {
        return $this->sqlSupportService::getById('metrics', 'metric_id', $id);
    }

    // Temperatures
    public function getAllTemperaturesByContainerId(int $containerId): array
    {
        return $this->getByIdForIot('temperatures', $containerId);
    }

    public function getArrayTimeTemperatures(int $containerId): array
    {
        return array_column($this->getAllTemperaturesByContainerId($containerId), 'time');
    }

    public function getArrayValueTemperatures(int $containerId): array
    {
        return array_column($this->getAllTemperaturesByContainerId($containerId), 'value');
    }

    public function insertTemperature(float $temperature, int $containerId): void
    {
        $this->insertTable($containerId, 'temperatures', $temperature);
    }

    // Humidity
    public function getAllHumidityByContainerId(int $containerId): array
    {
        return $this->getByIdForIot('humidity', $containerId);
    }

    public function getArrayTimeHumidity(int $containerId): array
    {
        return array_column($this->getAllHumidityByContainerId($containerId), 'time');
    }

    public function getArrayValueHumidity(int $containerId): array
    {
        return array_column($this->getAllHumidityByContainerId($containerId), 'value');
    }

    public function insertHumidity(float $humidity, int $containerId): void
    {
        $this->insertTable($containerId, 'humidity', $humidity);
    }

    // Vibrometers
    public function getAllVibrometersByContainerId(int $containerId): array
    {
        return $this->getByIdForIot('vibrometers', $containerId);
    }

    public function getArrayTimeVibrometers(int $containerId): array
    {
        return array_column($this->getAllVibrometersByContainerId($containerId), 'time');
    }

    public function getArrayValueVibrometers(int $containerId): array
    {
        return array_column($this->getAllVibrometersByContainerId($containerId), 'value');
    }

    public function insertVibrometer(float $vibration, int $containerId): void
    {
        $this->insertTable($containerId, 'vibrometers', $vibration);
    }

    // Inclines
    public function getAllInclinesByContainerId(int $containerId): array
    {
        return $this->getByIdForIot('inclines', $containerId);
    }

    public function getArrayTimeInclines(int $containerId): array
    {
        return array_column($this->getAllInclinesByContainerId($containerId), 'time');
    }

    public function getArrayValueInclines(int $containerId): array
    {
        return array_column($this->getAllInclinesByContainerId($containerId), 'value');
    }

    public function insertIncline(float $incline, int $containerId): void
    {
        $this->insertTable($containerId, 'inclines', $incline);
    }

    // Openings
    public function getAllOpeningsByContainerId(int $containerId): array
    {
        return $this->getByIdForIot('openings', $containerId);
    }

    public function getArrayTimeOpenings(int $containerId): array
    {
        return array_column($this->getAllOpeningsByContainerId($containerId), 'time');
    }

    public function getArrayValueOpenings(int $containerId): array
    {
        return array_column($this->getAllOpeningsByContainerId($containerId), 'value');
    }

    public function insertOpening(float $opening, int $containerId): void
    {
        $this->insertTable($containerId, 'openings', $opening);
    }

    // GPS
    public function getAllGpsByContainerId(int $containerId): array
    {
        return $this->getByIdForIot('gps', $containerId);
    }

    public function getArrayTimeGps(int $containerId): array
    {
        return array_column($this->getAllGpsByContainerId($containerId), 'time');
    }

    public function getArrayValueGps(int $containerId): array
    {
        return array_column($this->getAllGpsByContainerId($containerId), 'value');
    }

    public function insertGps(float $gps, int $containerId): void
    {
        $this->insertTable($containerId, 'gps', $gps);
    }

    // Illuminated
    public function getAllIlluminatedByContainerId(int $containerId): array
    {
        return $this->getByIdForIot('illuminated', $containerId);
    }

    public function getArrayTimeIlluminated(int $containerId): array
    {
        return array_column($this->getAllIlluminatedByContainerId($containerId), 'time');
    }

    public function getArrayValueIlluminated(int $containerId): array
    {
        return array_column($this->getAllIlluminatedByContainerId($containerId), 'value');
    }

    public function insertIlluminated(float $illuminated, int $containerId): void
    {
        $this->insertTable($containerId, 'illuminated', $illuminated);
    }

    // Gases
    public function getAllGasesByContainerId(int $containerId): array
    {
        return $this->getByIdForIot('gases', $containerId);
    }

    public function getArrayTimeGases(int $containerId): array
    {
        return array_column($this->getAllGasesByContainerId($containerId), 'time');
    }

    public function getArrayValueGases(int $containerId): array
    {
        return array_column($this->getAllGasesByContainerId($containerId), 'value');
    }

    public function insertGas(float $gas, int $containerId): void
    {
        $this->insertTable($containerId, 'gases', $gas);
    }
}