<?php

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

use function Pest\Laravel\get;

uses(RefreshDatabase::class);

it('greets the user if they are signed out', function () {
    get('/')
        ->assertSee('Header')
        ->assertSee('Sign up to get started.');
});

it('shows nav items for authenticated user', function () {
    $user = User::factory()->create();
    actingAs($user)
        ->get('/')
        ->assertSeeText(['Feed', 'My Books', 'Add a book', 'Friends', $user->name]);
});

it('shows guest nav items for unauthenticated user', function () {
    get('/')
        ->assertSeeText(['Plenty of Novel Friends', 'Login', 'Register']);
});
