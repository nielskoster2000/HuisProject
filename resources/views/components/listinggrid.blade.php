<div class="grid grid-cols-1 lg:grid-cols-2 gap-10">
    @foreach ($houses as $house)
        @if ($loop->index == 3)
            <x-ctacard></x-ctacard>
        @else
        <x-housingcard :house="$house"></x-housingcard>
        @endif
    @endforeach
</div>