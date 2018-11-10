<?php

namespace LexusAlexTest\PhpSicp\BuildingAbstractionsWithProcedures;


use PHPUnit\Framework\TestCase;
use LexusAlex\PhpSicp\BuildingAbstractionsWithProcedures\ElementsOfProgramming;

class ElementsOfProgrammingTest extends TestCase
{
    /**
     * @var ElementsOfProgramming
     */
    public $object;

    public function setUp(){

        $this->object = new ElementsOfProgramming();
    }

    public function testSquare()
    {
        $this->assertEquals($this->object->square(3), 9);
    }

    public function testSumOfSquares()
    {
        $this->assertEquals($this->object->sumOfSquares(3, 4), 25);
    }

    public function SumOfSquaresOfTopTwoProvider()
    {
        return [
            'five six seven'  => [5, 6, 7, 85],
            'one one one' => [1, 1, 1, 2],
            'seven seven seven' => [7, 7, 7, 98],
            'three seven one' => [3, 7, 1, 58],
        ];

    }

    /**
     * @dataProvider SumOfSquaresOfTopTwoProvider
     */
    public function testSumOfSquaresOfTopTwo($x, $y, $z, $expected)
    {
        $this->assertEquals($this->object->sumOfSquaresOfTopTwo($x, $y, $z), $expected);
    }

    /**
     * @dataProvider SumOfSquaresOfTopTwoProvider
     */
    public function testSumOfSquaresOfTopTwo2($x, $y, $z, $expected)
    {
        $this->assertEquals($this->object->sumOfSquaresOfTopTwo2($x, $y, $z), $expected);
    }

    public function testAverage()
    {
        $this->assertEquals($this->object->average(4, 16), 10, 'Среднее значение не верно');
        $this->assertEquals($this->object->average(7.5, 16.9), 12.2, 'Среднее значение не верно');
    }

    public function testImprove()
    {
        $this->assertEquals($this->object->improve(1, 2), 1.5);
    }


    public function IsGoodEnoughProvider()
    {
        return [
            'one'  => [1, 9, 8],
            'two'  => [3.4, 9, 2.56],
        ];

    }

    /**
     * @dataProvider IsGoodEnoughProvider
     */
    public function testIsGoodEnough($x, $y, $expected)
    {
        $this->assertFalse($this->object->isGoodEnough($x, $y, $expected));

    }

    public function SqrtProvider()
    {
        return [
            [2, 1.4142156862745],
            [9, 3.0000915541314],
            [16, 4.0000006366929],
            [25, 5.0000231782539],
        ];

    }

    /**
     * @dataProvider SqrtProvider
     */
    public function testSqrt($x, $expected)
    {
        $this->assertSame($this->object->sqrt($x), $expected);

    }
}