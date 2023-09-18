<?php

use App\Models\Pivot\BookUser;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

beforeEach(function () {
    $this->user = User::factory()->create();
});

it('only allows logged in users')
    ->get('/books/create')
    ->assertStatus(302);

it('shows the available statuses on the form', function () {
    $this->actingAs($this->user)
        ->get('/books/create')
        ->assertSeeTextInOrder(BookUser::$statuses);
});