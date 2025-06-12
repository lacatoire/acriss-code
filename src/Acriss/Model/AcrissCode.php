<?php
declare(strict_types=1);

namespace Acriss\Model;

use Acriss\Enum\AcrissCategory;
use Acriss\Enum\AcrissType;
use Acriss\Enum\TransmissionDrive;
use Acriss\Enum\FuelAirConditioning;

readonly class AcrissCode
{
    public function __construct(
        public AcrissCategory|null $category,
        public AcrissType|null $type,
        public TransmissionDrive|null $transmission,
        public FuelAirConditioning|null $fuelAircon
    ) {}

    public function toArray(): array
    {
        return [
            'category'     => $this->category,
            'type'         => $this->type,
            'transmission' => $this->transmission,
            'fuel_aircon'  => $this->fuelAircon,
        ];
    }
}
