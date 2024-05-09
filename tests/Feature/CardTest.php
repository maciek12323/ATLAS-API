<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\CardHero;
use App\Models\CardAttack;
use App\Models\CardDefend;

class CardTest extends TestCase
{
    use RefreshDatabase;

    public function test_store_hero_card()
    {
        $response = $this->postJson('/api/storeH', [
            'name' => 'Test Hero',
            'heroImage' => 'hero.jpg',
            'talentDescription' => 'Test talent description',
            'talentCooldown' => 3,
            'talentType' => 'passive',
            'talentValue' => 10,
        ]);

        $response->assertStatus(200)
            ->assertJson([
                'message' => 'Card Added Successfully',
                'status' => 200,
            ]);

        $this->assertDatabaseHas('cardshero', [
            'name' => 'Test Hero',
        ]);
    }

    public function test_show_hero_card()
    {
        $hero = CardHero::factory()->create();

        $response = $this->getJson("/api/showH/{$hero->id}");

        $response->assertStatus(200)
            ->assertJson([
                'message' => 'Card details retrieved successfully',
                'status' => 200,
                'cardHero' => $hero->toArray(),
            ]);
    }

    public function test_delete_hero_card()
    {
        $hero = CardHero::factory()->create();

        $response = $this->deleteJson("/api/deleteH/{$hero->id}");

        $response->assertStatus(200)
            ->assertJson([
                'message' => 'Card deleted successfully',
                'status' => 200,
            ]);

        $this->assertDatabaseMissing('cardshero', ['id' => $hero->id]);
    }

    public function test_store_attack_card()
    {
        $response = $this->postJson('/api/storeA', [
            'element' => 'Fire',
            'energyCost' => 3,
            'cardName' => 'Test Attack Card',
            'cardImage' => 'attack.jpg',
            'cardBasicDescription' => 'Basic description',
            'cardGoldDescription' => 'Gold description',
            'type' => 'Spell',
            'AttackLeft' => 10,
            'AttackFront' => 20,
            'AttackRight' => 15,
        ]);

        $response->assertStatus(200)
            ->assertJson([
                'message' => 'Card Added Successfully',
                'status' => 200,
            ]);

        $this->assertDatabaseHas('cardsattack', [
            'cardName' => 'Test Attack Card',
        ]);
    }

    public function test_show_attack_card()
    {
        $attack = CardAttack::factory()->create();

        $response = $this->getJson("/api/showA/{$attack->id}");

        $response->assertStatus(200)
            ->assertJson([
                'message' => 'Card details retrieved successfully',
                'status' => 200,
                'cardAttack' => $attack->toArray(),
            ]);
    }

    public function test_delete_attack_card()
    {
        $attack = CardAttack::factory()->create();

        $response = $this->deleteJson("/api/deleteA/{$attack->id}");

        $response->assertStatus(200)
            ->assertJson([
                'message' => 'Card deleted successfully',
                'status' => 200,
            ]);

        $this->assertDatabaseMissing('cardsattack', ['id' => $attack->id]);
    }

    public function test_store_defend_card()
    {
        $response = $this->postJson('/api/storeD', [
            'element' => 'Water',
            'energyCost' => 2,
            'cardName' => 'Test Defend Card',
            'cardImage' => 'defend.jpg',
            'cardBasicDescription' => 'Basic description',
            'cardGoldDescription' => 'Gold description',
            'type' => 'Shield',
            'defLeft' => 5,
            'defFront' => 10,
            'defRight' => 8,
            'heal' => 15,
        ]);

        $response->assertStatus(200)
            ->assertJson([
                'message' => 'Card Added Successfully',
                'status' => 200,
            ]);

        $this->assertDatabaseHas('cardsdefend', [
            'cardName' => 'Test Defend Card',
        ]);
    }

    public function test_show_defend_card()
    {
        $defend = CardDefend::factory()->create();

        $response = $this->getJson("/api/showD/{$defend->id}");

        $response->assertStatus(200)
            ->assertJson([
                'message' => 'Card details retrieved successfully',
                'status' => 200,
                'cardDefend' => $defend->toArray(),
            ]);
    }

    public function test_delete_defend_card()
    {
        $defend = CardDefend::factory()->create();

        $response = $this->deleteJson("/api/deleteD/{$defend->id}");

        $response->assertStatus(200)
            ->assertJson([
                'message' => 'Card deleted successfully',
                'status' => 200,
            ]);

        $this->assertDatabaseMissing('cardsdefend', ['id' => $defend->id]);
    }
}
