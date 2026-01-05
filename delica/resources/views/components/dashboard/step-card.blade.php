@props(['number', 'title', 'description', 'icon'])

<div class="flex flex-col items-center">
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
         stroke-width="1.5" stroke="currentColor"
         class="w-14 h-14 text-pink-600 mb-2">
        @if($icon === 'search')
            <path stroke-linecap="round" stroke-linejoin="round"
                  d="M21 21l-4.35-4.35M10.5 18a7.5 7.5 0 100-15 7.5 7.5 0 000 15z" />
        @elseif($icon === 'plus')
            <path stroke-linecap="round" stroke-linejoin="round"
                  d="M12 6v12m6-6H6" />
        @elseif($icon === 'shopping-bag')
            <path stroke-linecap="round" stroke-linejoin="round"
                  d="M3 3h18v4H3V3zm3 7h12v11H6V10z" />
        @elseif($icon === 'smile')
            <path stroke-linecap="round" stroke-linejoin="round"
                  d="M4.5 12a7.5 7.5 0 1115 0 7.5 7.5 0 01-15 0zm9-3l3 3-3 3m-6-3h9" />
        @endif
    </svg>

    <h4 class="font-semibold text-lg">{{ $title }}</h4>
    <p class="text-gray-600 text-sm w-40 text-center">{{ $description }}</p>
</div>
