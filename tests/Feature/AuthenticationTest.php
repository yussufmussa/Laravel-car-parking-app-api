<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthenticationTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    use RefreshDatabase;

     public function testUserCanLoginWithCorrectCredentials(){
        $user = User::factory()->create();

        $response = $this->postJson('api/v1/auth/login',[
            'email' => $user->email,
            'password' => 'password',

        ]);

        $response->assertStatus(200);
     }

     public function testUserCannotLoginWithWrongCredentials(){

        $user = User::factory()->create();
        $response = $this->postJson('api/v1/auth/login', [
                'email' => $user->email,
                'password' => 'siyo',
        ]);

        $response->assertStatus(422);

     }
}
