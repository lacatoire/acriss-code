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
            'acriss.category.COMPACT' => 'Compacte',
            'acriss.type.FOUR_FIVE_DOOR' => '4/5 portes',
            'acriss.transmission.MANUAL_UNSPECIFIED_DRIVE' => 'Manuelle',
            'acriss.fuel_aircon.PETROL_AC' => 'Essence, Clim.'
        ], 'fr');

        $acrissTranslator = new AcrissTranslator($translator);

        $code = new AcrissCode(
            AcrissCategory::COMPACT,
            AcrissType::FOUR_FIVE_DOOR,
            TransmissionDrive::MANUAL_UNSPECIFIED_DRIVE,
            FuelAirConditioning::PETROL_AC
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
