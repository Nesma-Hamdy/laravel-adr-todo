<?php

namespace App\Feature\Duties;

use Tests\TestCase;
use JWTAuth;
use App\Users\Domain\Models\User;


class ReadDutiesListTest extends TestCase
{

    /** @test */
    public function un_authenticated_user_cannt_read_all_duties()
    {

        $this->json('GET', '/api/duties')
            ->assertUnauthorized();
    }

    /** @test */
    public function a_authenticated_user_can_read_all_duties()
    {

        $user = factory(User::class)->states('with-activation')->create();
        $token = JWTAuth::fromUser($user);
        $this->withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . $token
        ])->json('GET', '/api/duties')
            ->assertSuccessful();
    }
}