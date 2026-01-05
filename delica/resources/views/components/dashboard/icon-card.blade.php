@props(['title', 'icon', 'description'])

<div class="flex items-start gap-4">
    <!-- ICON -->
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
         stroke-width="1.5" stroke="currentColor"
         class="w-10 h-10 text-pink-600 flex-shrink-0">
        @if($icon === 'check-circle')
            <path stroke-linecap="round" stroke-linejoin="round"
                  d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
        @elseif($icon === 'truck')
            <path stroke-linecap="round" stroke-linejoin="round"
                  d="M3 16.5V5.25A2.25 2.25 0 015.25 3h9A2.25 2.25 0 0116.5 5.25v11.25M3 16.5h13.5M3 16.5a2.25 2.25 0 104.5 0M16.5 16.5h3.128M19.628 16.5a2.25 2.25 0 104.5 0M16.5 10.5h4.5l1.5 3" />
        @elseif($icon === 'globe')
            <path stroke-linecap="round" stroke-linejoin="round"
                  d="M12 3a9 9 0 110 18 9 9 0 010-18zm0 0c1.5 2.25 2.25 4.5 2.25 6.75S13.5 14.25 12 16.5m-7.125-4.5h14.25" />
        @endif
    </svg>

    <div>
        <h4 class="font-semibold text-lg text-gray-800">{{ $title }}</h4>
        <p class="text-gray-600 text-sm">{{ $description }}</p>
    </div>
</div>
