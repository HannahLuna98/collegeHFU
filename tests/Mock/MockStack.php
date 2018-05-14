<?php

namespace Tests\Mock;

class MockStack
{
    public $stack;

    public function __construct()
    {
        $this->stack = [];
    }

    /**
     * The push function Adds an item to the Stack.
     *
     * If there is already an item, it will add it
     * to the top of the stack.
     *
     * @param $item
     */
    public function push($item)
    {
        $currentStackSize = count($this->stack);

        if (0 === $currentStackSize) {
            $this->stack[0] = $item;
        } else {
            $this->stack[$currentStackSize] = $item;
        }
    }

    /**
     * The pop function uses array_pop to find the last
     * item added, and then removes it.
     *
     * @return mixed
     */
    public function pop()
    {
        return array_pop($this->stack);
    }
}