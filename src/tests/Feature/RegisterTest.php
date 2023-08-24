<?php
use Illuminate\Foundation\Testing\RefreshDatabase;

use function Pest\Laravel\post;

uses(RefreshDatabase::class);

it('has errors if the details are not provided', function () {
    post('/register')
        ->assertSessionHasErrors(['name', 'email', 'password']);
});

it('register the user', function () {
    post('/register', [
            'name' => 'Eric',
            'email' => 'eric@example.com',
            'password' => 'p@ssw0rd!'
        ])
        ->assertRedirect('/');
    $this
        ->assertDatabaseHas('users', [
            'name' => 'Eric',
            'email' => 'eric@example.com'
        ])
        ->assertAuthenticated();
});
