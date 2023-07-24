<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class ServicesAdminAPITest extends TestCase
{

    use RefreshDatabase;

    protected bool $seed = true;

    public function asUser(): self
    {
        $user = new User();
        $user->user_id = 1;
        return $this->actingAs($user);
    }

    public function test_making_a_get_request_to_the_services_api_root_returns_all_the_services(): void
    {

        $response = $this->asUser()->getJson('/api/services');

        $response
            ->assertStatus(200)
            ->assertJsonPath('status', 0)
            ->assertJsonCount(3, 'data')
            ->assertJsonStructure([
                'status',
                'data' => [
                    '*' => [
                        'service_id',
                        'field_id',
                        'adult_id',
                        'title',
                        'price',
                        'description',
                        'blocks',
                        'image',
                        'image_description',
                        'created_at',
                        'updated_at',
                    ]
                ]
            ]);
    }

    public function test_making_a_get_request_to_the_services_api_root_without_being_authenticated_returns_401()
    {
        $response = $this->getJson('/api/services');

        $response->assertStatus(401);
    }

    public function test_making_a_get_request_to_services_with_an_id_returns_the_requested_service()
    {
        $id = 1;
        $response = $this->asUser()->getJson('/api/services/' . $id);

        $response
            ->assertStatus(200)
            ->assertJson(fn (AssertableJson $json) =>
                $json
                    ->where('status', 0)
                    ->where('data.service_id', $id)
                    ->whereAllType([
                        'status' => 'integer',
                        'data.service_id' => 'integer',
                        'data.field_id' => 'integer',
                        'data.adult_id' => 'integer',
                        'data.title' => 'string',
                        'data.price' => 'integer|double',
                        'data.description' => 'string',
                        'data.blocks' => 'string',
                        'data.image' => 'string|null',
                        'data.image_description' => 'string|null',
                        'data.created_at' => 'string',
                        'data.updated_at' => 'string',
                    ])
            );
    }

    public function test_making_a_get_request_to_services_with_an_id_that_doesnt_exists_returns_a_404()
    {
        $response = $this->asUser()->getJson('/api/services/4');

        $response->assertStatus(404);
    }

    public function test_making_a_post_request_with_valid_data_creates_a_new_service()
    {
        $data = [
            'field_id' => 2,
            'adult_id' => 2,
            'title' => 'Boda moderna',
            'description' => 'Pagina moderna para matrimonios laicos.',
            'blocks' => 'saraza',
            'price' => 2199,
        ];
        $response = $this->asUser()->postJson('/api/services', $data);

        $response
            ->assertStatus(200)
            ->assertJson(fn (AssertableJson $json) =>
                $json->where('status', 0),
            );

        $response = $this->asUser()->getJson('/api/services/4');

        $response
            ->assertStatus(200)
            ->assertJson(fn (AssertableJson $json) =>
                $json
                    ->where('status', 0)
                    ->where('data.field_id', $data['field_id'])
                    ->where('data.adult_id', $data['adult_id'])
                    ->where('data.title', $data['title'])
                    ->where('data.price', $data['price'])
                    ->where('data.description', $data['description'])
                    ->where('data.blocks', $data['blocks'])
                    ->where('data.image', null)
                    ->where('data.image_description', null)
                    ->etc()
            );
    }
    public function test_making_a_post_request_with_valid_data_update_a_service()
    {
        $data = [
            'field_id' => 2,
            'adult_id' => 2,
            'title' => 'Boda de testing',
            'description' => 'Pagina de testing para matrimonios laicos.',
            'blocks' => 'saraza',
            'price' => 2199,
            'image' => null,
            'image_description' => null,
        ];
    
        $response = $this->asUser()->putJson('/api/services/3', $data);

        $response
            ->assertStatus(200)
            ->assertJson(fn (AssertableJson $json) =>
                $json->where('status', 200),
            );

        $response = $this->asUser()->getJson('/api/services/3');

        $response
            ->assertStatus(200)
            ->assertJson(fn (AssertableJson $json) =>
                $json
                    ->where('status', 0)
                    ->where('data.field_id', $data['field_id'])
                    ->where('data.adult_id', $data['adult_id'])
                    ->where('data.title', $data['title'])
                    ->where('data.price', $data['price'])
                    ->where('data.description', $data['description'])
                    ->where('data.blocks', $data['blocks'])
                    ->where('data.image', null)
                    ->where('data.image_description', null)
                    ->etc()
            );
    }

    public function test_deleting_request_by_serviceId(){
        $id = 1;
        $response = $this->asUser()->deleteJson('/api/services/' . $id);

        $response
            ->assertStatus(200);
    }
}
