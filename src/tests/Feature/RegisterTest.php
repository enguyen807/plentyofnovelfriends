<?php
use Illuminate\Foundation\Testing\RefreshDatabase;

use function Pest\Laravel\post;

uses(RefreshDatabase::class);

it('shows the register page')->get('/auth/register')->assertStatus(200);

it('has errors if the details are not provided')
    ->post('/register')
    ->assertSessionHasErrors(['name', 'email', 'password']);

it('registers the user')
    ->tap(function () {
        post('/register', [
            'name' => 'Eric',
            'email' => 'eric@example.com',
            'password' => 'p@ssw0rd!'
        ])
        ->assertRedirect('/');
    })
    ->assertDatabaseHas('users', [
        'email' => 'eric@example.com'
    ])
    ->assertAuthenticated();
