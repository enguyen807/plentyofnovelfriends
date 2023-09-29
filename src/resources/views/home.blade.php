<x-layouts.app>
    @guest
    <x-slot name="header">
        Header
    </x-slot>
    <p>Sign up to get started.</p>
    @endguest

    @auth
    <x-slot name="header">
        My Books
        <hr class="h-0.5 mx-auto my-2 bg-gray-100 border-0 rounded dark:bg-gray-400">
    </x-slot>
        @foreach ($booksByStatus as $status => $books)
            <h1 class="font-bold text-xl text-slate-300 mt-5 mb-2">
                    {{ App\Models\Pivot\BookUser::$statuses[$status] }}
            </h1>
            <div class="grid grid-cols-2 gap-4">
                @foreach ($books as $book)
                    <x-book :book="$book">
                        <x-slot name="links">
                            Links
                        </x-slot>
                    </x-book>
                @endforeach
            </div>
        @endforeach
    @endauth
</x-layouts.app>