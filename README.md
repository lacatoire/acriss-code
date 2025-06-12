# Acriss Code

> Decode and translate ACRISS vehicle classification codes in PHP.

[![CI](https://github.com/lacatoire/acriss-code/actions/workflows/phpunit.yml/badge.svg)](https://github.com/lacatoire/acriss-code/actions)
[![Latest Stable Version](https://poser.pugx.org/lacatoire/acriss-code/v)](https://packagist.org/packages/lacatoire/acriss-code)
[![License](https://poser.pugx.org/lacatoire/acriss-code/license)](LICENSE)

---

## ✨ What is this?

`lacatoire/acriss-code` is a PHP library to **parse**, **validate**, and **translate** ACRISS codes (used by rental companies to describe vehicles).  
It supports **typed enums**, **Symfony integration**, and **multilingual translations** (EN, FR, IT).

---

## 🚀 Installation

```bash
composer require lacatoire/acriss-code
```

Symfony Flex will register the bundle automatically if you're using Symfony.

---

## ✅ Features

- ✅ Strongly-typed with PHP enums
- ✅ Decode ACRISS 4-letter codes into structured objects
- ✅ Translate ACRISS codes into human-readable strings (EN, FR, IT)
- ✅ Framework-agnostic core (usable with Laravel, Symfony, or standalone)
- ✅ Symfony integration via bundle
- ✅ 100% tested with PHPUnit

---

## 🦩 Usage

### Parse a code

```php
use Acriss\AcrissCodeParser;

$parser = new AcrissCodeParser();
$code = $parser->parse('CDMR');

// $code is an instance of Acriss\Model\AcrissCode

echo $code->category->value; // COMPACT
```

### Translate a code

```php
use Acriss\AcrissTranslator;

$translator = new AcrissTranslator($translatorService); // Symfony's TranslatorInterface
$labels = $translator->translate($code, 'fr');

// $labels is an instance of Acriss\Model\TranslatedAcrissCode

echo $labels->category; // "Compacte"
echo $labels->fuelAirCon; // "Essence, avec climatisation"
```

### Get full details

```php
use Acriss\AcrissCodeDetails;

$details = (new AcrissCodeDetails($parser, $translator))->get('CDMR', 'it');

// $details->original is an AcrissCode
// $details->translated is a TranslatedAcrissCode

echo $details->translated->transmission; // "Manuale"
```
---

## 🧬 Data Model

### AcrissCode
```php
class AcrissCode {
    public AcrissCategory $category;
    public AcrissType $type;
    public TransmissionDrive $transmission;
    public FuelAirConditioning $fuelAirCon;
}
```

### TranslatedAcrissCode
```php
class TranslatedAcrissCode {
    public string $category;
    public string $type;
    public string $transmission;
    public string $fuelAirCon;
}
```

### AcrissCodeDetails
```php
class AcrissCodeDetails {
    public AcrissCode $original;
    public TranslatedAcrissCode $translated;
}
```

---

## 🧪 Testing

```bash
composer install
./vendor/bin/phpunit
```

## ⚙️ Framework Integration

### Symfony

```php
use Acriss\AcrissTranslator;

$translator = new AcrissTranslator($this->translator); // Symfony\Contracts\Translation\TranslatorInterface

```
* Compatible with Symfony translation (TranslatorInterface)
* Drop translations in translations/messages.[locale].yaml
* Autowiring-ready if registered as a bundle (optional)

### Laravel

```php
use Illuminate\Translation\Translator;
use Acriss\AcrissTranslator;

$acriss = new AcrissTranslator(app(Translator::class));
```
* Use any Laravel translator via adapter or service container
### Stand-alone PHP

```php
use Symfony\Component\Translation\Translator;
use Symfony\Component\Translation\Loader\YamlFileLoader;
use Acriss\AcrissTranslator;

$translator = new Translator('fr');
$translator->addLoader('yaml', new YamlFileLoader());
$translator->addResource('yaml', __DIR__.'/translations/messages.fr.yaml', 'fr');

$acriss = new AcrissTranslator($translator);
```
---

## 📁 Project Structure

```
src/
  Acriss/
    Enum/                 // ACRISS enums (category, type, etc.)
    Model/                // AcrissCode value object
    AcrissCodeParser.php
    AcrissTranslator.php
    AcrissCodeDetails.php
tests/                   // PHPUnit tests
translations/            // Symfony-compatible translations (en, fr, it, de)
```

---

## 🌐 Supported Locales

- `en` – English (default)
- `fr` – Français
- `it` – Italiano
- `de` – Deutsch

Want to add more? PRs welcome 👌

---

## 📄 License

This library is open-sourced under the MIT license.