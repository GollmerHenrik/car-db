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

    public function test_user_can_view_makers_index(){
        Maker::factory()->count(3)->create();

        $response=$this->get(route("makers"));
        $response->assertStatus(200);
        $response->assertViewHas("entities");
    }
    
    public function test_user_can_create_maker(){
        
        $makerData=['name'=>'New Maker'];

        $response=$this->post(route("makers/store"),$makerData);

        $response->assertRedirect(route("makers"));

        $this->assertDatabaseHas("makers",$makerData);
        $response->assertSessionHas("success","sikeres létrehozás");
    }
    public function test_user_can_update_maker(){
        $maker=Maker::factory()->create();

        $updatedData=['name'=>'Updated Maker'];

        $response=$this->patch(route("makers/update",$maker->id),$updatedData);

        $this->assertDatabaseHas("makers",$updatedData);

        $response->assertRedirect(route("makers"));
        $response->assertSessionHas("success","Gyártó módosítva.");
    }

    public function test_user_can_delete_maker() {
        $maker=Maker::factory()->create();

        $response=$this->delete(route("makers/destroy",$maker->id));

        $this->assertDatabaseMissing("makers",["id"=>$maker->id]);
        
        $response->assertRedirect(route("makers"));
        $response->assertSessionHas("success","Element deleted successfully.");
    }
}
