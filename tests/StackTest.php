<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use Tests\Mock\MockStack;

class StackTest extends TestCase
{
    private $stack;

    /**
     * Reset and create new Stack
     *
     */
    public function setUp()
    {
        $this->stack = new MockStack();
    }

    public function testEmpty()
    {
        $this->assertEquals(null, null);
    }

    /**
     * Adds a String to the stack, and checks the first item is identical to
     * the string just added.
     *
     * Removes the String using the pop function, and checks an expected
     * null, due to there being nothing in the stack.
     */
    public function testOne()
    {
        $this->stack->push('First Item');

        $this->assertEquals('First Item', $this->stack->pop());
        $this->assertNull($this->stack->pop());
    }

    /**
     * Adds Junk Data to the stack, and checks everything input is
     * being added in the right order.
     */
    public function testJunkData()
    {
        $this->stack->push(null);
        $this->stack->push(false);
        $this->stack->push(true);
        $this->stack->push([]);
        $this->stack->push('');
        $this->stack->push(3.6);

        $this->assertEquals(3.6, $this->stack->pop());
        $this->assertEquals('', $this->stack->pop());
        $this->assertInternalType('array', $this->stack->pop());
        $this->assertEquals(true, $this->stack->pop());
        $this->assertEquals(false, $this->stack->pop());
        $this->assertEquals(null, $this->stack->pop());
    }
}