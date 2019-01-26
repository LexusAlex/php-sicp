<?php

namespace LexusAlex\PhpSicp\BuildingAbstractionsWithProcedures;

/**
 * Class ElementsOfProgramming
 *
 * @package LexusAlex\PhpSicp\BuildingAbstractionsWithProcedures
 */
class ElementsOfProgramming
{
    /**
     * Квадрат числа
     * `square(5) // 25`
     *
     * @param  int $x
     * @return int
     */
    public function square(int $x)
    {
        return $x * $x;
    }

    /**
     * Сумма квадратов
     * `sumOfSquares(3, 4) // 25`
     *
     * @param  int $x
     * @param  int $y
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
     *
     * @param  int $x
     * @param  int $y
     * @param  int $z
     * @return mixed
     */
    public function sumOfSquaresOfTopTwo(int $x, int $y, int $z)
    {
        $result = [$this->square($x), $this->square($y), $this->square($z)];

        rsort($result);

        return ($result[0] + $result[1]);
    }

    /**
     * Сумма квадратов двух больших чисел из трех
     * Второй вариант решения, более элегантен чем первый и гораздо меньше кода
     * `sumOfSquaresOfTopTwo(5, 6, 7) // 85`
     *
     * @param  int $x
     * @param  int $y
     * @param  int $z
     * @return int
     */
    public function sumOfSquaresOfTopTwo2(int $x, int $y, int $z)
    {
        return $this->sumOfSquares(max($x, $y), max(min($x, $y), $z));
    }

    /**
     * Среднее значение между двумя числами
     * `average(4, 17)` // 10.5
     *
     * @param  $x
     * @param  $y
     * @return float|int
     */
    public function average($x, $y)
    {
        return ($x + $y) / 2;
    }

    /**
     * Приближение для числа, Среднее между значением приближения и делением того числа от которого ищем корень
     * `improve(1, 2) // 1.5`
     * `improve(1, 9) // 5`
     * `improve(5, 9) // 3.4`
     * `improve(3.4, 9) // 3.0235294117647`
     *
     * @param  $guess
     * @param  $x
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
     *
     * @param  $guess
     * @param  $x
     * @param  float $tolerance
     * @return bool
     */
    public function isGoodEnough($guess, $x, $tolerance = 0.001)
    {
        return (abs($guess - $x) < $tolerance);
    }

    /**
     * Рекурсивная функция поиска квадратоного корня меодом приближений
     *
     * @param  $guess
     * @param  $x
     * @return mixed
     */
    public function sqrtIter($guess, $x)
    {
        if ($this->isGoodEnough($guess * $guess, $x)) {
            return $guess;
        } else {
            return $this->sqrtIter($this->improve($guess, $x), $x);
        }
    }

    /**
     * Поиск квадратного корня числа
     *
     * @param  $x
     * @param  float $guess
     * @return mixed
     */
    public function sqrt($x, $guess = 1.0)
    {

        return $this->sqrtIter($guess, $x);
    }

    /**
     * Функция предикат, определяем достаточное приближение для числа на каждом шаге рекурсии с улучшенной точностью
     *
     * @param  $guess
     * @param  $prevGuess
     * @param  float     $tolerance
     * @return bool
     */
    public function isBetterGoodEnough($guess, $prevGuess, $tolerance = 0.001)
    {
        return (abs(($guess - $prevGuess) / $prevGuess) < $tolerance);
    }

    /**
     * Рекурсивная функция поиска квадратоного корня методом приближений
     *
     * @param  $guess
     * @param  $prevGuess
     * @param  $x
     * @return mixed
     */
    public function betterSqrtIter($guess, $prevGuess, $x)
    {
        if ($this->isBetterGoodEnough($guess, $prevGuess)) {
            return $guess;
        } else{
            return $this->betterSqrtIter($this->improve($guess, $x), $guess, $x);
        }
    }

    /**
     * Поиск квадратного корня числа
     *
     * @param  $x
     * @param  float $guess
     * @param  float $prevGuess
     * @return mixed
     */
    public function betterSqrt($x, $guess = 1.0, $prevGuess = 0.5)
    {
        return $this->betterSqrtIter($guess, $prevGuess, $x);
    }

    // n = n (n - 1)
    // 5 * (5 - 1) * (4 - 1) * (3 - 1) (2 - 1)

    /**
     * Линейно-рекурсивный процесс
     * Как выгляди рекурсия
     * 6 * factorial(6 - 1)
     * 6 * 5 * factorial(5 - 1)
     * 6 * 5 * 4 * factorial(4 - 1)
     * 6 * 5 * 4 * 3 * factorial(3 - 1)
     * 6 * 5 * 4 * 3 * 2 * factorial(2 - 1)
     * 6 * 5 * 4 * 3 * 2 * 1
     * 6 * 5 * 4 * 3 * 2
     * 6 * 5 * 4 * 6
     * 6 * 5 * 24
     * 6 * 120
     * 720
     * @param $n
     * @return float|int
     */
    public function factorial($n)
    {
        return ($n == 1 || $n == 0) ? 1 : ($n * $this->factorial($n - 1));
    }

    public function factorial2($n)
    {

        if ($n == 1 || $n == 0) {
            return 1;
        } else {
            return ($n * $this->factorial($n - 1));
        }
    }

    /**
     * Вычисление факториала с помощью цикла
     * i = 1; factorial = 1;
     * i = 2; factorial = 1 * 2 // 2;
     * i = 3; factorial = 2 * 3 // 6;
     * i = 4; factorial = 6 * 4 // 24;
     * i = 5; factorial = 24 * 5 // 120;
     * i = 6; factorial = 120 * 6 // 720;
     * @param $n
     * @return float|int
     */
    public function factorial3($n)
    {
        $factorial = 1;
        for ($i = 1; $i <= $n; $i++){
            $factorial = $factorial * $i;
        }
        return $factorial;
    }

}