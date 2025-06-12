<?php
declare(strict_types=1);

namespace Acriss\Tests\Enum;

use Acriss\Enum\AcrissType;
use PHPUnit\Framework\TestCase;

class AcrissTypeTest extends TestCase
{
    public function test_enum_keys_are_valid(): void
    {
        foreach (AcrissType::cases() as $case) {
            $this->assertMatchesRegularExpression('/^[A-Z]$/', $case->name);
        }
    }

    public function test_enum_values_are_not_empty(): void
    {
        foreach (AcrissType::cases() as $case) {
            self::assertIsString($case->value);
            self::assertNotEmpty($case->value);
        }
    }
}
