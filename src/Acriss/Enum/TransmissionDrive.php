<?php

declare(strict_types=1);

namespace Acriss\Enum;

enum TransmissionDrive: string
{
    case MANUAL_UNSPECIFIED_DRIVE = 'MANUAL_UNSPECIFIED_DRIVE';
    case MANUAL_2WD = 'MANUAL_2WD';
    case MANUAL_4WD = 'MANUAL_4WD';
    case MANUAL_AWD = 'MANUAL_AWD';
    case AUTOMATIC_UNSPECIFIED_DRIVE = 'AUTOMATIC_UNSPECIFIED_DRIVE';
    case AUTOMATIC_2WD = 'AUTOMATIC_2WD';
    case AUTOMATIC_4WD = 'AUTOMATIC_4WD';
    case AUTOMATIC_AWD = 'AUTOMATIC_AWD';

    public static function fromLetter(string $letter): ?self
    {
        return match (strtoupper($letter)) {
            'M' => self::MANUAL_UNSPECIFIED_DRIVE,
            'N' => self::MANUAL_2WD,
            'C' => self::MANUAL_4WD,
            'R' => self::MANUAL_AWD,
            'A' => self::AUTOMATIC_UNSPECIFIED_DRIVE,
            'B' => self::AUTOMATIC_2WD,
            'D' => self::AUTOMATIC_4WD,
            'S' => self::AUTOMATIC_AWD,
            default => null,
        };
    }
}
