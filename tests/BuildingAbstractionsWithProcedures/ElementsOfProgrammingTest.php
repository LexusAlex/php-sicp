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
}