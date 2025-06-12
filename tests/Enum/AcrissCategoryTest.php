<?php

namespace Acriss\Tests\Enum;

/** @author Louis-Arnaud Catoire <la.catoire@gmail.com> */
use Acriss\Enum\AcrissCategory;
use PHPUnit\Framework\TestCase;

class AcrissCategoryTest extends TestCase
{
    public function test_all_enum_keys_are_single_uppercase_letter(): void
    {
        foreach (AcrissCategory::cases() as $case) {
            self::assertMatchesRegularExpression('/^[A-Z]$/', $case->name);
        }
    }

    public function test_all_enum_values_are_non_empty_strings(): void
    {
        foreach (AcrissCategory::cases() as $case) {
            self::assertIsString($case->value);
            self::assertNotEmpty($case->value);
        }
    }
}
