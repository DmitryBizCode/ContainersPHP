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

    //Temperatures
    public function getTemperatureById(int $id): array {
        $stmt = $this->pdo->prepare("SELECT * FROM temperatures WHERE temperature_id_iot = :id");
        $stmt->execute([':id' => $id]);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        return $data ?? [];
    }

    public function getAllTemperatures(): array{
        $stmt = $this->pdo->query("SELECT * FROM temperatures");
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $data;
    }

    public function getArrayCheckValueTemperatures(): array{
        return array_column($this->getAllTemperatures(), 'check_value');
    }

    public function getArrayTimeTemperatures(): array{
        return array_column($this->getAllTemperatures(), 'time');
    }

    public function insertTemperature(float $temperature){
        $stmt = $this->pdo->prepare("INSERT INTO temperatures (check_value,time) VALUES($temperature,CURRENT_TIMESTAMP)");
        $stmt->execute([':check_value' => $temperature]);
    }

    //Humidity
    public function getHumidityById(int $id): array {
        $stmt = $this->pdo->prepare("SELECT * FROM humidity WHERE humidity_id_iot = :id");
        $stmt->execute([':id' => $id]);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        return $data ?? [];
    }

    public function getAllHumidity(): array{
        $stmt = $this->pdo->query("SELECT * FROM humidity");
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $data ?? [];
    }
    public function getArrayCheckValueHumidity(): array{
        return array_column($this->getAllHumidity(), 'check_value');
    }

    public function getArrayTimeHumidity(): array{
        return array_column($this->getAllHumidity(), 'time');
    }

    public function insertHumidity(float $humidity){
        $stmt = $this->pdo->prepare("INSERT INTO temperatures (check_value,time) VALUES(:check_value,CURRENT_TIMESTAMP)");
        $stmt->execute([':check_value' => $humidity]);
    }

    // Vibrometers
    public function getVibrometerById(int $id): array {
        $stmt = $this->pdo->prepare("SELECT * FROM vibrometers WHERE vibrometer_id_iot = :id");
        $stmt->execute([':id' => $id]);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        return $data ?? [];
    }
    public function getAllVibrometers(): array{
        $stmt = $this->pdo->query("SELECT * FROM vibrometers");
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $data;
    }
    public function getArrayCheckValueVibrometers(): array{
        return array_column($this->getAllVibrometers(), 'check_value');
    }

    public function getArrayTimeVibrometers(): array{
        return array_column($this->getAllVibrometers(), 'time');
    }

    public function insertVibrometer(float $vibration){
        $stmt = $this->pdo->prepare("INSERT INTO vibrometers (check_value, time) VALUES(:check_value, CURRENT_TIMESTAMP)");
        $stmt->execute([':check_value' => $vibration]);
    }

// Inclines
    public function getInclineById(int $id): array {
        $stmt = $this->pdo->prepare("SELECT * FROM inclines WHERE incline_id_iot = :id");
        $stmt->execute([':id' => $id]);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        return $data ?? [];
    }
    public function getAllInclines(): array{
        $stmt = $this->pdo->query("SELECT * FROM inclines");
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $data;
    }
    public function getArrayCheckValueInclines(): array{
        return array_column($this->getAllInclines(), 'check_value');
    }

    public function getArrayTimeInclines(): array{
        return array_column($this->getAllInclines(), 'time');
    }

    public function insertIncline(float $incline){
        $stmt = $this->pdo->prepare("INSERT INTO inclines (check_value, time) VALUES(:check_value, CURRENT_TIMESTAMP)");
        $stmt->execute([':check_value' => $incline]);
    }

// Openings
    public function getOpeningById(int $id): array {
        $stmt = $this->pdo->prepare("SELECT * FROM openings WHERE open_id_iot = :id");
        $stmt->execute([':id' => $id]);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        return $data ?? [];
    }
    public function getAllOpenings(): array{
        $stmt = $this->pdo->query("SELECT * FROM openings");
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $data;
    }
    public function getArrayCheckValueOpenings(): array{
        return array_column($this->getAllOpenings(), 'check_value');
    }

    public function getArrayTimeOpenings(): array{
        return array_column($this->getAllOpenings(), 'time');
    }

    public function insertOpening(float $opening){
        $stmt = $this->pdo->prepare("INSERT INTO openings (check_value, time) VALUES(:check_value, CURRENT_TIMESTAMP)");
        $stmt->execute([':check_value' => $opening]);
    }

// GPS
    public function getGpsById(int $id): array {
        $stmt = $this->pdo->prepare("SELECT * FROM gps WHERE gps_id_iot = :id");
        $stmt->execute([':id' => $id]);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        return $data ?? [];
    }
    public function getAllGps(): array{
        $stmt = $this->pdo->query("SELECT * FROM gps");
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $data;
    }
    public function getArrayCheckValueGps(): array{
        return array_column($this->getAllGps(), 'check_value');
    }

    public function getArrayTimeGps(): array{
        return array_column($this->getAllGps(), 'time');
    }

    public function insertGps(float $gpsData){
        $stmt = $this->pdo->prepare("INSERT INTO gps (check_value, time) VALUES(:check_value, CURRENT_TIMESTAMP)");
        $stmt->execute([':check_value' => $gpsData]);
    }

// Illuminated
    public function getIlluminatedById(int $id): array {
        $stmt = $this->pdo->prepare("SELECT * FROM illuminated WHERE illuminate_id_iot = :id");
        $stmt->execute([':id' => $id]);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        return $data ?? [];
    }
    public function getAllIlluminated(): array{
        $stmt = $this->pdo->query("SELECT * FROM illuminated");
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $data;
    }
    public function getArrayCheckValueIlluminated(): array{
        return array_column($this->getAllIlluminated(), 'check_value');
    }

    public function getArrayTimeIlluminated(): array{
        return array_column($this->getAllIlluminated(), 'time');
    }

    public function insertIlluminated(float $illumination){
        $stmt = $this->pdo->prepare("INSERT INTO illuminated (check_value, time) VALUES(:check_value, CURRENT_TIMESTAMP)");
        $stmt->execute([':check_value' => $illumination]);
    }

// Gases
    public function getGasById(int $id): array {
        $stmt = $this->pdo->prepare("SELECT * FROM gases WHERE gas_id_iot = :id");
        $stmt->execute([':id' => $id]);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        return $data ?? [];
    }
    public function getAllGases(): array{
        $stmt = $this->pdo->query("SELECT * FROM gases");
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $data;
    }
    public function getArrayCheckValueGases(): array{
        return array_column($this->getAllGases(), 'check_value');
    }

    public function getArrayTimeGases(): array{
        return array_column($this->getAllGases(), 'time');
    }

    public function insertGas(float $gasLevel){
        $stmt = $this->pdo->prepare("INSERT INTO gases (check_value, time) VALUES(:check_value, CURRENT_TIMESTAMP)");
        $stmt->execute([':check_value' => $gasLevel]);
    }

}