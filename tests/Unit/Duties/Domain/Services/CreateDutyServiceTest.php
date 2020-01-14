<?php

namespace Tests\Unit\Duties\Domain\Services;

use Tests\TestCase;
use Illuminate\Support\Str;
use App\Users\Domain\Models\User;
use Illuminate\Support\Facades\Event;
use App\App\Domain\Payloads\GenericPayload;
use App\Duties\Domain\Services\CreateDutyService;
use App\Duties\Domain\Repositories\DutyRepository;


class CreateDutyServiceTest extends TestCase
{
    /** @test */
    public function it_should_return_an_instance_of_payload()
    {
        Event::fake();
        $user = factory(User::class)->create();

        $data = [
            'duty' => Str::random(20),
            'user_id' => $user->id,
        ];

        $resetUserPasswordService = new CreateDutyService(
            app(DutyRepository::class)
        );
        $response = $resetUserPasswordService->handle($data);

        $this->assertInstanceOf(GenericPayload::class, $response);

        $this->assertObjectHasAttribute('data', $response);
    }
}