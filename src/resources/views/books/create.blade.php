<x-layouts.app>
    @auth
    <x-slot name="header">
        Add a Book
    </x-slot>
    <form action="/books" method="POST">
        @csrf
        <div class="grid grid-cols-1 gap-x-8 gap-y-6 sm:grid-cols-2">
            <div class="sm:col-span-2">
                <label for="title" class="block text-sm font-semibold leading-6 text-gray-900 dark:text-white">Title</label>
                <div class="mt-2.5">
                    <input type="text" name="title" id="title" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-emerald-600 sm:text-sm sm:leading-6">
                    @error('title')
                    <div class="text-red-500 text-sm">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
            <div class="sm:col-span-2">
                <label for="author" class="block text-sm font-semibold leading-6 text-gray-900 dark:text-white">Author</label>
                <div class="mt-2.5">
                    <input type="text" name="author" id="author" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-emerald-600 sm:text-sm sm:leading-6">
                    @error('author')
                    <div class="text-red-500 text-sm">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>

            <div class="sm:col-span-2">
                <label for="status" class="block text-sm font-semibold leading-6 text-gray-900 dark:text-white">Status</label>
                <div class="mt-2.5">
                    <select name="status" id="status" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-emerald-600 sm:text-sm sm:leading-6">
                        @foreach(\App\Models\Pivot\BookUser::$statuses as $key => $status)
                            <option value="{{ $key }}">{{ $status }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="sm:col-span-2">
                <label for="description" class="block text-sm font-semibold leading-6 text-gray-900 dark:text-white">Description</label>
                <div class="mt-2.5">
                    <textarea name="description" id="description" rows="4" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-emerald-600 sm:text-sm sm:leading-6"></textarea>
                </div>
            </div>
        </div>
        <div class="mt-10">
            <button type="submit" class="block w-full rounded-md bg-emerald-600 px-3.5 py-2.5 text-center text-sm font-semibold text-white shadow-sm hover:bg-emerald-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-emerald-600">Add Book</button>
        </div>
    </form>
    @endauth
</x-layouts.app>