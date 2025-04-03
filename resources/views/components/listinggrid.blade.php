@if (count($houses) === 0)
    <p class="text-center">Geen resultaten</p>
@else
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-10">
        @foreach ($houses as $house)
            <x-housingcard :house="$house"></x-housingcard>
            @if ($loop->index == min(2, count($houses) - 1))
                <x-ctacard></x-ctacard>
            @endif
        @endforeach
    </div>
@endif