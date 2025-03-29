<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>HuisApplicatie</title>
    <link href="https://fonts.googleapis.com/css2?family=Urbanist:wght@300;400;600;700&display=swap" rel="stylesheet">
    @vite('resources/css/app.css')
</head>

<body class="py-14 px-28">
    <div class="flex justify-between mb-10 border-b-1 pb-5 border-stone-200">
        <span class="text-4xl font-semibold">{{ $title ?? 'Huurwoningen in Amsterdam' }}</span>
        <div class="flex flex-col text-right">
            <span class="font-semibold">{{ $houseCount ?? '0 Resultaten' }}</span>
            <span class="text-blue-700 underline">Ontgrendel 944 woningen in Amsterdam met een Gratis Account</span>
        </div>
    </div>

    <div class="flex gap-12">
        <div class="w-80 flex flex-col gap-8 border-r-1 border-stone-200 pr-5">
            <div class="flex flex-col">
                <span class="font-semibold text-2xl">Filters</span>
                <span class=" text-stone-600"> Wij zoeken woningen op meer dan 300 huursites en bundelen alle gevonden woningen in een overzichtelijk aanbod.</span>
            </div>
            <x-search></x-search>
            <x-pricecompare></x-pricecompare>
        </div>
        <div class="">
            <x-listinggrid :houses="$houses"></x-listinggrid>
            <x-pagination :count="10"></x-pagination>
        </div>
    </div>
</body>

</html>