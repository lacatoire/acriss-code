<?php

declare(strict_types=1);

namespace Acriss\Model;

use Acriss\Enum\AcrissCategory;
use Acriss\Enum\AcrissType;
use Acriss\Enum\FuelAirConditioning;
use Acriss\Enum\TransmissionDrive;

readonly class AcrissCode
{
    public function __construct(
        public ?AcrissCategory $category,
        public ?AcrissType $type,
        public ?TransmissionDrive $transmission,
        public ?FuelAirConditioning $fuelAircon,
    ) {
    }

    public function toArray(): array
    {
        return [
            'category' => $this->category,
            'type' => $this->type,
            'transmission' => $this->transmission,
            'fuel_aircon' => $this->fuelAircon,
        ];
    }
}
