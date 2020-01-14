<?php

namespace Tests\Unit\Duties\Domain\Requests;

use App\Duties\Domain\Requests\DutyFormRequest;
use Illuminate\Support\Str;
use Tests\TestCase;
use Validator;

class DutyFormRequestTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
        $this->dutyFormRequest = new DutyFormRequest;
    }

    /** @test */
    public function it_shouldnt_pass_if_duty_isnt_passed()
    {
        $attributes = [];
        $validator = Validator::make($attributes, $this->dutyFormRequest->rules());
        $this->assertArrayHasKey('duty', $validator->getMessageBag()->toArray());
    }

    /** @test */
    public function it_shouldnt_pass_if_duty_isnt_a_string()
    {
        $attributes = ['duty' => false];
        $validator = Validator::make($attributes, $this->dutyFormRequest->rules());
        $this->assertArrayHasKey('duty', $validator->getMessageBag()->toArray());
    }
    /** @test */
    public function it_shouldnt_pass_if_duty_is_less_than_10_characters()
    {
        $attributes = ['duty' => Str::random(3)];
        $validator = Validator::make($attributes, $this->dutyFormRequest->rules());
        $this->assertArrayHasKey('duty', $validator->getMessageBag()->toArray());
    }

    /** @test */
    public function it_should_pass_if_is_completed_isnt_passed()
    {
        $attributes = ['duty' => Str::random(20)];

        $validator = Validator::make($attributes, $this->dutyFormRequest->rules());
        $this->assertArrayNotHasKey('duty', $validator->getMessageBag()->toArray());
    }


    /** @test */
    public function it_shouldnt_pass_if_is_completed_isnt_boolen()
    {
        $attributes = ['duty' => Str::random(20), 'is_completed' => Str::random(4)];
        $validator = Validator::make(
            $attributes,
            $this->dutyFormRequest->rules()
        );
        $this->assertArrayHasKey('is_completed', $validator->getMessageBag()->toArray());
    }
}