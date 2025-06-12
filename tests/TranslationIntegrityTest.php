<?php declare(strict_types=1);

namespace Acriss\Tests;

use Acriss\Enum\AcrissCategory;
use Acriss\Enum\AcrissType;
use Acriss\Enum\TransmissionDrive;
use Acriss\Enum\FuelAirConditioning;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Yaml\Yaml;

final class TranslationIntegrityTest extends TestCase
{
    private const TRANSLATION_PATH = __DIR__ . '/../translations/';

    private const ENUM_MAP = [
        'acriss.category'     => AcrissCategory::class,
        'acriss.type'         => AcrissType::class,
        'acriss.transmission' => TransmissionDrive::class,
        'acriss.fuel_aircon'  => FuelAirConditioning::class,
    ];

    public function test_all_enum_translations_are_complete(): void
    {
        $files = glob(self::TRANSLATION_PATH . 'messages.*.yaml');

        self::assertNotEmpty($files, 'No translation files found in the translations/ directory.');

        foreach ($files as $file) {
            $locale = basename($file, '.yaml');
            $locale = str_replace('messages.', '', $locale);

            $translations = Yaml::parseFile($file);
            self::assertIsArray($translations, "Invalid YAML structure in '$file'");

            foreach (self::ENUM_MAP as $prefix => $enumClass) {
                foreach ($enumClass::cases() as $case) {
                    $key = "$prefix.{$case->name}";
                    self::assertArrayHasKey($key, $translations, "Missing key '$key' in locale '$locale'");
                    self::assertNotEmpty($translations[$key], "Empty translation for key '$key' in locale '$locale'");
                }
            }
        }
    }
}
