<?php

namespace App\Services;
use App\Model\PeopleModel;
use Exception;
use PDO;

///Client,Owner
class PeopleService
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }
    public function deleteClient(string $clientId): void
    {
        $stmt = $this->pdo->prepare("DELETE FROM clients WHERE client_id = :id");
        $stmt->execute(['id' => $clientId]);
    }
    public function insertClients(string $name, string $email,int $countryId, string $surname = null, string $address = null, string $phoneNumber = null ): void
    {
        $stmt = $this->pdo->prepare("INSERT INTO clients (name, email,country_id, surname, address, phone_number) VALUES (:name, :email,:country_id, :surname, :address, :phone_number)");
        $stmt->execute(['name' => $name, 'email' => $email, 'country_id' => $countryId, 'surname' => $surname, 'address' => $address, 'phone_number' => $phoneNumber]);
    }
    public function getOneClient($idPeople): array
    {
        $stmt = $this->pdo->prepare("SELECT * FROM clients where client_id = :id");
        $stmt->execute(['id' => $idPeople]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function getAllClient(): array
    {
        $stmt = $this->pdo->prepare("SELECT * FROM clients");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getAllClientByCountryId($countryId): array
    {
        $stmt = $this->pdo->prepare("SELECT * FROM clients WHERE country_id = :id");
        $stmt->execute(['id' => $countryId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insertOwners(string $name, string $email, string $phoneNumber ): void
    {
        $stmt = $this->pdo->prepare("INSERT INTO owners (name, email,phone_number) VALUES (:name, :email,:phone_number)");
        $stmt->execute(['name' => $name, 'email' => $email, 'phone_number' => $phoneNumber]);
    }
    public function getOneOwners($ownerId): array
    {
        $stmt = $this->pdo->prepare("SELECT * FROM owners where owner_id = :id");
        $stmt->execute(['id' => $ownerId]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function getAllOwners(): array
    {
        $stmt = $this->pdo->prepare("SELECT * FROM owners");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function deleteOwner(string $ownerId): void
    {
        $stmt = $this->pdo->prepare("DELETE FROM owners WHERE owner_id = :id");
        $stmt->execute(['id' => $ownerId]);
    }
}