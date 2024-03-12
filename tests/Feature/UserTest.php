<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Mockery;
class UserTest extends TestCase
{
    private array $rules = [
        'name' => 'required|string|max:255|regex:/^[A-Za-z0-9\s]+$/',
        'email' => 'required|string|email|max:255',
        'password' => 'required|string|min:8|regex:/^(?=.*[A-Z])(?=.*\d).+$/',
    ];

    public function test_AddUser_CorrectUser_ReturnsSuccessTrue() : void
    {
        $userAuthRepository = Mockery::mock(IUserAuthRepository::class);

        /** @var \Mockery\Mock|IUserAuthRepository $userAuthRepository */
        $userAuthRepository->shouldReceive('AddUser')->andReturn(['name' => 'John', 'email' => 'john@example.com']);

        $userAuthService = new UserAuthService($userAuthRepository);

        $userData = [
            'name' => 'John',
            'email' => 'john@example.com',
            'password' => 'Password1',
        ];

        $request = Request::create('/dummy', 'POST', $userData);

        $result = $userAuthService->AddUser($request, $this->rules);
        $this->assertTrue($result['success']);
    }
}
