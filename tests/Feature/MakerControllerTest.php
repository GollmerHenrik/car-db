<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Maker;

class MakerControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    use RefreshDatabase;
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
    public function test_user_can_view_makers_index(){
        Maker::factory()->count(3)->create();

        $response=$this->get(route("makers"));
        $response->assertStatus(200);
        $response->assertViewHas("makers");
    }
}
