<?php
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

beforeEach(function () {
    $this->user = User::factory()->create();
});

it('only allows logged in users to post')
    ->post('/books')
    ->assertStatus(302);

it('creates a book', function () {
    actingAs($this->user)
        ->post('/books', [
            'title' => 'The Outsider',
            'author' => 'Stephen King',
            'status' => 'WANT_TO_READ'
        ]);
    
    $this
        ->assertDatabaseHas('books', [
            'title' => 'The Outsider',
            'author' => 'Stephen King'
        ])
        ->assertDatabaseHas('book_user', [
            'user_id' => $this->user->id,
            'status' => 'WANT_TO_READ'
        ]);
});

it('requires a book title, author and status')
    ->tap(fn () => $this->actingAs($this->user))
    ->post('/books')
    ->assertSessionHasErrors(['title', 'author', 'status']);