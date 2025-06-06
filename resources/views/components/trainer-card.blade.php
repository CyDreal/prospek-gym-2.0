@props(['trainer'])

<div class="group h-full" data-aos="fade-up">
    <div
        class="relative bg-neutral-800 rounded-2xl p-8 ring-1 ring-gray-700/50 hover:ring-orange-500/50 transition-all duration-300 h-full flex flex-col">
        <!-- Profile Image -->
        <div class="relative w-32 h-32 mx-auto mb-6 shrink-0">
            <img src="{{ asset($trainer['image']) }}" alt="{{ $trainer['name'] }}"
                class="w-full h-full object-cover rounded-full ring-4 ring-orange-500/20">
        </div>

        <div class="flex-grow flex flex-col">
            <!-- Basic Info -->
            <div class="text-center mb-6">
                <h3 class="text-xl font-bold text-white mb-2">{{ $trainer['name'] }}</h3>
                <span
                    class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-orange-500/10 text-orange-400">
                    {{ $trainer['role'] }}
                </span>
            </div>

            <!-- Content sections -->
            <div class="flex-grow space-y-6">
                @if (isset($trainer['specializations']))
                    <div class="mb-6">
                        <h4 class="text-sm font-medium text-gray-400 mb-3">
                            {{ $trainer['specializations_title'] ?? 'Specializations' }}
                        </h4>
                        <div class="flex flex-wrap gap-2">
                            @foreach ($trainer['specializations'] as $specialization)
                                <span
                                    class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-neutral-700 text-gray-300">
                                    {{ $specialization }}
                                </span>
                            @endforeach
                        </div>
                    </div>
                @endif

                @if (isset($trainer['achievements']))
                    <div class="mb-6">
                        <h4 class="text-sm font-medium text-gray-400 mb-3">Prestasi</h4>
                        <ul class="space-y-2">
                            @foreach ($trainer['achievements'] as $achievement)
                                <li class="flex items-start gap-2 text-sm text-gray-300">
                                    <svg class="w-4 h-4 text-orange-500 mt-1 shrink-0"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="2">
                                        <path d="M20 6L9 17l-5-5" />
                                    </svg>
                                    <span>{{ $achievement }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Pricing section -->
                <div class="mt-auto">
                    <h4 class="text-sm font-medium text-gray-400 mb-3">Training Packages</h4>
                    <ul class="space-y-2">
                        @foreach ($trainer['packages'] as $package)
                            <li class="flex items-center justify-between text-sm">
                                <span class="text-gray-300">{{ $package['sessions'] }}
                                    ({{ $package['duration'] }})</span>
                                <span class="font-medium text-orange-400">{{ $package['price'] }}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <!-- Social Media Buttons -->
            <div class="flex justify-center gap-3 mt-6 pt-6 border-t border-gray-700/50">
                @if (isset($trainer['instagram']))
                    <a href="{{ $trainer['instagram'] }}" target="_blank" rel="noopener noreferrer"
                        class="inline-flex items-center px-4 py-2 rounded-lg border border-orange-500/20 bg-neutral-900/50 text-orange-400 text-sm font-medium hover:bg-orange-500 hover:text-white transition-all duration-300">
                        <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M12 2.163c3.204 0 3.584.012 4.85.07 1.17.058 1.805.249 2.227.419.562.218.96.477 1.382.896.419.42.679.819.896 1.381.17.422.36 1.057.419 2.227.058 1.266.07 1.646.07 4.85s-.012 3.584-.07 4.85c-.058 1.17-.249 1.805-.419 2.227-.218.562-.477.96-.896 1.382-.419.419-.819.679-1.381.896-.422.17-1.057.36-2.227.419-1.266.058-1.646.07-4.85.07s-3.584-.012-4.85-.07c-1.17-.058-1.805-.249-2.227-.419-.562-.218-.96-.477-1.382-.896-.419-.419-.679-.819-.896-1.381-.17-.422-.36-1.057-.419-2.227-.058-1.266-.07-1.646-.07-4.85s.012-3.584.07-4.85c.058-1.17.249-1.805.419-2.227.218-.562.477-.96.896-1.382.419-.419.819-.679 1.381-.896.422-.17 1.057-.36 2.227-.419 1.266-.058 1.646-.07 4.85-.07z" />
                            <path
                                d="M12 7.333a4.667 4.667 0 1 0 0 9.334 4.667 4.667 0 0 0 0-9.334zM12 15a3 3 0 1 1 0-6 3 3 0 0 1 0 6z" />
                            <circle cx="16.806" cy="7.194" r="1.1" />
                        </svg>
                        Instagram
                    </a>
                @endif

                @if (isset($trainer['whatsapp']))
                    <a href="{{ $trainer['whatsapp'] }}" target="_blank" rel="noopener noreferrer"
                        class="inline-flex items-center px-4 py-2 rounded-lg bg-orange-500 text-white text-sm font-medium hover:bg-orange-600 transition-all duration-300">
                        <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z" />
                        </svg>
                        WhatsApp
                    </a>
                @endif
            </div>
        </div>
    </div>
</div>
