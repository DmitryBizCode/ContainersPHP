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
    private function getAll(string $tableName):array {
        $stmt = $this->pdo->prepare("SELECT * FROM $tableName");
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $data ?? [];
    }
    private function getById(string $tableName, string $idTableName,int $id):array {
        $stmt = $this->pdo->prepare("SELECT * FROM $tableName WHERE $idTableName = :id");
        $stmt->execute([':id' => $id]);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        return $data ?? [];
    }
    public function insertTable(string $tableName, float $checkValue){
        $stmt = $this->pdo->prepare("INSERT INTO $tableName (check_value, time) VALUES(:check_value, CURRENT_TIMESTAMP)");
        $stmt->execute([':check_value' => $checkValue]);
    }

    //Temperatures
    public function getTemperatureById(int $id): array {
        return $this->getById('temperatures', 'temperature_id_iot',$id);
    }

    public function getAllTemperatures(): array{
        return $this->getAll('temperatures');
    }

    public function getArrayCheckValueTemperatures(): array{
        return array_column($this->getAllTemperatures(), 'check_value');
    }

    public function getArrayTimeTemperatures(): array{
        return array_column($this->getAllTemperatures(), 'time');
    }

    public function insertTemperature(float $temperature){
        $this->insertTable('temperatures', $temperature);
    }

    //Humidity
    public function getHumidityById(int $id): array {
        return $this->getById('humidity', 'humidity_id_iot',$id);
    }

    public function getAllHumidity(): array{
        return $this->getAll('humidity');
    }
    public function getArrayCheckValueHumidity(): array{
        return array_column($this->getAllHumidity(), 'check_value');
    }

    public function getArrayTimeHumidity(): array{
        return array_column($this->getAllHumidity(), 'time');
    }

    public function insertHumidity(float $humidity){
        $this->insertTable('humidity', $humidity);
    }

    // Vibrometers
    public function getVibrometerById(int $id): array {
        return $this->getById('vibrometers', 'vibrometer_id_iot',$id);
    }
    public function getAllVibrometers(): array{
        return $this->getAll('vibrometers');
    }
    public function getArrayCheckValueVibrometers(): array{
        return array_column($this->getAllVibrometers(), 'check_value');
    }

    public function getArrayTimeVibrometers(): array{
        return array_column($this->getAllVibrometers(), 'time');
    }

    public function insertVibrometer(float $vibration){
        $this->insertTable('vibrometers', $vibration);
    }

    // Inclines
    public function getInclineById(int $id): array {
        return $this->getById('inclines', 'incline_id_iot',$id);
    }
    public function getAllInclines(): array{
        return $this->getAll('inclines');
    }
    public function getArrayCheckValueInclines(): array{
        return array_column($this->getAllInclines(), 'check_value');
    }

    public function getArrayTimeInclines(): array{
        return array_column($this->getAllInclines(), 'time');
    }

    public function insertIncline(float $incline){
        $this->insertTable('inclines', $incline);
    }

    // Openings
    public function getOpeningById(int $id): array {
        return $this->getById('openings', 'open_id_iot',$id);
    }
    public function getAllOpenings(): array{
        return $this->getAll('openings');
    }
    public function getArrayCheckValueOpenings(): array{
        return array_column($this->getAllOpenings(), 'check_value');
    }

    public function getArrayTimeOpenings(): array{
        return array_column($this->getAllOpenings(), 'time');
    }

    public function insertOpening(float $opening){
        $this->insertTable('openings', $opening);
    }

    // GPS
    public function getGpsById(int $id): array {
        return $this->getById('gps', 'gps_id_iot',$id);
    }
    public function getAllGps(): array{
        return $this->getAll('gps');
    }
    public function getArrayCheckValueGps(): array{
        return array_column($this->getAllGps(), 'check_value');
    }

    public function getArrayTimeGps(): array{
        return array_column($this->getAllGps(), 'time');
    }

    public function insertGps(float $gpsData){
        $this->insertTable('gps', $gpsData);
    }

    // Illuminated
    public function getIlluminatedById(int $id): array {
        return $this->getById('illuminated', 'illuminate_id_iot',$id);
    }
    public function getAllIlluminated(): array{
        return $this->getAll('illuminated');
    }
    public function getArrayCheckValueIlluminated(): array{
        return array_column($this->getAllIlluminated(), 'check_value');
    }

    public function getArrayTimeIlluminated(): array{
        return array_column($this->getAllIlluminated(), 'time');
    }

    public function insertIlluminated(float $illumination){
        $this->insertTable('illuminated', $illumination);
    }

    // Gases
    public function getGasById(int $id): array {
        return $this->getById('gases', 'gas_id_iot',$id);
    }
    public function getAllGases(): array{
        return $this->getAll('gases');
    }
    public function getArrayCheckValueGases(): array{
        return array_column($this->getAllGases(), 'check_value');
    }

    public function getArrayTimeGases(): array{
        return array_column($this->getAllGases(), 'time');
    }

    public function insertGas(float $gasLevel){
        $this->insertTable('gases', $gasLevel);
    }
}