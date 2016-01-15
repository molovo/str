<?php

namespace Molovo\Str\Tests;

use Molovo\Str\Str;

class StrTest extends \Codeception\TestCase\Test
{
    /**
     * Test removal of special characters from strings.
     *
     * @param string $str      The string to convert
     * @param string $expected The expected output
     *
     * @dataProvider normalizeDataProvider
     *
     * @covers Molovo\Str\Str::normalize
     */
    public function testNormalize($str, $expected)
    {
        verify(Str::normalize($str))->equals($expected);
    }

    /**
     * Provides data for normalization of strings.
     *
     * @return array
     */
    public function normalizeDataProvider()
    {
        return [
            ['åñ åwéßømé téßt ßtrîñg', 'an awesome test string'],
            ['wøñdérfül wøñdérfül téßtîñg', 'wonderful wonderful testing'],
        ];
    }

    /**
     * Tests conversion of string to title case.
     *
     * @param string $str      The string to convert
     * @param string $expected The expected output
     *
     * @dataProvider titleDataProvider
     *
     * @covers Molovo\Str\Str::title
     */
    public function testTitle($str, $expected)
    {
        verify(Str::title($str))->equals($expected);
    }

    /**
     * Provides an array of string suitable for title conversion.
     *
     * @return array
     */
    public function titleDataProvider()
    {
        return [
            ['this_is_a_test', 'This Is A Test'],
            ['another-test', 'Another Test'],
            ['testing some-more', 'Testing Some More'],
            ['tést wîth spécîål chåråctérs', 'Tést Wîth Spécîål Chåråctérs'],
            ['testing, with punctuation.', 'Testing, With Punctuation.'],
            ['testingCamelCase', 'Testing Camel Case'],
            ['TestingCamelCaps', 'Testing Camel Caps'],
            ['Should Not Change', 'Should Not Change'],

            // Test shouldn't fail with an empty dataset
            ['', ''],
            [null, null],
        ];
    }

    /**
     * Tests conversion of string to slug case.
     *
     * @param string $str      The string to convert
     * @param string $expected The expected output
     *
     * @dataProvider slugDataProvider
     *
     * @covers Molovo\Str\Str::slug
     */
    public function testSlug($str, $expected)
    {
        verify(Str::slug($str))->equals($expected);
    }

    /**
     * Provides an array of string suitable for slug conversion.
     *
     * @return array
     */
    public function slugDataProvider()
    {
        return [
            ['this_is_a_test', 'this-is-a-test'],
            ['Another Test', 'another-test'],
            ['testing some--more', 'testing-some-more'],
            ['tést wîth spécîål chåråctérs', 'test-with-special-characters'],
            ['testing, with punctuation.', 'testing-with-punctuation'],
            ['testingCamelCase', 'testing-camel-case'],
            ['TestingCamelCaps', 'testing-camel-caps'],
            ['Testing Title Case', 'testing-title-case'],
            ['should-not-change', 'should-not-change'],

            // Test shouldn't fail with an empty dataset
            ['', ''],
            [null, null],
        ];
    }

    /**
     * Tests conversion of string to snake_case.
     *
     * @param string $str      The string to convert
     * @param string $expected The expected output
     *
     * @dataProvider snakeCaseDataProvider
     *
     * @covers Molovo\Str\Str::snakeCase
     */
    public function testSnakeCase($str, $expected)
    {
        verify(Str::snakeCase($str))->equals($expected);
    }

    /**
     * Provides an array of string suitable for snake_case conversion.
     *
     * @return array
     */
    public function snakeCaseDataProvider()
    {
        return [
            ['this-is-a-test', 'this_is_a_test'],
            ['Another Test', 'another_test'],
            ['testing some__more', 'testing_some_more'],
            ['tést wîth spécîål chåråctérs', 'test_with_special_characters'],
            ['testing, with punctuation.', 'testing_with_punctuation'],
            ['testingCamelCase', 'testing_camel_case'],
            ['TestingCamelCaps', 'testing_camel_caps'],
            ['Testing Title Case', 'testing_title_case'],
            ['should_not_change', 'should_not_change'],

            // Test shouldn't fail with an empty dataset
            ['', ''],
            [null, null],
        ];
    }

    /**
     * Tests conversion of string to camelCase.
     *
     * @param string $str      The string to convert
     * @param string $expected The expected output
     *
     * @dataProvider camelCaseDataProvider
     *
     * @covers Molovo\Str\Str::camelCase
     */
    public function testCamelCase($str, $expected)
    {
        verify(Str::camelCase($str))->equals($expected);
    }

