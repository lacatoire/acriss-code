<?php

declare(strict_types=1);

namespace Acriss;

use Acriss\Enum\AcrissCategory;
use Acriss\Enum\AcrissType;
use Acriss\Enum\FuelAirConditioning;
use Acriss\Enum\TransmissionDrive;
use Acriss\Model\AcrissCode;

class AcrissCodeParser
{
    /**
     * Décode un code ACRISS à 4 lettres et retourne les enums correspondantes.
     *
     * @param string $code Code ACRISS (ex: CDMR)
     */
    public function parse(string $code): AcrissCode
    {
        if (4 !== strlen($code)) {
            throw new \InvalidArgumentException('ACRISS code must be exactly 4 characters.');
        }

        [$c, $t, $tr, $f] = str_split(strtoupper($code));

        return new AcrissCode(
            AcrissCategory::fromLetter($c),
            AcrissType::fromLetter($t),
            TransmissionDrive::fromLetter($tr),
            FuelAirConditioning::fromLetter($f)
        );
    }
}
