<?php

namespace Tests\Unit\Duties\Domain\Resources;

use Tests\TestCase;
use App\Duties\Domain\Models\Duty;
use Illuminate\Support\Facades\Event;
use App\Duties\Domain\Resources\DutyResource;

class DutyResourceTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
        $this->duty = factory(Duty::class)->make();
    }
    /** @test */
    public function it_should_return_a_normal_resource_without_any_relation_loaded()
    {
        Event::fake();

        $duty = new DutyResource($this->duty);

        $this->assertEquals([
            'id' => $this->duty->id,
            'user_id' => $this->duty->user_id,
            'is_completed' => $this->duty->isCompleted(),
            'duty' => $this->duty->duty,
            'created_at_human' => $this->duty->created_at->diffForHumans(),
            'updated_at_human' => $this->duty->updated_at->diffForHumans(),
        ], $duty->resolve());
    }
}