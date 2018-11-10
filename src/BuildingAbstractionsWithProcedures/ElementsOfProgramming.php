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
     * `square(5) // 25`
     * @param int $x
     * @return int
     */
    public function square(int $x)
    {
        return $x * $x;
    }

    /**
     * Сумма квадратов
     * `sumOfSquares(3, 4) // 25`
     * @param int $x
     * @param int $y
     * @return int
     */
    public function sumOfSquares(int $x, int $y) : int
    {
        return $this->square($x) + $this->square($y);
    }

    /**
     * Сумма квадратов двух больших чисел из трех
     * Первое решение что просто пришло на ум
     * `sumOfSquaresOfTopTwo(5, 6, 7) // 85`
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

    /**
     * Сумма квадратов двух больших чисел из трех
     * Второй вариант решения, более элегантен чем первый и гораздо меньше кода
     * `sumOfSquaresOfTopTwo(5, 6, 7) // 85`
     * @param int $x
     * @param int $y
     * @param int $z
     * @return int
     */
    public function sumOfSquaresOfTopTwo2(int $x, int $y, int $z) {

        return $this->sumOfSquares( max($x, $y), max(  min($x, $y) ,$z));

    }

    /**
     * Среднее значение между двумя числами
     * `average(4, 17)` // 10.5
     * @param $x
     * @param $y
     * @return float|int
     */
    public function average ($x, $y) {

        return ($x + $y) / 2;
    }

    /**
     * Приближение для числа, Среднее между значением приближения и делением того числа от которого ищем корень
     * `improve(1, 2) // 1.5`
     * `improve(1, 9) // 5`
     * `improve(5, 9) // 3.4`
     * `improve(3.4, 9) // 3.0235294117647`
     * @param $guess
     * @param $x
     * @return float|int
     */
    public function improve($guess, $x)
    {
        return $this->average($guess, ( $x / $guess));
    }

    /**
     * Функция предикат, определяем достаточное приближение для числа на каждом шаге рекурсии с уточнением
     * `isGoodEnough(1 * 1 , 9)) // 8 - improve = 5`
     * `isGoodEnough(5 * 5 , 9)) // 16 - improve = 3.4`
     * `isGoodEnough(3.4 * 3.4 , 9)) // 2.56 - improve = 3.0235294117647`
     * @param $guess
     * @param $x
     * @param float $tolerance
     * @return bool
     */
    public function isGoodEnough($guess, $x, $tolerance = 0.001)
    {
        return (abs($guess - $x) < $tolerance);
    }

    /**
     * Рекурсивная функция поиска квадратоного корня
     * @param $guess
     * @param $x
     * @return mixed
     */
    public function sqrtIter($guess, $x)
    {
        if ($this->isGoodEnough($guess * $guess, $x)) {
            return $guess;
        } else{
            return $this->sqrtIter($this->improve($guess, $x), $x);
        }
    }

    /**
     * @param $x
     * @param float $guess
     * @return mixed
     */
    public function sqrt($x, $guess = 1.0){

        return $this->sqrtIter($guess, $x);
    }
}