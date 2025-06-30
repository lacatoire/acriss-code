<?php

declare(strict_types=1);

namespace Acriss\Tests\Enum;

use Acriss\Enum\AcrissType;
use PHPUnit\Framework\TestCase;

class AcrissTypeTest extends TestCase
{
    public function testEnumCaseNamesAreUppercaseWords(): void
    {
        foreach (AcrissType::cases() as $case) {
            $this->assertMatchesRegularExpression('/^[A-Z][A-Z_]*$/', $case->name);
        }
    }

    public function testEnumValuesAreNotEmptyStrings(): void
    {
        foreach (AcrissType::cases() as $case) {
            self::assertIsString($case->value);
            self::assertNotEmpty($case->value);
        }
    }

    public function testFromLetterReturnsExpectedCase(): void
    {
        self::assertSame(AcrissType::FOUR_FIVE_DOOR, AcrissType::fromLetter('D'));
        self::assertSame(AcrissType::SUV, AcrissType::fromLetter('I'));
        self::assertNull(AcrissType::fromLetter('W'));
    }
}
