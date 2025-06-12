<?php

declare(strict_types=1);

namespace Acriss\Enum;

enum FuelAirConditioning: string
{
    case R = 'UNSPECIFIED_FUEL_POWER_WITH_AIR';
    case N = 'UNSPECIFIED_FUEL_POWER_WITHOUT_AIR';
    case D = 'DIESEL_AIR';
    case Q = 'DIESEL_NO_AIR';
    case H = 'HYBRID';
    case I = 'HYBRID_PLUG_IN';
    case E = 'ELECTRIC';
    case C = 'ELECTRIC_PLUS';
    case L = 'LPG_COMPRESSED_GAS_AIR';
    case S = 'LPG_COMPRESSED_GAS_NO_AIR';
    case A = 'HYDROGEN_AIR';
    case B = 'HYDROGEN_NO_AIR';
    case M = 'MULTI_FUEL_POWER_AIR';
    case F = 'MULTI_FUEL_POWER_NO_AIR';
    case V = 'PETROL_AIR';
    case Z = 'PETROL_NO_AIR';
    case U = 'ETHANOL_AIR';
    case X = 'ETHANOL_NO_AIR';
}
