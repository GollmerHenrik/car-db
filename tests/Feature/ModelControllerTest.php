<?php

namespace Tests\Feature;

use App\Models\CarModel;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ModelControllerTest extends TestCase
{
    use RefreshDatabase;
    public function test_user_can_view_carmodels_index(){
        CarModel::factory()->count(3)->create();

        $response=$this->get(route("carModels"));
        $response->assertStatus(200);
        $response->assertViewHas("entities");
    }
    
    public function test_user_can_create_carmodels(){
        $this->post(route("makers/store"),['name'=>'New Maker']);
        $makerData=['name'=>'New Model','idMaker'=>"1"];

        $response=$this->post(route("carModels/store"),$makerData);

        $response->assertRedirect(route("carModels"));

        $this->assertDatabaseHas("car_models",$makerData);
        $response->assertSessionHas("success","car model created");
    }
    public function test_user_can_update_carmodels(){
        $model=CarModel::factory()->create();
        
        $this->post(route("makers/store"),['name'=>'New Maker']);
        $updatedData=['name'=>'Updated Model','idMaker'=>"1"];
 
        $response=$this->patch(route("carModels/update",$model->id),$updatedData);
 
        $this->assertDatabaseHas("car_models",$updatedData);
 
        $response->assertRedirect(route("carModels"));
        $response->assertSessionHas("success","car model edited");
    }
 
    public function test_user_can_delete_carmodels() {
        $model=CarModel::factory()->create();
 
        $response=$this->delete(route("carModels/destroy",$model->id));
 
        $this->assertDatabaseMissing("car_models",["id"=>$model->id]);
       
        $response->assertRedirect(route("carModels"));
        $response->assertSessionHas("success","carmodel törölve");
    }
}
