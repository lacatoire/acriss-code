<?php

declare(strict_types=1);

namespace Acriss\Enum;

enum FuelAirConditioning: string
{
    case PETROL_NO_AC = 'PETROL_NO_AC';
    case PETROL_AC = 'PETROL_AC';
    case DIESEL_NO_AC = 'DIESEL_NO_AC';
    case DIESEL_AC = 'DIESEL_AC';
    case HYBRID_NO_AC = 'HYBRID_NO_AC';
    case HYBRID_AC = 'HYBRID_AC';
    case ELECTRIC_NO_AC = 'ELECTRIC_NO_AC';
    case ELECTRIC_AC = 'ELECTRIC_AC';
    case LPG_NO_AC = 'LPG_NO_AC';
    case LPG_AC = 'LPG_AC';
    case HYDROGEN_NO_AC = 'HYDROGEN_NO_AC';
    case HYDROGEN_AC = 'HYDROGEN_AC';
    case MULTIFUEL_NO_AC = 'MULTIFUEL_NO_AC';
    case MULTIFUEL_AC = 'MULTIFUEL_AC';
    case ETHANOL_NO_AC = 'ETHANOL_NO_AC';
    case ETHANOL_AC = 'ETHANOL_AC';
    case UNKNOWN_NO_AC = 'UNKNOWN_NO_AC';
    case UNKNOWN_AC = 'UNKNOWN_AC';

    public static function fromLetter(string $letter): ?self
    {
        return match (strtoupper($letter)) {
            'N' => self::PETROL_NO_AC,
            'R' => self::PETROL_AC,
            'D' => self::DIESEL_NO_AC,
            'Q' => self::DIESEL_AC,
            'H' => self::HYBRID_NO_AC,
            'I' => self::HYBRID_AC,
            'E' => self::ELECTRIC_NO_AC,
            'C' => self::ELECTRIC_AC,
            'L' => self::LPG_NO_AC,
            'S' => self::LPG_AC,
            'A' => self::HYDROGEN_NO_AC,
            'B' => self::HYDROGEN_AC,
            'M' => self::MULTIFUEL_NO_AC,
            'V' => self::MULTIFUEL_AC,
            'X' => self::ETHANOL_NO_AC,
            'Z' => self::ETHANOL_AC,
            'U' => self::UNKNOWN_NO_AC,
            'Y' => self::UNKNOWN_AC,
            default => null,
        };
    }
}
