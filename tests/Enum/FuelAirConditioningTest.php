<?php
declare(strict_types=1);

namespace Acriss\Tests\Enum;

use Acriss\Enum\FuelAirConditioning;
use PHPUnit\Framework\TestCase;

class FuelAirConditioningTest extends TestCase
{
    public function test_enum_case_names_are_uppercase_words(): void
    {
        foreach (FuelAirConditioning::cases() as $case) {
            self::assertMatchesRegularExpression('/^[A-Z][A-Z_]*$/', $case->name);
        }
    }

    public function test_enum_values_are_not_empty_strings(): void
    {
        foreach (FuelAirConditioning::cases() as $case) {
            self::assertIsString($case->value);
            self::assertNotEmpty($case->value);
        }
    }

    public function test_from_letter_returns_expected_case(): void
    {
        self::assertSame(FuelAirConditioning::PETROL_AC, FuelAirConditioning::fromLetter('R'));
        self::assertSame(FuelAirConditioning::ELECTRIC_AC, FuelAirConditioning::fromLetter('C'));
        self::assertNull(FuelAirConditioning::fromLetter('W'));
    }
}
