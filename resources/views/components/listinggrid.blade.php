<div class="grid grid-cols-1 lg:grid-cols-2 2xl:grid-cols-3 gap-10">
    @foreach ($houses as $house)
        <x-housingcard :house="$house"></x-housingcard>
    @endforeach
</div>