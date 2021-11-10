<?php

namespace Test;

use App\NewDto;
use Fiber;
use PHPUnit\Framework\TestCase;
use Throwable;

class NewDtoTest extends TestCase
{

    /**
     * @test
     * @return void
     */
    public function fiber()
    {
        $messages = [
            'hello',
            "I'm",
            'Hori',
        ];

        $fiber = new Fiber(function ($messages) {
            foreach ($messages as $message) {
                Fiber::suspend($message);
            }
        });

        $message = $fiber->start($messages);

        $fiberRepeatCount = 1;

        while (!$fiber->isTerminated()) {
            echo "fiberCount : {$fiberRepeatCount} message : {$message}";
            $message = $fiber->resume();
            $fiberRepeatCount++;
        }
    }

    /**
     * @test
     */
    public function dtoTest()
    {
        $expectedName = 'test';
        $expectedAge = 123;

        $newDto = new NewDto($expectedName, $expectedAge);

        $this->assertEquals($expectedName, $newDto->name);
        $this->assertEquals($expectedAge, $newDto->age);
    }
}
