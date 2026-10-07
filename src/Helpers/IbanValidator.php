<?php

declare(strict_types=1);

namespace Engelsystem\Helpers;

/**
 * helfisystem: Formale IBAN-Pruefung (Laenge pro Land + Pruefsumme nach ISO 7064 mod 97-10).
 * Prueft nicht, ob das Konto existiert - faengt aber Tippfehler zuverlaessig ab.
 */
class IbanValidator
{
    /** Laenge pro Laendercode (SEPA-Raum + gaengige weitere) */
    protected const LENGTHS = [
        'AD' => 24, 'AT' => 20, 'BE' => 16, 'BG' => 22, 'CH' => 21, 'CY' => 28, 'CZ' => 24,
        'DE' => 22, 'DK' => 18, 'EE' => 20, 'ES' => 24, 'FI' => 18, 'FR' => 27, 'GB' => 22,
        'GI' => 23, 'GR' => 27, 'HR' => 21, 'HU' => 28, 'IE' => 22, 'IS' => 26, 'IT' => 27,
        'LI' => 21, 'LT' => 20, 'LU' => 20, 'LV' => 21, 'MC' => 27, 'MT' => 31, 'NL' => 18,
        'NO' => 15, 'PL' => 28, 'PT' => 25, 'RO' => 24, 'SE' => 24, 'SI' => 19, 'SK' => 24,
        'SM' => 27, 'VA' => 22,
    ];

    /** Entfernt Leerzeichen/Bindestriche und macht alles gross */
    public static function normalize(?string $iban): string
    {
        return strtoupper((string) preg_replace('/[\s\-.]+/', '', (string) $iban));
    }

    public static function isValid(?string $iban): bool
    {
        return self::error($iban) === null;
    }

    /**
     * @return string|null null wenn gueltig, sonst ein Fehlercode (empty|format|country|length|checksum)
     */
    public static function error(?string $iban): ?string
    {
        $iban = self::normalize($iban);

        if ($iban === '') {
            return 'empty';
        }

        if (!preg_match('/^[A-Z]{2}\d{2}[A-Z0-9]{11,30}$/', $iban)) {
            return 'format';
        }

        $expected = self::LENGTHS[substr($iban, 0, 2)] ?? null;
        if ($expected === null) {
            return 'country';
        }

        if (strlen($iban) !== $expected) {
            return 'length';
        }

        $rearranged = substr($iban, 4) . substr($iban, 0, 4);
        $remainder = 0;
        foreach (str_split($rearranged) as $char) {
            $remainder = (int) (($remainder . (string) base_convert($char, 36, 10)) % 97);
        }

        return $remainder === 1 ? null : 'checksum';
    }

    /** BIC ist optional (SEPA), aber wenn angegeben, muss sie formal passen */
    public static function isValidBic(?string $bic): bool
    {
        $bic = strtoupper(trim((string) $bic));

        return $bic === '' || (bool) preg_match('/^[A-Z]{4}[A-Z]{2}[A-Z0-9]{2}([A-Z0-9]{3})?$/', $bic);
    }

    /** z.B. DE89 **** **** **** **** 00 - fuer Bestaetigungsseiten/Logs */
    public static function mask(?string $iban): string
    {
        $iban = self::normalize($iban);
        if (strlen($iban) < 8) {
            return '****';
        }

        return substr($iban, 0, 4) . str_repeat('*', strlen($iban) - 6) . substr($iban, -2);
    }
}
