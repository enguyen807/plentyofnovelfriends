<?php
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

use function Pest\Laravel\get;
use function Pest\Laravel\post;


uses(RefreshDatabase::class);

it('redirects an authenticated user', function () {
    expect(User::factory()->create())->toBeRedirectedFor('/auth/login');
});

it('shows the login page')->get('/auth/login')->assertOk();

it('shows an error for invalid form')
    ->post('/login')
    ->assertSessionHasErrors(['email', 'password']);

it('logs the user in', function () {
    $user = User::factory()->create([
        'email' => 'eric@example.com',
        'password' => bcrypt('p@ssw0rd!')
    ]);

    post('/login', [
        'email' => $user->email,
        'password' => 'p@ssw0rd!'
    ])
    ->assertRedirect('/');

    $this->assertAuthenticated();

});