<?php

declare(strict_types=1);

namespace Tests\Kajti\Verhoeff;

use Kajti\Verhoeff\Verhoeff;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\TestCase;

final class VerhoeffTest extends TestCase
{
    public function testIsValidate(): void
    {
        $verhoeff = new Verhoeff('8107');
        Assert::assertSame(true, $verhoeff->validate());
    }

    public function testIsNotValidate(): void
    {
        $verhoeff = new Verhoeff('131231231');
        Assert::assertSame(false, $verhoeff->validate());
    }

    public function testIsDigitNumberIsCorrect(): void
    {
        $verhoeff = new Verhoeff('8107');
        Assert::assertSame(0, $verhoeff->getDigit());
    }

    public function testIsDigitNumberIsUnCorrect(): void
    {
        $verhoeff = new Verhoeff('131231231');
        Assert::assertSame(7, $verhoeff->getDigit());
    }
}
