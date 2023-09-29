@props(['book'])

<div>
    <div class="rounded-md border-0 bg-gray-600 h-44 px-3.5 py-2 shadow-gray-900 shadow-md">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-xl text-gray-200 font-bold tracking-wide">{{ $book->title }}</p>
                <p class="text-sm text-gray-400">{{ $book->author }}</p>
            </div>
            @isset($links)
                <div>
                    <p class="text-sm rounded px-2 bg-emerald-500">{{ $links }}</p>
                </div>
            @endisset
        </div>


        <hr class="h-0.5 mx-auto my-2 bg-orange-100 border-0 rounded dark:bg-orange-400">
        <p class="line-clamp-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla imperdiet mi ante, sed tincidunt odio condimentum eget. Sed vitae nisi justo. Etiam mattis, augue in ornare vestibulum, ipsum massa sodales sem, ac porta dui est at neque. Ut ornare erat mauris, id sagittis augue lacinia ac. Nam maximus tempor purus at facilisis. Nam dapibus et lectus quis mollis. Ut ultrices dolor non tincidunt dignissim. Aliquam et mi rhoncus, gravida massa id, egestas enim. Donec tempus dignissim felis ut pretium.</p>
    </div>
</div>