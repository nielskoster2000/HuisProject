<div class="flex justify-center mt-10">

    <x-paginationbutton>Vorige</x-paginationbutton>

    @foreach (range(1, $count) as $page)
        <x-paginationbutton>{{ $page }}</x-paginationbutton>
    @endforeach

    <x-paginationbutton>...</x-paginationbutton>
    <x-paginationbutton>Volgende</x-paginationbutton>
</div>

<!-- Foreach buttons voor alle paginas -->
<!-- Is het teveel dan maak je ... visible en de rest invisible -->
 <!-- Previous en Next knoppen nodig -->