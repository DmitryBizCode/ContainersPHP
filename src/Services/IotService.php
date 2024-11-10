<?php

namespace App\Services;
use PDO;
use PDOException;

class IotService
{
    private PDO $pdo;
    private SqlSupportServiceTemplate  $sqlSupportService;
    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
        $this->sqlSupportService = new SqlSupportServiceTemplate($pdo);
    }
    public function insertTable(string $tableName, float $checkValue, int $containerId): void
    {
        $stmt = $this->pdo->prepare("INSERT INTO $tableName (check_value, time, container_id) VALUES(:check_value, CURRENT_TIMESTAMP, :container_id)");
        $stmt->execute([':check_value' => $checkValue, ':container_id' => $containerId]);
    }

    //Temperatures
    public function getTemperatureById(int $id): array {
        return $this->sqlSupportService::getById('temperatures', 'temperature_id_iot',$id);
    }

    public function getAllTemperaturesByContainerId(int $containerId): array{
        return $this->sqlSupportService::getById('temperatures', 'container_id', $containerId);
    }

    public function getArrayCheckValueTemperatures(int $containerId): array{
        return array_column($this->getAllTemperaturesByContainerId($containerId), 'check_value');
    }

    public function getArrayTimeTemperatures(int $containerId): array{
        return array_column($this->getAllTemperaturesByContainerId($containerId), 'time');
    }

    public function insertTemperature(float $temperature, int $containerId): void{
        $this->insertTable('temperatures', $temperature, $containerId);
    }

    //Humidity
    public function getHumidityById(int $id): array {
        return $this->sqlSupportService::getById('humidity', 'humidity_id_iot',$id);
    }

    public function getAllHumidityByContainerId(int $containerId): array{
        return $this->sqlSupportService::getById('humidity', 'container_id', $containerId);
    }
    public function getArrayCheckValueHumidity(int $containerId): array{
        return array_column($this->getAllHumidityByContainerId($containerId), 'check_value');
    }

    public function getArrayTimeHumidity(int $containerId): array{

        return array_column($this->getAllHumidityByContainerId($containerId), 'time');
    }

    public function insertHumidity(float $humidity, int $containerId): void{
        $this->insertTable('humidity', $humidity, $containerId);
    }

    // Vibrometers
    public function getVibrometerById(int $id): array {
        return $this->sqlSupportService::getById('vibrometers', 'vibrometer_id_iot',$id);
    }
    public function getAllVibrometersByContainerId(int $containerId): array{
        return $this->sqlSupportService::getById('vibrometers', 'container_id',$containerId);
    }
    public function getArrayCheckValueVibrometers(int $containerId): array{
        return array_column($this->getAllVibrometersByContainerId($containerId), 'check_value');
    }

    public function getArrayTimeVibrometers(int $containerId): array{
        return array_column($this->getAllVibrometersByContainerId($containerId), 'time');
    }

    public function insertVibrometer(float $vibration, int $containerId): void{
        $this->insertTable('vibrometers', $vibration, $containerId);
    }

    // Inclines
    public function getInclineById(int $id): array {
        return $this->sqlSupportService::getById('inclines', 'incline_id_iot',$id);
    }
    public function getAllInclinesByContainerId(int $containerId): array{
        return $this->sqlSupportService::getById('inclines', 'container_id',$containerId);
    }
    public function getArrayCheckValueInclines(int $containerId): array{
        return array_column($this->getAllInclinesByContainerId($containerId), 'check_value');
    }

    public function getArrayTimeInclines(int $containerId): array{
        return array_column($this->getAllInclinesByContainerId($containerId), 'time');
    }

    public function insertIncline(float $incline, int $containerId): void{
        $this->insertTable('inclines', $incline, $containerId);
    }

    // Openings
    public function getOpeningById(int $id): array {
        return $this->sqlSupportService::getById('openings', 'open_id_iot',$id);
    }
    public function getAllOpeningsByContainerId(int $containerId): array{
        return $this->sqlSupportService::getById('openings', 'container_id',$containerId);
    }
    public function getArrayCheckValueOpenings(int $containerId): array{
        return array_column($this->getAllOpeningsByContainerId($containerId), 'check_value');
    }

    public function getArrayTimeOpenings(int $containerId): array{
        return array_column($this->getAllOpeningsByContainerId($containerId), 'time');
    }

    public function insertOpening(float $opening, int $containerId): void{
        $this->insertTable('openings', $opening, $containerId);
    }

    // GPS
    public function getGpsById(int $id): array {
        return $this->sqlSupportService::getById('gps', 'gps_id_iot',$id);
    }
    public function getAllGpsByContainerId(int $containerId): array{
        return $this->sqlSupportService::getById('gps', 'container_id',$containerId);
    }
    public function getArrayCheckValueGps(int $containerId): array{
        return array_column($this->getAllGpsByContainerId($containerId), 'check_value');
    }

    public function getArrayTimeGps(int $containerId): array{
        return array_column($this->getAllGpsByContainerId($containerId), 'time');
    }

    public function insertGps(float $gpsData, int $containerId): void{
        $this->insertTable('gps', $gpsData, $containerId);
    }

    // Illuminated
    public function getIlluminatedById(int $id): array {
        return $this->sqlSupportService::getById('illuminated', 'illuminate_id_iot',$id);
    }
    public function getAllIlluminatedByContainerId(int $containerId): array{
        return $this->sqlSupportService::getById('illuminated', 'container_id',$containerId);
    }
    public function getArrayCheckValueIlluminated(int $containerId): array{
        return array_column($this->getAllIlluminatedByContainerId($containerId), 'check_value');
    }

    public function getArrayTimeIlluminated(int $containerId): array{
        return array_column($this->getAllIlluminatedByContainerId($containerId), 'time');
    }

    public function insertIlluminated(float $illumination, int $containerId): void{
        $this->insertTable('illuminated', $illumination, $containerId);
    }

    // Gases
    public function getGasById(int $id): array {
        return $this->sqlSupportService::getById('gases', 'gas_id_iot',$id);
    }
    public function getAllGasesByContainerId(int $containerId): array{
        return $this->sqlSupportService::getById('gases', 'container_id',$containerId);
    }
    public function getArrayCheckValueGases(int $containerId): array{
        return array_column($this->getAllGasesByContainerId($containerId), 'check_value');
    }

    public function getArrayTimeGases(int $containerId): array{
        return array_column($this->getAllGasesByContainerId($containerId), 'time');
    }

    public function insertGas(float $gasLevel, int $containerId): void{
        $this->insertTable('gases', $gasLevel, $containerId);
    }
}