<?php

declare(strict_types=1);

namespace Acriss\Enum;

enum AcrissType: string
{
    case B = 'TWO_THREE_DOOR';
    case C = 'TWO_FOUR_DOOR';
    case D = 'FOUR_FIVE_DOOR';
    case W = 'WAGON_ESTATE';
    case V = 'PASSENGER_VAN';
    case L = 'LIMOUSINE_SEDAN';
    case S = 'SPORT';
    case T = 'CONVERTIBLE';
    case F = 'SUV';
    case J = 'OPEN_AIR_ALL_TERRAIN';
    case X = 'SPECIAL';
    case P = 'PICK_UP_SINGLE_EXTENDED_CAB_TWO_DOOR';
    case Q = 'PICK_UP_DOUBLE_CAB_FOUR_DOOR';
    case Z = 'SPECIAL_OFFER_CAR';
    case E = 'COUPE';
    case M = 'MONOSPACE';
    case R = 'RECREATIONAL_VEHICLE';
    case H = 'MOTOR_HOME';
    case Y = 'TWO_WHEEL_VEHICLE';
    case N = 'ROADSTER';
    case G = 'CROSSOVER';
    case K = 'COMMERCIAL_VAN_TRUCK';
}
