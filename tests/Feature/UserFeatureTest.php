<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Statistics;

class UserFeatureTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_registers_a_user()
    {
        $userData = [
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'password' => 'password123',
        ];

        $response = $this->post('/api/register', $userData);

        $response->assertStatus(201)
            ->assertJson([
                'message' => 'User Created Successfully',
            ]);
    }

    /** @test */
    public function it_logs_in_a_user()
    {
        $user = User::factory()->create([
            'email' => 'test@example.com',
            'password' => bcrypt('password123'),
        ]);

        $loginData = [
            'email' => 'test@example.com',
            'password' => 'password123',
        ];

        $response = $this->post('/api/login', $loginData);

        $response->assertStatus(200)
            ->assertJson([
                'message' => 'Logged in Successfully',
            ]);
    }

    /** @test */
    public function it_logs_out_a_user()
    {
        $user = User::factory()->create();
        $token = $user->createToken('testToken')->plainTextToken;

        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->post('/api/logout');

        $response->assertStatus(200)
            ->assertJson([
                'message' => 'Logged out',
            ]);
    }

    /** @test */
    public function it_updates_a_user_profile()
    {
        $user = User::factory()->create();

        $updateData = [
            'name' => 'Updated Name',
            'email' => 'updated@example.com',
        ];

        $token = $user->createToken('testToken')->plainTextToken;

        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->post('/api/update', $updateData);

        $response->assertStatus(200)
            ->assertJson([
                'message' => 'User profile updated successfully',
            ]);

        $this->assertDatabaseHas('users', [
            'name' => 'Updated Name',
            'email' => 'updated@example.com',
        ]);
    }

    /** @test */
    public function it_shows_a_user()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->get('/api/user/'.$user->id);

        $response->assertStatus(200)
            ->assertJson([
                'user' => $user->toArray(),
            ]);
    }

    /** @test */
    public function it_gets_user_statistics()
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        $statistics = Statistics::factory()->create([
            'user_id' => $user->id,
        ]);

        $response = $this->get('/api/stats/'.$user->id);

        $response->assertStatus(200)
            ->assertJson([
                'statistics' => [$statistics->toArray()],
            ]);
    }
}
