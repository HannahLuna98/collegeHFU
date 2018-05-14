<?php

namespace Tests;

use PHPUnit\Framework\TestCase;

class MockQueue
{
    /** @var array Array of mixed items to form the queue **/
    private $queueItems;

    public function __construct()
    {
        $this->queueItems = [];
    }

    /**
     * Adds an item into the queu
     *
     * @param mixed $item A new queue item
     */
    public function add($item)
    {
        $this->queueItems[] = $item;
    }

    /**
     * Returns and removes the next item in the queue
     * which is actually the first added
     *
     * @return mixed|null The next item in the queue
     */
    public function next()
    {
        // @see array_shift which does this directly in php
        // return array_shift($this->queueItems);

        if (empty($this->queueItems)) {
            return null;
        }

        $first = current($this->queueItems);

        // remove this from the queue
        array_shift($this->queueItems);

        return $first;
    }
}

class QueueTest extends TestCase
{
    private $queue;

    /**
     * Reset and create new Queue
     *
     */
    public function setUp()
    {
        $this->queue = new MockQueue;
    }

    /**
     * If item is empty move onto the next one
     *
     */
    public function testEmpty()
    {
        $this->assertNull($this->queue->next());
    }

    /**
     * Add an item and then check it exists in the queue
     *
     */
    public function testOne()
    {
        $this->queue->add('first item');

        $this->assertEquals('first item', $this->queue->next());
        $this->assertNull($this->queue->next());
    }

    /**
     * Add multiple items and check they exist
     * by making sure you can pass through them
     * one item at a time.
     *
     */
    public function testMultiple()
    {
        $this->queue->add('first item');
        $this->queue->add('second item');
        $this->queue->add('third item');

        $this->assertEquals('first item', $this->queue->next());
        $this->assertEquals('second item', $this->queue->next());
        $this->assertEquals('third item', $this->queue->next());
        $this->assertNull($this->queue->next());
    }
}
