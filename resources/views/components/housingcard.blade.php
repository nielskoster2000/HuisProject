<div class="rounded-lg shadow-md flex flex-col">
    <img src="{{ $house['image'] }}" class="rounded-t-lg h-48 object-cover">
    <div class="px-4 py-4 flex flex-col">
        <span class="font-semibold"> {{ $house['street'] }} </span>
        <span class=" text-stone-400 mb-4"> {{ $house['city'] }} </span>
        <div class="flex justify-between">
            <div>
                <span class="font-semibold">€ {{ $house['price'] }} </span>
                <span class=" text-stone-600"> / maand</span>
            </div>
            <span class=" text-blue-700 font-semibold">Meer zien</span>
        </div>
    </div>
</div>