<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HotelTest extends TestCase
{
    public function test_hotel(): void
{
    $response = $this->get('hotel');

    // Follow the redirection
    $response->assertStatus(302);

    $redirectUrl = $response->headers->get('Location');
    
    // Make a new request to the redirected URL
    $this->get($redirectUrl)->assertStatus(200);
}
}
