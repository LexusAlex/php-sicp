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

    public function testSumOfSquaresOfTopTwo()
    {
        $this->assertEquals($this->object->sumOfSquaresOfTopTwo(5, 6, 7), 85);
        $this->assertEquals($this->object->sumOfSquaresOfTopTwo(1, 1, 1), 2);
        $this->assertEquals($this->object->sumOfSquaresOfTopTwo(10, 10, 20), 500);
    }
}