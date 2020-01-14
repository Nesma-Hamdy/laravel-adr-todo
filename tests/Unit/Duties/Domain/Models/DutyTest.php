<?php

namespace Tests\Unit\Duties\Domain\Models;

use Tests\TestCase;
use App\Users\Domain\Models\User;
use App\Duties\Domain\Models\Duty;
use Illuminate\Support\Facades\Event;

class DutyTest extends TestCase
{


    /** @test */
    public function it_should_has_user_relationship_with_user_id_as_foreign_key()
    {
        Event::fake();

        $duty = factory(Duty::class)->create();

        $this->assertInstanceOf(User::class, $duty->user);
    }

    /** @test */
    function it_checks_duty_is_completed()
    {
        Event::fake();

        $duty = factory(Duty::class)->create();

        $this->assertIsBool($duty->isCompleted());
    }
}