<?php

namespace App\Feature\Duties;

use JWTAuth;
use Tests\TestCase;
use App\Users\Domain\Models\User;
use App\Duties\Domain\Models\Duty;
use Illuminate\Support\Facades\Event;

class DeleteDutyTest extends TestCase
{

    /** @test */
    public function authorized_user_can_delete_duty()
    {

        Event::fake();
        $user = factory(User::class)->states('with-activation')->create();
        $token = JWTAuth::fromUser($user);

        $duty = factory(Duty::class)->create();

        $this->json('delete', '/api/duties/' . $duty->id, [], [
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . $token
        ])->assertStatus(200);

        $this->assertDeleted('duties', [
            'id' => $duty->id,
        ]);
    }
}