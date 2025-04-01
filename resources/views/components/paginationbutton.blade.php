<div>
    <button class="{{ $active ? 'bg-blue-700 text-white' : 'bg-white text-stone-600' }} hover:bg-blue-700 hover:text-white transition rounded-md px-4 py-2">
        {{ $slot }}
    </button>
</div>