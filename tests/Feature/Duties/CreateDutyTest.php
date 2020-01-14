<?php

namespace App\Feature\Duties;

use Tests\TestCase;
use JWTAuth;
use App\Users\Domain\Models\User;


class CreateDutyTest extends TestCase
{

    /** @test */
    public function un_authenticated_user_cannt_create_duty()
    {

        $this->post('/api/duties', ["duty" => "tst api tst api"], [
            'Accept' => 'application/json',
            'Authorization' => 'Bearer eyJpc3MiOiJodHRwOlwvXC8xMjcuMC4wLjE6ODAwMV'
        ])->assertUnauthorized();
    }

    /** @test */
    public function a_authenticated_user_can_create_duties()
    {

        $user = factory(User::class)->states('with-activation')->create();
        $token = JWTAuth::fromUser($user);

        $this->post('/api/duties', ["duty" => "tst api tst api"], [
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . $token
        ])->assertJsonStructure(['data']);

        $this->assertDatabaseHas('duties', [
            'user_id' => $user->id,
        ]);
    }
}