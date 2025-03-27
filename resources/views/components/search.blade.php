<button id="start-search-button" class="relative flex items-center cursor-pointer">
    <span
        class="hidden md:flex items-center bg-gray-100 hover:bg-input focus:bg-input outline-none w-52 p-2 pl-11 h-10 rounded-full text-sm text-muted-foreground">
        Search for a product</span>
    <x-phosphor-magnifying-glass class="w-5 h-5 static md:absolute left-3" />
</button>


<div id="search" class="hidden fixed bg-black/50 inset-0">
    <div class="h-1/2 bg-background">
        <div class="px-8 max-w-screen-lg mx-auto py-5">
            <div class="flex gap-5 w-full">
                <div class="relative w-full flex items-center">
                    <x-phosphor-magnifying-glass class="absolute left-3 h-5 w-5" />
                    <input id="search-input" placeholder="Search" type="text"
                        class="p-3 pl-10 bg-input outline-none w-full rounded-full">
                </div>
                <button id="cancel-search-button" class="cursor-pointer">Cancel</button>
            </div>
            <div class="mt-10">
                <div class="font-semibold mb-2">Popular Categories</div>
                <ul class="flex flex-wrap gap-3">
                    <li>
                        <a href="{{ route('category', 'men') }}"
                            class="px-4 py-2 rounded-full bg-muted inline-block">Nike Air Jordan</a>
                    </li>
                    <li>
                        <a href="{{ route('category', 'men') }}"
                            class="px-4 py-2 rounded-full bg-muted inline-block">Vans Old School</a>
                    </li>
                    <li>
                        <a href="{{ route('category', 'men') }}"
                            class="px-4 py-2 rounded-full bg-muted inline-block">Walking shoes</a>
                    </li>
                    <li>
                        <a href="{{ route('category', 'men') }}"
                            class="px-4 py-2 rounded-full bg-muted inline-block">Football shoes</a>
                    </li>
                    <li>
                        <a href="{{ route('category', 'men') }}"
                            class="px-4 py-2 rounded-full bg-muted inline-block">Tennis shoes</a>
                    </li>
                    <li>
                        <a href="{{ route('category', 'men') }}"
                            class="px-4 py-2 rounded-full bg-muted inline-block">Football shoes</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

<script>
    let startSearchButton = document.getElementById("start-search-button");
    let cancelSearchButton = document.getElementById("cancel-search-button");
    let search = document.getElementById("search");
    let searchInput = document.getElementById("search-input");


    startSearchButton.addEventListener('click', (e) => {
        search.classList.remove('hidden')
        searchInput.focus()
    })

    cancelSearchButton.addEventListener('click', (e) => {
        search.classList.add('hidden')
    })

    document.addEventListener('keydown', (e) => {
        if (e.key === "Escape") {
            search.classList.add('hidden')
        }
    })
</script>
