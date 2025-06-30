<?php
declare(strict_types=1);

namespace Acriss\Tests\Enum;

use Acriss\Enum\TransmissionDrive;
use PHPUnit\Framework\TestCase;

class TransmissionDriveTest extends TestCase
{
    public function test_enum_case_names_are_uppercase_words(): void
    {
        foreach (TransmissionDrive::cases() as $case) {
            self::assertMatchesRegularExpression('/^[A-Z0-9_]+$/', $case->name);
        }
    }

    public function test_enum_values_are_not_empty_strings(): void
    {
        foreach (TransmissionDrive::cases() as $case) {
            self::assertIsString($case->value);
            self::assertNotEmpty($case->value);
        }
    }

    public function test_from_letter_returns_expected_case(): void
    {
        self::assertSame(TransmissionDrive::AUTOMATIC_2WD, TransmissionDrive::fromLetter('B'));
        self::assertSame(TransmissionDrive::MANUAL_4WD, TransmissionDrive::fromLetter('C'));
        self::assertNull(TransmissionDrive::fromLetter('W'));
    }
}
