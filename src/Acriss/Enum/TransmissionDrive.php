<?php

declare(strict_types=1);

namespace Acriss\Enum;

enum TransmissionDrive: string
{
    case M = 'MANUAL_UNSPECIFIED_DRIVE';
    case N = 'MANUAL_FOUR_WHEEL_DRIVE';
    case C = 'MANUAL_ALL_WHEEL_DRIVE';
    case A = 'AUTOMATIC_UNSPECIFIED_DRIVE';
    case B = 'AUTOMATIC_FOUR_WHEEL_DRIVE';
    case D = 'AUTOMATIC_ALL_WHEEL_DRIVE';
}
