<?php

declare(strict_types=1);

namespace Acriss\Tests;

use Acriss\AcrissCodeParser;
use Acriss\Enum\AcrissCategory;
use Acriss\Enum\AcrissType;
use Acriss\Enum\FuelAirConditioning;
use Acriss\Enum\TransmissionDrive;
use Acriss\Model\AcrissCode;
use PHPUnit\Framework\TestCase;

class AcrissCodeParserTest extends TestCase
{
    public function testParseValidCodeReturnsAcrissCodeObject(): void
    {
        $parser = new AcrissCodeParser();
        $code = $parser->parse('CDMR');

        self::assertInstanceOf(AcrissCode::class, $code);
        self::assertSame(AcrissCategory::COMPACT, $code->category);
        self::assertSame(AcrissType::FOUR_FIVE_DOOR, $code->type);
        self::assertSame(TransmissionDrive::MANUAL_UNSPECIFIED_DRIVE, $code->transmission);
        self::assertSame(FuelAirConditioning::PETROL_AC, $code->fuelAircon);
    }

    public function testInvalidCodeLengthThrowsException(): void
    {
        $parser = new AcrissCodeParser();

        self::expectException(\InvalidArgumentException::class);
        $parser->parse('XYZ');
    }

    public function testUnknownCodeLettersResultInNullProperties(): void
    {
        $parser = new AcrissCodeParser();
        $code = $parser->parse('ZZZW');

        self::assertNull($code->category);
        self::assertNull($code->type);
        self::assertNull($code->transmission);
        self::assertNull($code->fuelAircon);
    }
}
