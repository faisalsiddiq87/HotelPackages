<?php

namespace Tests\Unit;

use Tests\TestCase;

class AuthTest extends TestCase
{
    /**
     * api/auth/login [POST]
    */
    public function testShouldCreateToken()
    {
        $response = $this->withHeaders([
            'Content-Type' => 'application/json',
            'X-Requested-With' => 'XMLHttpRequest',
        ])->postJson('/api/auth/login', ['email' => 'faisal.siddiq87@gmail.com', 'password' => '123456']);
    
        $response->assertStatus(200)
        ->assertJsonStructure([
            'data' => [
               'access_token'
            ]
        ]);
    }

    /**
     * api/auth/signup [POST]
    */
    public function testNotShouldCreateUser()
    {
        $response = $this->withHeaders([
            'Content-Type' => 'application/json',
            'X-Requested-With' => 'XMLHttpRequest',
        ])->postJson('/api/auth/signup', ['email' => 'faisal.siddiq87@gmail.com', 'password' => '123456', 
        "password_confirmation" => "123456", "name" => "faisal"]);
    
        $response->assertStatus(200)
        ->assertJsonStructure([
            'errors' => [
               'email'
            ]
        ]);
    }
  }