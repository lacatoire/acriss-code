<?php
declare(strict_types=1);

namespace Acriss\Tests\Enum;

use Acriss\Enum\TransmissionDrive;
use PHPUnit\Framework\TestCase;

class TransmissionDriveTest extends TestCase
{
    public function test_enum_keys_are_valid(): void
    {
        foreach (TransmissionDrive::cases() as $case) {
            self::assertMatchesRegularExpression('/^[A-Z]$/', $case->name);
        }
    }

    public function test_enum_values_are_not_empty(): void
    {
        foreach (TransmissionDrive::cases() as $case) {
            self::assertIsString($case->value);
            self::assertNotEmpty($case->value);
        }
    }
}
