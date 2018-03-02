<?php

declare(strict_types=1);

namespace Kajti\Verhoeff;

/**
 * Class Verhoeff
 *
 * @based_on https://en.wikipedia.org/wiki/Verhoeff_algorithm
 */
class Verhoeff
{
    /**
     * @var string
     */
    private $number;

    /**
     * @var array
     */
    private static $d = [
        [0, 1, 2, 3, 4, 5, 6, 7, 8, 9],
        [1, 2, 3, 4, 0, 6, 7, 8, 9, 5],
        [2, 3, 4, 0, 1, 7, 8, 9, 5, 6],
        [3, 4, 0, 1, 2, 8, 9, 5, 6, 7],
        [4, 0, 1, 2, 3, 9, 5, 6, 7, 8],
        [5, 9, 8, 7, 6, 0, 4, 3, 2, 1],
        [6, 5, 9, 8, 7, 1, 0, 4, 3, 2],
        [7, 6, 5, 9, 8, 2, 1, 0, 4, 3],
        [8, 7, 6, 5, 9, 3, 2, 1, 0, 4],
        [9, 8, 7, 6, 5, 4, 3, 2, 1, 0],
    ];

    /**
     * @var array
     */
    private static $p = [
        [0, 1, 2, 3, 4, 5, 6, 7, 8, 9],
        [1, 5, 7, 6, 2, 8, 3, 0, 9, 4],
        [5, 8, 0, 3, 7, 9, 6, 1, 4, 2],
        [8, 9, 1, 6, 0, 4, 3, 5, 2, 7],
        [9, 4, 5, 3, 1, 2, 6, 8, 7, 0],
        [4, 2, 8, 6, 5, 7, 3, 9, 0, 1],
        [2, 7, 9, 3, 8, 0, 6, 4, 1, 5],
        [7, 0, 4, 6, 9, 1, 3, 2, 5, 8],
    ];

    /**
     * @var array
     */
    private static $inv = [0, 4, 3, 2, 1, 5, 6, 7, 8, 9];

    /**
     * Verhoeff constructor.
     *
     * @param string $number
     */
    public function __construct(string $number)
    {
        $this->number = $number;
    }

    /**
     * @return bool
     */
    public function validate(): bool
    {
        return $this->calculate() === 0;
    }

    /**
     * @return int
     */
    public function getDigit(): int
    {
        $check = $this->calculate();

        return self::$inv[$check];
    }

    /**
     * @return int
     */
    private function calculate(): int
    {
        $numberLength = mb_strlen($this->number);
        $check = 0;
        for ($i = 0; $i < $numberLength; ++$i) {
            $digit = (int) $this->number[$numberLength - $i - 1];
            $check = self::$d[$check][self::$p[$i % 8][$digit]];
        }

        return $check;
    }
}
