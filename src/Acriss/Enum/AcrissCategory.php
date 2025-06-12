<?php

declare(strict_types=1);

namespace Acriss\Enum;

enum AcrissCategory: string
{
    case M = 'MINI';
    case N = 'MINI_ELITE';
    case E = 'ECONOMY';
    case H = 'ECONOMY_ELITE';
    case C = 'COMPACT';
    case D = 'COMPACT_ELITE';
    case I = 'INTERMEDIATE';
    case J = 'INTERMEDIATE_ELITE';
    case S = 'STANDARD';
    case R = 'STANDARD_ELITE';
    case F = 'FULLSIZE';
    case G = 'FULLSIZE_ELITE';
    case P = 'PREMIUM';
    case U = 'PREMIUM_ELITE';
    case L = 'LUXURY';
    case W = 'LUXURY_ELITE';
    case O = 'OVERSIZE';
    case X = 'SPECIAL';
}
