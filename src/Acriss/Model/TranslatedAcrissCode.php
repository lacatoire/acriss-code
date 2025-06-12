<?php
declare(strict_types=1);

namespace Acriss\Model;

readonly class TranslatedAcrissCode
{
    public function __construct(
        public string $category,
        public string $type,
        public string $transmission,
        public string $fuelAircon
    ) {}
}
