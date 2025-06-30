<?php

declare(strict_types=1);

namespace Acriss\Tests\Enum;

use Acriss\Enum\FuelAirConditioning;
use PHPUnit\Framework\TestCase;

class FuelAirConditioningTest extends TestCase
{
    public function testEnumCaseNamesAreUppercaseWords(): void
    {
        foreach (FuelAirConditioning::cases() as $case) {
            self::assertMatchesRegularExpression('/^[A-Z][A-Z_]*$/', $case->name);
        }
    }

    public function testEnumValuesAreNotEmptyStrings(): void
    {
        foreach (FuelAirConditioning::cases() as $case) {
            self::assertIsString($case->value);
            self::assertNotEmpty($case->value);
        }
    }

    public function testFromLetterReturnsExpectedCase(): void
    {
        self::assertSame(FuelAirConditioning::PETROL_AC, FuelAirConditioning::fromLetter('R'));
        self::assertSame(FuelAirConditioning::ELECTRIC_AC, FuelAirConditioning::fromLetter('C'));
        self::assertNull(FuelAirConditioning::fromLetter('W'));
    }
}
