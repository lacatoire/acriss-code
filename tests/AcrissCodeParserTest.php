<?php

namespace Acriss\Tests;

use Acriss\AcrissCodeParser;
use Acriss\Model\AcrissCode;
use Acriss\Enum\AcrissCategory;
use Acriss\Enum\AcrissType;
use Acriss\Enum\TransmissionDrive;
use Acriss\Enum\FuelAirConditioning;
use PHPUnit\Framework\TestCase;

class AcrissCodeParserTest extends TestCase
{
    public function test_parse_valid_code_returns_acriss_code_object(): void
    {
        $parser = new AcrissCodeParser();
        $code = $parser->parse('CDMR');

        self::assertInstanceOf(AcrissCode::class, $code);
        self::assertSame(AcrissCategory::C, $code->category);
        self::assertSame(AcrissType::D, $code->type);
        self::assertSame(TransmissionDrive::M, $code->transmission);
        self::assertSame(FuelAirConditioning::R, $code->fuelAircon);
    }

    public function test_invalid_code_length_throws_exception(): void
    {
        $parser = new AcrissCodeParser();

        self::expectException(\InvalidArgumentException::class);
        $parser->parse('XYZ');
    }

    public function test_unknown_code_letters_result_in_null_properties(): void
    {
        $parser = new AcrissCodeParser();
        $code = $parser->parse('ZZZZ'); // If Z is unmapped

        self::assertNull($code->category);
        self::assertNull($code->type);
        self::assertNull($code->transmission);
        self::assertNull($code->fuelAircon);
    }
}
