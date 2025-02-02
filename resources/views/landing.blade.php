@extends('layouts.app')

@section('content')
<div class="container mx-auto py-8 px-4 sm:px-6 lg:px-8">
    <!-- Enhanced Header -->
    <div class="text-center mb-12 space-y-2">
        <div class="flex justify-center items-center space-x-3">
            <svg class="w-8 h-8 text-blue-600" fill="currentColor" viewBox="0 0 24 24">
                <path d="M12 0a12 12 0 00-8.485 20.485C3.515 21.5 5.75 22 12 22s8.485-.5 8.485-1.515A12 12 0 0012 0zm0 20a8 8 0 110-16 8 8 0 010 16zm1-12h-2v6h2V8zm0 8h-2v2h2v-2z"/>
            </svg>
            <h1 class="text-4xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-blue-600 to-purple-600">
                Sacred Spaces Finder
            </h1>
        </div>
        <p class="text-gray-600 text-lg">Discover mosques near you with elegance</p>
    </div>

    <!-- Advanced Search Bar -->
    <div class="mb-12 max-w-3xl mx-auto relative group">
        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
            <svg class="w-5 h-5 text-gray-400 group-focus-within:text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
            </svg>
        </div>
        <input type="text" id="searchInput" 
               class="w-full pl-12 pr-24 py-4 rounded-xl border-0 shadow-lg ring-1 ring-gray-200 focus:ring-2 focus:ring-blue-500 transition-all duration-200 bg-white/95 placeholder-gray-400"
               placeholder="Search by name, city, or features..." onkeyup="filterMosques()">
        <div class="absolute inset-y-0 right-0 flex items-center pr-4 space-x-2">
            <button class="p-2 rounded-lg hover:bg-gray-50 transition-colors">
                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"/>
                </svg>
            </button>
        </div>
    </div>

    <!-- Mosque Cards Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6" id="mosqueCards">
        @foreach ($mosques as $mosque)
        <div class="bg-white rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 group">
            <!-- Card Header -->
            <div class="relative h-48 overflow-hidden rounded-t-2xl">
                <div class="absolute inset-0 bg-gradient-to-t from-gray-900/60 to-transparent z-10"></div>
                <img src="{{ $mosque->image_url ?? 'https://www.shutterstock.com/image-photo/sharjah-mosque-largest-masjid-dubai-260nw-1515204662.jpg' }}" 
                     alt="{{ $mosque->masjidname }}" 
                     class="w-full h-full object-cover transform transition-transform duration-500 group-hover:scale-105">
                
                <!-- Top Badges -->
                <div class="absolute top-4 right-4 flex space-x-2">
                    @if($mosque->forladies)
                    <span class="flex items-center px-3 py-1 bg-white/90 backdrop-blur rounded-full text-sm text-pink-600">
                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 5.5A3.5 3.5 0 0115.5 9c0 1.255-.92 2.33-2.21 2.79L14 13h-4v1h2.5v3H11v1h2v-1h1v-3h-2.5v-1h.71c1.44-.49 2.5-1.77 2.5-3.29A4.5 4.5 0 0012 4.5a4.5 4.5 0 00-4.5 4.5H6A6 6 0 0112 3z"/>
                        </svg>
                        Ladies
                    </span>
                    @endif
                    <span class="flex items-center px-3 py-1 bg-white/90 backdrop-blur rounded-full text-sm text-blue-600">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 14v3m4-3v3m4-3v3M3 21h18M3 10h18M3 7l9-4 9 4M4 10h16v11H4V10z"/>
                        </svg>
                        Mosque
                    </span>
                </div>

                <!-- Location Info -->
                <div class="absolute bottom-4 left-4 z-20">
                    <h3 class="text-xl font-bold text-white mb-1">{{ $mosque->masjidname }}</h3>
                    <div class="flex items-center text-sm text-blue-100">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                        {{ $mosque->city }}, {{ $mosque->state }}
                    </div>
                </div>
            </div>

            <!-- Card Body -->
            <div class="p-5">
                <!-- Prayer Times Grid -->
                <div class="grid grid-cols-3 gap-3 mb-5">
                    <div class="text-center p-2 bg-blue-50 rounded-lg">
                        <div class="text-xs font-medium text-gray-700">Fajr</div>
                        <div class="text-sm font-semibold">{{ $mosque->fajr }}</div>
                    </div>
                    <div class="text-center p-2 bg-blue-50 rounded-lg">
                        <div class="text-xs font-medium text-gray-700">Zuhr</div>
                        <div class="text-sm font-semibold">{{ $mosque->zohar }}</div>
                    </div>
                    <div class="text-center p-2 bg-blue-50 rounded-lg">
                        <div class="text-xs font-medium text-gray-700">Asr</div>
                        <div class="text-sm font-semibold">{{ $mosque->asr }}</div>
                    </div>
                    <div class="text-center p-2 bg-blue-50 rounded-lg">
                        <div class="text-xs font-medium text-gray-700">Maghrib</div>
                        <div class="text-sm font-semibold">{{ $mosque->maghrib }}</div>
                    </div>
                    <div class="text-center p-2 bg-blue-50 rounded-lg">
                        <div class="text-xs font-medium text-gray-700">Isha</div>
                        <div class="text-sm font-semibold">{{ $mosque->isha }}</div>
                    </div>
                </div>
            </div>

            <!-- Card Footer -->
            <div class="px-5 py-4 border-t border-gray-100 flex justify-between items-center">
                <div class="flex items-center text-sm text-gray-500">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    Updated {{ $mosque->timestamp ? $mosque->timestamp->diffForHumans() : 'recently' }}
                </div>
                <a href="{{ $mosque->addresslink }}" target="_blank" class="flex items-center text-blue-600 hover:text-blue-800 transition-colors">
                    <span class="text-sm font-medium mr-2">Directions</span>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0zM15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                    </svg>
                </a>
            </div>
        </div>
        @endforeach
    </div>
</div>

<script>
    function filterMosques() {
        const input = document.getElementById('searchInput');
        const filter = input.value.toLowerCase();
        const cards = document.querySelectorAll('#mosqueCards > div');

        cards.forEach(card => {
            const name = card.querySelector('h3').textContent.toLowerCase();
            const location = card.querySelector('.absolute.bottom-4').textContent.toLowerCase();
            
            if (name.includes(filter) || location.includes(filter)) {
                card.style.display = 'block';
            } else {
                card.style.display = 'none';
            }
        });
    }
</script>
@endsection
