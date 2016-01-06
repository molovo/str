<?php

namespace Molovo\Str;

use Doctrine\Common\Inflector\Inflector;

class Str
{
    /**
     * Replace non-ASCII characters in a string with
     * their ASCII equivalent.
     *
     * @param string $text The string to convert
     *
     * @return string The formatted string
     */
    public static function normalize($text)
    {
        $a = array('À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'Æ', 'Ç', 'È', 'É', 'Ê', 'Ë', 'Ì', 'Í', 'Î', 'Ï', 'Ð', 'Ñ', 'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'Ø', 'Ù', 'Ú', 'Û', 'Ü', 'Ý', 'ß', 'à', 'á', 'â', 'ã', 'ä', 'å', 'æ', 'ç', 'è', 'é', 'ê', 'ë', 'ì', 'í', 'î', 'ï', 'ñ', 'ò', 'ó', 'ô', 'õ', 'ö', 'ø', 'ù', 'ú', 'û', 'ü', 'ý', 'ÿ', 'Ā', 'ā', 'Ă', 'ă', 'Ą', 'ą', 'Ć', 'ć', 'Ĉ', 'ĉ', 'Ċ', 'ċ', 'Č', 'č', 'Ď', 'ď', 'Đ', 'đ', 'Ē', 'ē', 'Ĕ', 'ĕ', 'Ė', 'ė', 'Ę', 'ę', 'Ě', 'ě', 'Ĝ', 'ĝ', 'Ğ', 'ğ', 'Ġ', 'ġ', 'Ģ', 'ģ', 'Ĥ', 'ĥ', 'Ħ', 'ħ', 'Ĩ', 'ĩ', 'Ī', 'ī', 'Ĭ', 'ĭ', 'Į', 'į', 'İ', 'ı', 'Ĳ', 'ĳ', 'Ĵ', 'ĵ', 'Ķ', 'ķ', 'Ĺ', 'ĺ', 'Ļ', 'ļ', 'Ľ', 'ľ', 'Ŀ', 'ŀ', 'Ł', 'ł', 'Ń', 'ń', 'Ņ', 'ņ', 'Ň', 'ň', 'ŉ', 'Ō', 'ō', 'Ŏ', 'ŏ', 'Ő', 'ő', 'Œ', 'œ', 'Ŕ', 'ŕ', 'Ŗ', 'ŗ', 'Ř', 'ř', 'Ś', 'ś', 'Ŝ', 'ŝ', 'Ş', 'ş', 'Š', 'š', 'Ţ', 'ţ', 'Ť', 'ť', 'Ŧ', 'ŧ', 'Ũ', 'ũ', 'Ū', 'ū', 'Ŭ', 'ŭ', 'Ů', 'ů', 'Ű', 'ű', 'Ų', 'ų', 'Ŵ', 'ŵ', 'Ŷ', 'ŷ', 'Ÿ', 'Ź', 'ź', 'Ż', 'ż', 'Ž', 'ž', 'ſ', 'ƒ', 'Ơ', 'ơ', 'Ư', 'ư', 'Ǎ', 'ǎ', 'Ǐ', 'ǐ', 'Ǒ', 'ǒ', 'Ǔ', 'ǔ', 'Ǖ', 'ǖ', 'Ǘ', 'ǘ', 'Ǚ', 'ǚ', 'Ǜ', 'ǜ', 'Ǻ', 'ǻ', 'Ǽ', 'ǽ', 'Ǿ', 'ǿ');
        $b = array('A', 'A', 'A', 'A', 'A', 'A', 'AE', 'C', 'E', 'E', 'E', 'E', 'I', 'I', 'I', 'I', 'D', 'N', 'O', 'O', 'O', 'O', 'O', 'O', 'U', 'U', 'U', 'U', 'Y', 's', 'a', 'a', 'a', 'a', 'a', 'a', 'ae', 'c', 'e', 'e', 'e', 'e', 'i', 'i', 'i', 'i', 'n', 'o', 'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'u', 'y', 'y', 'A', 'a', 'A', 'a', 'A', 'a', 'C', 'c', 'C', 'c', 'C', 'c', 'C', 'c', 'D', 'd', 'D', 'd', 'E', 'e', 'E', 'e', 'E', 'e', 'E', 'e', 'E', 'e', 'G', 'g', 'G', 'g', 'G', 'g', 'G', 'g', 'H', 'h', 'H', 'h', 'I', 'i', 'I', 'i', 'I', 'i', 'I', 'i', 'I', 'i', 'IJ', 'ij', 'J', 'j', 'K', 'k', 'L', 'l', 'L', 'l', 'L', 'l', 'L', 'l', 'l', 'l', 'N', 'n', 'N', 'n', 'N', 'n', 'n', 'O', 'o', 'O', 'o', 'O', 'o', 'OE', 'oe', 'R', 'r', 'R', 'r', 'R', 'r', 'S', 's', 'S', 's', 'S', 's', 'S', 's', 'T', 't', 'T', 't', 'T', 't', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'W', 'w', 'Y', 'y', 'Y', 'Z', 'z', 'Z', 'z', 'Z', 'z', 's', 'f', 'O', 'o', 'U', 'u', 'A', 'a', 'I', 'i', 'O', 'o', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'A', 'a', 'AE', 'ae', 'O', 'o');

        return str_replace($a, $b, $text);
    }

    /**
     * Generates a capitalized string without punctuation.
     *
     * @param string $text The string to convert
     *
     * @return string The formatted string
     */
    public static function title($text)
    {
        $text = preg_replace('/[\\-_]/', ' ', $text);
        $text = preg_replace('/((?<=\s)?[A-Z])/', ' $1', $text);
        $text = trim($text);
        $text = preg_replace('/[\s]+/', ' ', $text);

        return ucwords($text);
    }

    /**
     * Convert a string to snake_case.
     *
     * @param string $text The string to convert
     *
     * @return string The formatted string
     */
    public static function snakeCase($text)
    {
        $text = static::normalize($text);
        $text = preg_replace('/((?<=\s)?[A-Z])/', ' $1', $text);
        $text = preg_replace('/[\s]+/', ' ', $text);
        $text = preg_replace('/[^a-z0-9\_]/i', '_', $text);
        $text = preg_replace('/[\_]+/', '_', $text);
        $text = preg_replace('/(^[\_]|[\_]$)/', '', $text);

        return strtolower($text);
    }

    /**
     * Convert a string to CamelCaps format.
     *
     * @param string $text The string to convert
     *
     * @return string The formatted string
     */
    public static function camelCaps($text)
    {
        $text = static::normalize($text);
        $text = preg_replace('/((?<=\s)?[A-Z])/', ' $1', $text);
        $text = preg_replace('/[\s]+/', ' ', $text);
        $text = trim($text);
        $text = static::slug($text);
        $text = str_replace('-', ' ', $text);
        $text = ucwords($text);

        return str_replace(' ', '', $text);
    }

    /**
     * Convert a string to camelCase format.
     *
     * @param string $text The string to convert
     *
     * @return string The formatted string
     */
    public static function camelCase($text)
    {
        return lcfirst(static::camelCaps($text));
    }

    /**
     * Convert a string to slug-format.
     *
     * @param string $text The string to convert
     *
     * @return string The formatted string
     */
    public static function slug($text)
    {
        $text = static::normalize($text);
        $text = preg_replace('/((?<=\s)?[A-Z])/', ' $1', $text);
        $text = preg_replace('/[\s]+/', ' ', $text);
        $text = preg_replace('/[^a-z0-9\-]/i', '-', $text);
        $text = preg_replace('/[\-]+/', '-', $text);
        $text = preg_replace('/(^[\-]|[\-]$)/', '', $text);

        return strtolower($text);
    }

    /**
     * Convert a string to the PHP namespace format.
     *
     * @param string $text The string to convert
     *
     * @return string The formatted string
     */
    public static function namespaced($text)
    {
        $text = static::normalize($text);
        $text = preg_replace('/((?<=\s)?[A-Z])/', ' $1', $text);
        $text = preg_replace('/[\s]+/', ' ', $text);
        $text = preg_replace('/[^a-z0-9\\\]/i', '\\', $text);
        $text = preg_replace('/[\\\]+/', '\\', $text);
        $text = preg_replace('/(^[\\\]|[\\\]$)/', '', $text);

        return strtolower($text);
    }

    /**
     * Returns a random string of the specified length.
     *
     * @param int $length The length of the returned string
     *
     * @return string The random string
     */
    public static function random($length = 6)
    {
        $pool = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

        return substr(str_shuffle(str_repeat($pool, $length * 2)), 0, $length);
    }

    /**
     * Returns the plural of a provided string.
     *
     * @param string $text The string to pluralize
     *
     * @codeCoverageIgnore
     *
     * @return string
     */
    public static function pluralize($text)
    {
        return Inflector::pluralize($text);
    }

    /**
     * Returns the singular of a provided string.
     *
     * @param string $text The string the singularize
     *
     * @codeCoverageIgnore
     *
     * @return string
     */
    public static function singularize($text)
    {
        return Inflector::singularize($text);
    }
}
