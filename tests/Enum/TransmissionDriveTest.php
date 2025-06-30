<?php

declare(strict_types=1);

namespace Acriss\Tests\Enum;

use Acriss\Enum\TransmissionDrive;
use PHPUnit\Framework\TestCase;

class TransmissionDriveTest extends TestCase
{
    public function testEnumCaseNamesAreUppercaseWords(): void
    {
        foreach (TransmissionDrive::cases() as $case) {
            self::assertMatchesRegularExpression('/^[A-Z0-9_]+$/', $case->name);
        }
    }

    public function testEnumValuesAreNotEmptyStrings(): void
    {
        foreach (TransmissionDrive::cases() as $case) {
            self::assertIsString($case->value);
            self::assertNotEmpty($case->value);
        }
    }

    public function testFromLetterReturnsExpectedCase(): void
    {
        self::assertSame(TransmissionDrive::AUTOMATIC_2WD, TransmissionDrive::fromLetter('B'));
        self::assertSame(TransmissionDrive::MANUAL_4WD, TransmissionDrive::fromLetter('C'));
        self::assertNull(TransmissionDrive::fromLetter('W'));
    }
}
