<?php declare(strict_types=1);

namespace Acriss\Tests;

use Acriss\AcrissTranslator;
use Acriss\Model\AcrissCode;
use Acriss\Model\TranslatedAcrissCode;
use Acriss\Enum\AcrissCategory;
use Acriss\Enum\AcrissType;
use Acriss\Enum\TransmissionDrive;
use Acriss\Enum\FuelAirConditioning;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Translation\Translator;
use Symfony\Component\Translation\Loader\ArrayLoader;

class AcrissTranslatorTest extends TestCase
{
    public function test_translate_returns_translated_object(): void
    {
        $translator = new Translator('fr');
        $translator->addLoader('array', new ArrayLoader());
        $translator->addResource('array', [
            'acriss.category.C' => 'Compacte',
            'acriss.type.D' => '4/5 portes',
            'acriss.transmission.M' => 'Manuelle',
            'acriss.fuel_aircon.R' => 'Essence, Clim.'
        ], 'fr');

        $acrissTranslator = new AcrissTranslator($translator);

        $code = new AcrissCode(
            AcrissCategory::C,
            AcrissType::D,
            TransmissionDrive::M,
            FuelAirConditioning::R
        );

        $translated = $acrissTranslator->translate($code);

        self::assertInstanceOf(TranslatedAcrissCode::class, $translated);
        self::assertSame('Compacte', $translated->category);
        self::assertSame('4/5 portes', $translated->type);
        self::assertSame('Manuelle', $translated->transmission);
        self::assertSame('Essence, Clim.', $translated->fuelAircon);
    }

    public function test_translate_with_null_fields_returns_unknown(): void
    {
        $translator = new Translator('fr');
        $translator->addLoader('array', new ArrayLoader());

        $acrissTranslator = new AcrissTranslator($translator);

        $code = new AcrissCode(null, null, null, null);
        $translated = $acrissTranslator->translate($code);

        self::assertSame('Unknown', $translated->category);
        self::assertSame('Unknown', $translated->type);
        self::assertSame('Unknown', $translated->transmission);
        self::assertSame('Unknown', $translated->fuelAircon);
    }
}
