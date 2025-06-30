<?php

declare(strict_types=1);

namespace Acriss\Enum;

enum AcrissCategory: string
{
    case MINI = 'MINI';
    case MINI_ELITE = 'MINI_ELITE';
    case ECONOMY = 'ECONOMY';
    case ECONOMY_ELITE = 'ECONOMY_ELITE';
    case COMPACT = 'COMPACT';
    case COMPACT_ELITE = 'COMPACT_ELITE';
    case INTERMEDIATE = 'INTERMEDIATE';
    case INTERMEDIATE_ELITE = 'INTERMEDIATE_ELITE';
    case STANDARD = 'STANDARD';
    case STANDARD_ELITE = 'STANDARD_ELITE';
    case FULLSIZE = 'FULLSIZE';
    case FULLSIZE_ELITE = 'FULLSIZE_ELITE';
    case PREMIUM = 'PREMIUM';
    case PREMIUM_ELITE = 'PREMIUM_ELITE';
    case LUXURY = 'LUXURY';
    case LUXURY_ELITE = 'LUXURY_ELITE';
    case OVERSIZE = 'OVERSIZE';
    case SPECIAL = 'SPECIAL';

    public static function fromLetter(string $letter): ?self
    {
        return match (strtoupper($letter)) {
            'M' => self::MINI,
            'N' => self::MINI_ELITE,
            'E' => self::ECONOMY,
            'H' => self::ECONOMY_ELITE,
            'C' => self::COMPACT,
            'D' => self::COMPACT_ELITE,
            'I' => self::INTERMEDIATE,
            'J' => self::INTERMEDIATE_ELITE,
            'S' => self::STANDARD,
            'R' => self::STANDARD_ELITE,
            'F' => self::FULLSIZE,
            'G' => self::FULLSIZE_ELITE,
            'P' => self::PREMIUM,
            'U' => self::PREMIUM_ELITE,
            'L' => self::LUXURY,
            'W' => self::LUXURY_ELITE,
            'O' => self::OVERSIZE,
            'X' => self::SPECIAL,
            default => null,
        };
    }
}
