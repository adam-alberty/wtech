<button id="start-search-button" class="relative flex items-center cursor-pointer">
    <div
        class="hidden md:flex items-center bg-gray-100 hover:bg-input focus:bg-input outline-none w-52 p-2 pl-11 h-10 rounded-full text-sm text-muted-foreground">
        Search for a product</div>
    <x-phosphor-magnifying-glass class="w-5 h-5 static md:absolute left-3" />
</button>


<div id="search" class="hidden fixed bg-black/50 inset-0">
    <div class="h-1/2 bg-background">
        <div class="px-8 max-w-screen-lg mx-auto py-5">
            <div class="flex gap-5">
                <input placeholder="Search" type="text" class="p-3 bg-input w-full rounded-full">
                <button id="cancel-search-button" class="cursor-pointer">Cancel</button>
            </div>
            <div class="mt-10">
                <div>Products</div>
                <div>Categories</div>
            </div>
        </div>
    </div>
</div>

<script>
    let startSearchButton = document.getElementById("start-search-button");
    let cancelSearchButton = document.getElementById("cancel-search-button");
    let search = document.getElementById("search");

    startSearchButton.addEventListener('click', (e) => {
        search.classList.remove('hidden')
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
