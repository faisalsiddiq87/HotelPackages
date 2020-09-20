<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class PackageTest extends TestCase
{
    use WithoutMiddleware;
    /**
     * api/package [GET]
    */
    public function testShouldGetAllPackages()
    {
        $response = $this->get('/api/package');
    
        $response->assertStatus(200)->assertJsonStructure([
            'original' => [
               'data'
            ]
        ]);
    }

    /**
     * api/package/{id} [GET]
    */
    public function testShouldGetOnePackage()
    {
        $response = $this->get('/api/package/7');
    
        $response->assertStatus(200)->assertJsonStructure([
            'data' => [
               'id'
            ]
        ]);
    }
    
    /**
     * api/package [POST]
    */
    public function testShouldCreatePackage()
    {
        $response = $this->withHeaders([
            'Content-Type' => 'application/json',
            'X-Requested-With' => 'XMLHttpRequest',
        ])->postJson('/api/package', ["name" => "kuti kuti Holidays",
        "hotel_id" =>  4, "price" => 630, "duration" => "4 days 2 nights",
        "validity" => "2020-09-29", "description" => "October holiday vacations package"]);
    
        $response->assertStatus(200)
        ->assertJsonStructure([
            'data' => [
               'name'
            ]
        ]);
    }
}