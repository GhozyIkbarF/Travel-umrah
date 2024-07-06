<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MaskpaiTest extends TestCase
{
    public function test_maskapai(): void
{
    $response = $this->get('maskapai');

    // Follow the redirection
    $response->assertStatus(302);

    $redirectUrl = $response->headers->get('Location');
    
    // Make a new request to the redirected URL
    $this->get($redirectUrl)->assertStatus(200);
}
}
