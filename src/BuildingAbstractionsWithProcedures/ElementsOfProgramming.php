<?php

namespace LexusAlex\PhpSicp\BuildingAbstractionsWithProcedures;

/**
 * Class ElementsOfProgramming
 * @package LexusAlex\PhpSicp\BuildingAbstractionsWithProcedures
 */
class ElementsOfProgramming
{
    /**
     * Квадрат числа
     * @param int $x
     * @return int
     */
    public function square(int $x) : int
    {
        return $x * $x;
    }

    /**
     * Сумма квадратов
     * @param int $x
     * @param int $y
     * @return int
     */
    public function sumOfSquares(int $x, int $y) : int
    {
        return $this->square($x) + $this->square($y);
    }

    /**
     * Сумма квадратов двух больших чисел
     * @param int $x
     * @param int $y
     * @param int $z
     * @return mixed
     */
    public function sumOfSquaresOfTopTwo(int $x, int $y, int $z) {

        $result = [$this->square($x), $this->square($y), $this->square($z)];

        rsort($result);

        return ($result[0] + $result[1]);


    }
}