<?php

namespace Tests\Unit;

use Tests\TestCase;

class BlogTest extends TestCase
{
    /**
     * Тест проверки статуса 200 у корневого роута
     *
     * @return void
     */
    public function test_ok_home_page()
    {
        $response = $this->get('/');
        $response->assertOk();
    }

    /**
     * Тест проверки авторизации админа
     *
     * @return void
     */
    public function test_authorize_admin()
    {
        $this->post('/login', [
            'email' => 'admin@test.com',
            'password' => '12345678'
        ]);
        $response = $this->get('/home');
        $response->assertOk();
    }

    /**
     * Тест проверки провала авторизации админа
     *
     * @return void
     */
    public function test_failed_pass_admin()
    {
        $this->post('/login', [
            'email' => 'admin@test.com',
            'password' => 'wrong_pass'
        ]);
        $response = $this->get('/home');
        $response->assertRedirect('/login');
    }
}
