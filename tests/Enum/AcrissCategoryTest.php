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
    public function testAllEnumNamesAreUppercaseWords(): void
    {
        foreach (AcrissCategory::cases() as $case) {
            self::assertMatchesRegularExpression('/^[A-Z][A-Z_]*$/', $case->name);
        }
    }

    public function testAllEnumValuesAreNonEmptyStrings(): void
    {
        foreach (AcrissCategory::cases() as $case) {
            self::assertIsString($case->value);
            self::assertNotEmpty($case->value);
        }
    }

    public function testFromLetterReturnsExpectedCase(): void
    {
        self::assertSame(AcrissCategory::COMPACT, AcrissCategory::fromLetter('C'));
        self::assertSame(AcrissCategory::PREMIUM, AcrissCategory::fromLetter('P'));
        self::assertNull(AcrissCategory::fromLetter('Z'));
    }
}
