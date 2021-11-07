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
    public function fiber(){
        $fiber = new Fiber(fn($message) => print $message);
        try {
            $fiber->start('Hi');
        } catch (Throwable $e) {

        }
    }

    /**
     * @test
     */
    public function dtoTest(){
        $expectedName = 'test';
        $expectedAge = 123;

        $newDto = new NewDto($expectedName,$expectedAge);

        $this->assertEquals($expectedName, $newDto->name);
        $this->assertEquals($expectedAge, $newDto->age);
    }
}
