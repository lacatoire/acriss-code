<?php

declare(strict_types=1);

namespace Acriss\Enum;

enum AcrissType: string
{
    case TWO_DOOR = 'TWO_DOOR';
    case THREE_DOOR = 'THREE_DOOR';
    case FOUR_FIVE_DOOR = 'FOUR_FIVE_DOOR';
    case FIVE_DOOR = 'FIVE_DOOR';
    case SUV = 'SUV';
    case MONOSPACE = 'MONOSPACE';
    case CONVERTIBLE = 'CONVERTIBLE';
    case COUPE = 'COUPE';
    case ESTATE = 'ESTATE';
    case OPEN_AIR_ALL_TERRAIN = 'OPEN_AIR_ALL_TERRAIN';
    case PICKUP_REGULAR_CAB = 'PICKUP_REGULAR_CAB';
    case PICKUP_EXTENDED_CAB = 'PICKUP_EXTENDED_CAB';
    case PASSENGER_VAN = 'PASSENGER_VAN';
    case CARGO_VAN = 'CARGO_VAN';
    case MOTOR_HOME = 'MOTOR_HOME';
    case LIMOUSINE = 'LIMOUSINE';

    public static function fromLetter(string $letter): ?self
    {
        return match (strtoupper($letter)) {
            'B' => self::TWO_DOOR,
            'C' => self::THREE_DOOR,
            'D' => self::FOUR_FIVE_DOOR,
            'E' => self::FIVE_DOOR,
            'F' => self::ESTATE,
            'G' => self::COUPE,
            'H' => self::CONVERTIBLE,
            'I' => self::SUV,
            'J' => self::OPEN_AIR_ALL_TERRAIN,
            'K' => self::MONOSPACE,
            'L' => self::PICKUP_REGULAR_CAB,
            'M' => self::PICKUP_EXTENDED_CAB,
            'N' => self::PASSENGER_VAN,
            'O' => self::CARGO_VAN,
            'P' => self::MOTOR_HOME,
            'Q' => self::LIMOUSINE,
            default => null,
        };
    }
}