    /**
     * Provides an array of string suitable for camelCase conversion.
     *
     * @return array
     */
    public function camelCaseDataProvider()
    {
        return [
            ['this-is-a-test', 'thisIsATest'],
            ['Another Test', 'anotherTest'],
            ['testing some__more', 'testingSomeMore'],
            ['tést wîth spécîål chåråctérs', 'testWithSpecialCharacters'],
            ['testing, with punctuation.', 'testingWithPunctuation'],
            ['testingCamelCase', 'testingCamelCase'],
            ['TestingCamelCaps', 'testingCamelCaps'],
            ['Testing Title Case', 'testingTitleCase'],
            ['shouldNotChange', 'shouldNotChange'],

            // Test shouldn't fail with an empty dataset
            ['', ''],
            [null, null],
        ];
    }

    /**
     * Tests conversion of string to camelCaps.
     *
     * @param string $str      The string to convert
     * @param string $expected The expected output
     *
     * @dataProvider camelCapsDataProvider
     *
     * @covers Molovo\Str\Str::camelCaps
     */
    public function testCamelCaps($str, $expected)
    {
        verify(Str::camelCaps($str))->equals($expected);
    }

    /**
     * Provides an array of string suitable for camelCaps conversion.
     *
     * @return array
     */
    public function camelCapsDataProvider()
    {
        return [
            ['this-is-a-test', 'ThisIsATest'],
            ['Another Test', 'AnotherTest'],
            ['testing some__more', 'TestingSomeMore'],
            ['tést wîth spécîål chåråctérs', 'TestWithSpecialCharacters'],
            ['testing, with punctuation.', 'TestingWithPunctuation'],
            ['testingCamelCase', 'TestingCamelCase'],
            ['TestingCamelCaps', 'TestingCamelCaps'],
            ['Testing Title Case', 'TestingTitleCase'],
            ['shouldNotChange', 'ShouldNotChange'],

            // Test shouldn't fail with an empty dataset
            ['', ''],
            [null, null],
        ];
    }

    /**
     * Tests conversion of string to namespaced format.
     *
     * @param string $str      The string to convert
     * @param string $expected The expected output
     *
     * @dataProvider namespacedDataProvider
     *
     * @covers Molovo\Str\Str::namespaced
     */
    public function testNamespaced($str, $expected)
    {
        verify(Str::namespaced($str))->equals($expected);
    }

    /**
     * Provides an array of string suitable for namespace conversion.
     *
     * @return array
     */
    public function namespacedDataProvider()
    {
        return [
            ['this-is-a-test', 'this\is\a\test'],
            ['Another Test', 'another\test'],
            ['testing some\\more', 'testing\some\more'],
            ['tést wîth spécîål chåråctérs', 'test\with\special\characters'],
            ['testing, with punctuation.', 'testing\with\punctuation'],
            ['testingCamelCase', 'testing\camel\case'],
            ['TestingCamelCaps', 'testing\camel\caps'],
            ['Testing Title Case', 'testing\title\case'],
            ['should\not\change', 'should\not\change'],

            // Test shouldn't fail with an empty dataset
            ['', ''],
            [null, null],
        ];
    }

    /**
     * Tests that the output of random strings is correct.
     *
     * @dataProvider randomStringLengthDataProvider
     *
     * @covers Molovo\Str\Str::random
     */
    public function testRandomString($length)
    {
        $str = Str::random($length);
        verify(strlen($str))->equals($length ?: 6);
        verify(preg_match('/[^a-zA-Z0-9]/', $str, $matches))->equals(0);
        verify($matches)->isEmpty();
    }

    /**
     * Provides string lengths for use in random string generation.
     *
     * @return array
     */
    public function randomStringLengthDataProvider()
    {
        return [
            [1],
            [2],
            [3],
            [4],
            [5],
            [10],
            [24],
            [32],
            [64],
            [256],
            [1024],
        ];
    }

    /**
     * Tests that the output of random strings is truly random.
     *
     * @covers Molovo\Str\Str::random
     */
    public function testRandomStringUniqueness()
    {
        $strings = [];

        $i = 0;
        while ($i <= 100) {
            $strings[] = Str::random(10);
            $i++;
        }

        verify(count(array_unique($strings)))->equals(count($strings));
    }
}
