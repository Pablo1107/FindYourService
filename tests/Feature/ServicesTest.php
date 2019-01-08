<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ServicesTest extends TestCase
{

    use RefreshDatabase;

    /**
     * Test if a auth user can create a service
     *
     * @return void
     */
    public function test_a_user_can_create_a_service()
    {
        // Given a user who is logged in
        $this->actingAs(factory('App\User')->create());

        // When they hit the endpoint /services to create a new service
        $this->post('/services', [
            'title' => 'New Service',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
            'address' => 'Yapeyu 73',
            'city' => 'Buenos Aires',
            'state' => 'Buenos Aires',
            'zipcode' => 'C1202ACA',
            'longitude' => -58.42,
            'latitude' => -34.61
        ]);

        // Then there should be a new service in the database
        $this->assertDatabaseHas('services', ['title' => 'New Service']);
    }

    /**
     * Test if a guest user cannot create a service
     *
     * @return void
     */
    public function test_a_guest_may_not_create_service()
    {
        // When guest try to hit the endpoint /services
        $this->post('/services')->assertRedirect('/login');

    }
}
