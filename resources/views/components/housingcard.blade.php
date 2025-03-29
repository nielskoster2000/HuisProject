<div class=" rounded-lg shadow-md">
    <img src="{{ $house['images'][0]['url'] }}" alt="House Image" class="rounded-t-lg">
    <div class="px-8 py-5 flex flex-col">
        <span class="font-semibold"> {{ $house['street'] }} </span>
        <span class=" text-stone-400 mb-4"> {{ $house['city'] }} </span>
        <div class="flex justify-between">
            <div>
                <span class="font-semibold">€ {{ $house['price'] }} </span>
                <span class=" text-stone-600"> / maand</span>
            </div>
            <a href="{{ $house['housing_url'] }}" target="_blank" class=" text-blue-700 font-semibold">Meer zien</a>
        </div>
    </div>
</div>