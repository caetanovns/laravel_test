<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_the_application_returns_a_successful_response(): void
    {
        $response = $this->get('/users');

        $response->assertStatus(200);
    }

    public function test_create_user_with_success(): void
    {
        $response = $this->post('/users', [
            'name' => "João",
            'email' => "joao@gmail.com",
            'password' => "123123",
            'password_confirmation' => "123123",
        ]);

        $response->assertSessionHas('success');
    }

    public function test_create_user_error_no_data(): void
    {
        $response = $this->post('/users', [
        ]);
        $response->assertInvalid();
    }

    public function test_create_user_error_invalid_input(): void
    {
        $response = $this->post('/users', [
            'name' => "João",
            'password' => "123123",
            'password_confirmation' => "123123",
        ]);

        $response->assertInvalid();
    }

    public function test_create_user_error_invalid_input_no_password_matches(): void
    {
        $response = $this->post('/users', [
            'name' => "João",
            'email' => "joao@gmail.com",
            'password' => "123123",
            'password_confirmation' => "9999999",
        ]);
        $response->assertInvalid();
    }

    public function test_create_user_with_api(): void
    {
        $response = $this->post('/api/users', [
            'name' => "João",
            'email' => "joao@gmail.com",
            'password' => "123123",
            'password_confirmation' => "123123",
        ]);

        $response->assertStatus(201);
    }

    public function test_create_user_with_api_no_data(): void
    {
        $response = $this->post('/api/users', [
        ]);

        $response->assertStatus(422);
    }

    public function test_create_user_with_api_invalid_password(): void
    {
        $response = $this->post('/api/users', [
            'name' => "João",
            'email' => "joao@gmail.com",
            'password' => "1111111",
            'password_confirmation' => "222222",
        ]);

        $response->assertStatus(422)->assertJsonPath('errors.password.0', 'Senha precisa ser confirmada.');
    }

    public function test_create_user_with_api_invalid_name(): void
    {
        $response = $this->post('/api/users', [
            'name' => "AA",
            'email' => "joao@gmail.com",
            'password' => "123123",
            'password_confirmation' => "123123",
        ]);

        $response->assertStatus(422)->assertJsonPath('errors.name.0', 'Nome Completo precisa ter pelo menos tamanho 3.');
    }

    public function test_create_user_with_api_invalid_email(): void
    {
        $response = $this->post('/api/users', [
            'name' => "João",
            'email' => "joaogmail.com",
            'password' => "123123",
            'password_confirmation' => "123123",
        ]);

        $response->assertStatus(422)->assertJsonPath('errors.email.0', 'Email precisa ser válido.');
    }
}
