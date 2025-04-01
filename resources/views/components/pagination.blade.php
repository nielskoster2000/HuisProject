<div id="pagination" class="flex justify-center mt-10 flex-wrap">

    <button id="previousButton" class="transition rounded-md px-4 py-2">&#8249; Vorige</button>

    @foreach (range($i = 0, max(0, $pageCount - 1)) as $page)
        <button class="paginationButton outline-none transition rounded-md px-4 py-2">
            {{ $page + 1 }}
        </button>
    @endforeach
        
    <button id="nextButton" class="transition rounded-md px-4 py-2">Volgende &#8250;</button>
</div>

<style>
    #pagination button {
        color: var(--color-stone-800);
        background-color: var(--color-white);
    }
    #pagination button:hover, #pagination button.active {
        color: var(--color-white);
        background-color: var(--color-blue-700);
    }
</style>