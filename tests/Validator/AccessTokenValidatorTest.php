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
use Zibios\WrikePhpLibrary\Validator\AccessTokenValidator;

/**
 * Access Token Validator Test.
 */
class AccessTokenValidatorTest extends TestCase
{
    /**
     * @return array
     */
    public function validTokenProvider()
    {
        return [
            // value, isValid
            ['test', true],
            ['123456789012345', true],
            [null, false],
            [123, false],
            ['', false],
            [' ', false],
        ];
    }

    /**
     * @param mixed $value
     * @param bool  $isValid
     *
     * @dataProvider validTokenProvider
     */
    public function test_isValidMethods($value, $isValid)
    {
        self::assertSame($isValid, AccessTokenValidator::isValid($value), sprintf('validation string "%s"', $value));

        $withoutException = true;
        try {
            AccessTokenValidator::assertIsValid($value);
        } catch (\Exception $e) {
            $withoutException = false;
        }
        self::assertSame($isValid, $withoutException, sprintf('assert string "%s"', $value));
    }

    /**
     * @return array
     */
    public function validOrEmptyTokenProvider()
    {
        return [
            // value, isValid
            ['test', true],
            ['', true],
            ['123456789012345', true],
            [null, false],
            [123, false],
            [' ', false],
        ];
    }

    /**
     * @param mixed $value
     * @param bool  $isValid
     *
     * @dataProvider validOrEmptyTokenProvider
     */
    public function test_isValidOrEmptyMethods($value, $isValid)
    {
        self::assertSame($isValid, AccessTokenValidator::isValidOrEmpty($value), sprintf('validation string "%s"', $value));

        $withoutException = true;
        try {
            AccessTokenValidator::assertIsValidOrEmpty($value);
        } catch (\Exception $e) {
            $withoutException = false;
        }
        self::assertSame($isValid, $withoutException, sprintf('assert string "%s"', $value));
    }
}
