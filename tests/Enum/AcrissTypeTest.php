<?php
declare(strict_types=1);

namespace Acriss\Tests\Enum;

use Acriss\Enum\AcrissType;
use PHPUnit\Framework\TestCase;

class AcrissTypeTest extends TestCase
{
    public function test_enum_case_names_are_uppercase_words(): void
    {
        foreach (AcrissType::cases() as $case) {
            $this->assertMatchesRegularExpression('/^[A-Z][A-Z_]*$/', $case->name);
        }
    }

    public function test_enum_values_are_not_empty_strings(): void
    {
        foreach (AcrissType::cases() as $case) {
            self::assertIsString($case->value);
            self::assertNotEmpty($case->value);
        }
    }

    public function test_from_letter_returns_expected_case(): void
    {
        self::assertSame(AcrissType::FOUR_FIVE_DOOR, AcrissType::fromLetter('D'));
        self::assertSame(AcrissType::SUV, AcrissType::fromLetter('I'));
        self::assertNull(AcrissType::fromLetter('W'));
    }
}
