<?php

namespace App\Model;

class ContainerModel
{
    public float $width;
    public float $height;
    public float $length;
    public int $id;
    public bool $iot;
    public int $old;
    public function __construct(int $id, float $width, float $height, float $length, $iot, $old){
        $this->id = $id;
        $this->width = $width;
        $this->height = $height;
        $this->length = $length;
        $this->iot = $iot;
        $this->old = $old;
    }
    public function toArray(): array{
        return [
            'id' => $this->id,
            'width' => $this->width,
            'height' => $this->height,
            'length' => $this->length,
            'iot' => $this->iot,
            'old' => $this->old
        ];
    }
    public static function fromArray($data): self {
        return new self(
            $data['id'] ?? '',
            $data['width'] ?? '',
            $data['height'] ?? '',
            $data['length'] ?? '',
            $data['iot'] ?? false,
            $data['old'] ?? ''
        );

    }
    public static function emptyContainer(): ContainerModel {
        return self::fromArray([]);
    }

}