<?php

declare(strict_types=1);

namespace Acriss\Model;

readonly class AcrissCodeDetailsResult
{
    public function __construct(
        public string $code,
        public AcrissCode $raw,
        public TranslatedAcrissCode $translated,
    ) {
    }
}
