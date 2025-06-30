<?php
declare(strict_types=1);

namespace Acriss\Tests\Enum;

use Acriss\Enum\AcrissCategory;
use PHPUnit\Framework\TestCase;

/**
 * @author Louis-Arnaud Catoire <la.catoire@gmail.com>
 */
class AcrissCategoryTest extends TestCase
{
    public function test_all_enum_names_are_uppercase_words(): void
    {
        foreach (AcrissCategory::cases() as $case) {
            self::assertMatchesRegularExpression('/^[A-Z][A-Z_]*$/', $case->name);
        }
    }

    public function test_all_enum_values_are_non_empty_strings(): void
    {
        foreach (AcrissCategory::cases() as $case) {
            self::assertIsString($case->value);
            self::assertNotEmpty($case->value);
        }
    }

    public function test_from_letter_returns_expected_case(): void
    {
        self::assertSame(AcrissCategory::COMPACT, AcrissCategory::fromLetter('C'));
        self::assertSame(AcrissCategory::PREMIUM, AcrissCategory::fromLetter('P'));
        self::assertNull(AcrissCategory::fromLetter('Z'));
    }
}
