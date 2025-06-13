<?php

declare(strict_types=1);

namespace Acriss;

use Acriss\Model\AcrissCode;
use Acriss\Model\TranslatedAcrissCode;
use Symfony\Contracts\Translation\TranslatorInterface;

class AcrissTranslator
{
    public function __construct(private TranslatorInterface $translator) {}

    /**
     * Traduit les composants d’un code ACRISS dans la langue spécifiée.
     *
     * @param AcrissCode $code Objet contenant les enums
     * @param string|null $locale
     * @return TranslatedAcrissCode
     */
    public function translate(AcrissCode $code, ?string $locale = null): TranslatedAcrissCode
    {
        return new TranslatedAcrissCode(
            category: $code->category
                ? $this->translator->trans("acriss.category.{$code->category->name}", [], null, $locale)
                : 'Unknown',
            type: $code->type
                ? $this->translator->trans("acriss.type.{$code->type->name}", [], null, $locale)
                : 'Unknown',
            transmission: $code->transmission
                ? $this->translator->trans("acriss.transmission.{$code->transmission->name}", [], null, $locale)
                : 'Unknown',
            fuelAircon: $code->fuelAircon
                ? $this->translator->trans("acriss.fuel_aircon.{$code->fuelAircon->name}", [], null, $locale)
                : 'Unknown',
        );
    }
}
