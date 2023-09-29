<?php

use App\Models\Book;
use App\Models\Pivot\BookUser;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

$statuses = array();
foreach( BookUser::$statuses as $key => $value ){
    $statuses[] = array('status' => $key, 'heading' => $value);
}

beforeEach(function () {
    $this->user = User::factory()->create();
});


it('shows books grouped under the correct status', function ($status, $heading) {
    $this->user->books()->attach($book = Book::factory()->create(), [
        'status' => $status
    ]);

    actingAs($this->user)
        ->get('/')
        ->assertSeeInOrder([$heading, $book->title]);
})
    ->with($statuses);