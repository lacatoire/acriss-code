<?php

declare(strict_types=1);

namespace Acriss\Tests;

use Acriss\AcrissCodeDetails;
use Acriss\AcrissCodeParser;
use Acriss\AcrissTranslator;
use Acriss\Model\AcrissCodeDetailsResult;
use Acriss\Model\TranslatedAcrissCode;
use Acriss\Enum\AcrissCategory;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Translation\Translator;
use Symfony\Component\Translation\Loader\ArrayLoader;

class AcrissCodeDetailsTest extends TestCase
{
    public function test_get_returns_full_details_object(): void
    {
        $translator = new Translator('fr');
        $translator->addLoader('array', new ArrayLoader());
        $translator->addResource('array', [
            'acriss.category.C' => 'Compacte',
            'acriss.type.D' => '4/5 portes',
            'acriss.transmission.M' => 'Manuelle',
            'acriss.fuel_aircon.R' => 'Essence, Clim.'
        ], 'fr');

        $service = new AcrissCodeDetails(
            new AcrissCodeParser(),
            new AcrissTranslator($translator)
        );

        $result = $service->get('CDMR', 'fr');

        self::assertInstanceOf(AcrissCodeDetailsResult::class, $result);
        self::assertSame('CDMR', $result->code);

        self::assertSame(AcrissCategory::C, $result->raw->category);
        self::assertInstanceOf(TranslatedAcrissCode::class, $result->translated);
        self::assertSame('Compacte', $result->translated->category);
        self::assertSame('4/5 portes', $result->translated->type);
        self::assertSame('Manuelle', $result->translated->transmission);
        self::assertSame('Essence, Clim.', $result->translated->fuelAircon);
    }
}
