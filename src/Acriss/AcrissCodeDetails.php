<?php
declare(strict_types=1);

namespace Acriss;

use Acriss\Model\AcrissCodeDetailsResult;

readonly class AcrissCodeDetails
{
    public function __construct(
        private AcrissCodeParser $parser,
        private AcrissTranslator $translator
    )
    {
    }

    /**
     * Retourne un code décodé + traduit depuis un code brut.
     *
     * @param string $code Le code ACRISS brut (4 lettres)
     * @param string|null $locale La langue souhaitée
     * @return AcrissCodeDetailsResult
     */
    public function get(string $code, ?string $locale = null): AcrissCodeDetailsResult
    {
        $acrissCode = $this->parser->parse($code);
        $translated = $this->translator->translate($acrissCode, $locale);

        return new AcrissCodeDetailsResult(
            strtoupper($code),
            $acrissCode,
            $translated
        );
    }
}
