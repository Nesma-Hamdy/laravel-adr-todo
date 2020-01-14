<?php

namespace App\Feature\Duties;

use JWTAuth;
use Tests\TestCase;
use App\Users\Domain\Models\User;
use App\Duties\Domain\Models\Duty;
use Illuminate\Support\Facades\Event;

class UpdateDutyTest extends TestCase
{

    /** @test */
    public function authorized_user_can_update_duty()
    {

        Event::fake();
        $user = factory(User::class)->states('with-activation')->create();
        $token = JWTAuth::fromUser($user);

        $duty = factory(Duty::class)->create();

        $this->json('post', '/api/duties/' . $duty->id, ['duty' => 'test new update data'], [
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . $token
        ])->assertStatus(200);

        $this->assertDatabaseHas('duties', [
            'duty' => 'test new update data',
        ]);
    }
}