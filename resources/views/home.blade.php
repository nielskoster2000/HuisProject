<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>HuisApplicatie</title>
    <link href="https://fonts.googleapis.com/css2?family=Urbanist:wght@300;400;600;700&display=swap" rel="stylesheet">
    @vite('resources/css/app.css')
</head>

<body class="py-8 px-14 lg:py-14 lg:px-28 font-Urbanist">
    <div class="flex flex-col lg:flex-row justify-between mb-10 border-b-1 pb-5 border-stone-200 gap-6">
        <span class="text-4xl font-semibold shrink-0">{{ $title ?? 'Huurwoningen in Amsterdam' }}</span>
        <div class="flex flex-col lg:text-right">
            <span class="font-semibold">{{ $houseCount }} resultaten</span>
            <span class="text-blue-700 underline">Ontgrendel 944 woningen in Amsterdam met een Gratis Account</span>
        </div>
    </div>

    <div class="flex gap-10 lg:gap-18 lg:flex-row flex-col">
        <div class="flex flex-col gap-8 lg:border-r-1 pb-10 border-b-1 border-stone-200 lg:pr-5 lg:w-xs w-full">
            <div class="flex flex-col gap-2">
                <span class="font-semibold text-2xl">Filters</span>
                <span class=" text-stone-600"> Wij zoeken woningen op meer dan 300 huursites en bundelen alle gevonden woningen in een overzichtelijk aanbod.</span>
            </div>
                <x-search></x-search>
                <x-pricecompare></x-pricecompare>
        </div>
        <div class="flex-auto">
            <div id="listingGrid"></div>
            <!-- <x-pagination :count="10"></x-pagination> -->
        </div>
    </div>
</body>

</html>

<script>
    const listingGrid = document.getElementById('listingGrid');
    const search = document.getElementById('search');
    const pmin = document.getElementById('pmin');
    const pmax = document.getElementById('pmax');

    async function loadHouses() {
        let params = new URLSearchParams({
            search: search.value,
            pmin: pmin.value,
            pmax: pmax.value
        });
        const response = await fetch('/houses?' + params.toString());
        listingGrid.innerHTML = await response.text();
    }

    loadHouses();

    search.addEventListener('input', () => loadHouses());
    pmin.addEventListener('input', () => loadHouses());
    pmax.addEventListener('input', () => loadHouses());
</script>