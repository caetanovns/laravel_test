<?php

namespace Tests\Unit;

use App\Services\UserService;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Validation\ValidationException;
use Tests\TestCase;

class UserServiceTest extends TestCase
{

    use DatabaseMigrations;

    /**
     * A basic unit test example.
     * @throws ValidationException
     */
    public function test_use_service_to_create_user(): void
    {
        $userService = new UserService();

        $user = $userService->store([
            'name' => "João",
            'email' => "joao@gmail.com",
            'password' => "123123",
            'password_confirmation' => "123123",
        ]);

        $this->assertNotNull($user);
    }
}
