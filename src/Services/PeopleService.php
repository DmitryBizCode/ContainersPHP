<?php

namespace App\Services;
use App\Model\PeopleModel;
use Exception;
use PDO;

///Client,Owner
class PeopleService
{
    private PDO $pdo;
    private SqlSupportServiceTemplate $sqlSupportService;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
        $this->sqlSupportService = new SqlSupportServiceTemplate($pdo);
    }
    public function deleteClient(string $clientId): void
    {
        $this->sqlSupportService::delete('clients', 'client_id', $clientId);
    }
    public function insertClients(string $name, string $email,int $countryId, string $surname = null, string $address = null, string $phoneNumber = null ): void
    {
        $stmt = $this->pdo->prepare("INSERT INTO clients (name, email,country_id, surname, address, phone_number) VALUES (:name, :email,:country_id, :surname, :address, :phone_number)");
        $stmt->execute(['name' => $name, 'email' => $email, 'country_id' => $countryId, 'surname' => $surname, 'address' => $address, 'phone_number' => $phoneNumber]);
    }
    public function getOneClient($clientId): array
    {
        return $this->sqlSupportService::getById('clients', 'client_id', $clientId);
    }
    public function getAllClient(): array
    {
        return $this->sqlSupportService::getAll('clients');
    }
    public function getAllClientByCountryId($countryId): array
    {
        return $this->sqlSupportService::getById('clients', 'country_id', $countryId);
    }

    public function insertOwners(string $name, string $email, string $phoneNumber ): void
    {
        $stmt = $this->pdo->prepare("INSERT INTO owners (name, email,phone_number) VALUES (:name, :email,:phone_number)");
        $stmt->execute(['name' => $name, 'email' => $email, 'phone_number' => $phoneNumber]);
    }
    public function getOneOwners($ownerId): array
    {
        return $this->sqlSupportService::getById('owners', 'owner_id', $ownerId);
    }
    public function getAllOwners(): array
    {
        return $this->sqlSupportService::getAll('owners');;
    }
    public function deleteOwner(string $ownerId): void
    {
        $this->sqlSupportService::delete('owners', 'owner_id', $ownerId);
    }
}