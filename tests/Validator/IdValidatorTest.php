<?php

/*
 * This file is part of the zibios/wrike-php-library package.
 *
 * (c) Zbigniew Ślązak
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Zibios\WrikePhpLibrary\Tests\Validator;

use Zibios\WrikePhpLibrary\Tests\TestCase;
use Zibios\WrikePhpLibrary\Validator\IdValidator;

/**
 * Id Validator Test.
 */
class IdValidatorTest extends TestCase
{
    /**
     * @return array
     */
    public function nullIdProvider()
    {
        return [
            // value, isValid
            [null, true],
            ['', false],
            ['test', false],
        ];
    }

    /**
     * @param mixed $value
     * @param bool  $isValid
     *
     * @dataProvider nullIdProvider
     */
    public function test_isNullMethods($value, $isValid)
    {
        self::assertSame($isValid, IdValidator::isNull($value), sprintf('validation null "%s"', $value));

        $withoutException = true;
        try {
            IdValidator::assertIsNull($value);
        } catch (\Exception $e) {
            $withoutException = false;
        }
        self::assertSame($isValid, $withoutException, sprintf('assert null "%s"', $value));
    }

    /**
     * @return array
     */
    public function stringIdProvider()
    {
        return [
            // value, isValid
            ['test', true],
            ['123456789012345', true],
            [null, false],
            [123, false],
            ['', false],
            [' ', false],
            ['1234567890123456', false],
        ];
    }

    /**
     * @param mixed $value
     * @param bool  $isValid
     *
     * @dataProvider stringIdProvider
     */
    public function test_isValidIdStringMethods($value, $isValid)
    {
        self::assertSame($isValid, IdValidator::isValidIdString($value), sprintf('validation string "%s"', $value));

        $withoutException = true;
        try {
            IdValidator::assertIsValidIdString($value);
        } catch (\Exception $e) {
            $withoutException = false;
        }
        self::assertSame($isValid, $withoutException, sprintf('assert string "%s"', $value));
    }

    /**
     * @return array
     */
    public function arrayIdProvider()
    {
        return [
            // value, isValid
            [['test'], true],
            [['123456789012345'], true],
            [[null], false],
            [[123], false],
            [[''], false],
            [[' '], false],
            [['1234567890123456'], false],
            [[], false],
            ['string', false],
            [null, false],
        ];
    }

    /**
     * @param mixed $value
     * @param bool  $isValid
     *
     * @dataProvider arrayIdProvider
     */
    public function test_isValidIdArrayMethods($value, $isValid)
    {
        self::assertSame($isValid, IdValidator::isValidIdArray($value), sprintf('validation string "%s"', is_array($value) ? implode(', ', $value) : $value));

        $withoutException = true;
        try {
            IdValidator::assertIsValidIdArray($value);
        } catch (\Exception $e) {
            $withoutException = false;
        }
        self::assertSame($isValid, $withoutException, sprintf('assert string "%s"', is_array($value) ? implode(', ', $value) : $value));
    }
}
