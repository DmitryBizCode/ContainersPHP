<?php

namespace App\Model;

class PeopleModel
{
    public string $name;
    public string $surname;

    public string $email;
    public string $phone_number;
    public string $address;
    public int $id_people;
    public function __construct(int $id_people,string $name, string $email, string $phone_number = null,string $surname = null, string $address = null){
        $this->id_people = $id_people;
        $this->name = $name;
        $this->surname = $surname;
        $this->email = $email;
        $this->phone_number = $phone_number;
        $this->address = $address;
    }
    public function toArray(): array {
        $data = [
            'id_people' => $this->id_people,
            'name' => $this->name,
            'email' => $this->email,
            'phone_number' => $this->phone_number ?? null,
            'address' => $this->address ?? null,
            'surname' => $this->surname ?? null
        ];

        return array_filter($data, fn($value) => $value !== null);
    }

    public static function fromArray($data): self {
        return new self(
            $data['id_people'] ?? 0,
            $data['name'] ?? '',
            $data['email'] ?? '',
            $data['phone_number'] ?? null,
            $data['surname'] ?? null,
            $data['address'] ?? null,
        );
    }
    public static function emptyPeopleModel(): PeopleModel {
        return self::fromArray([]);
    }
}