<section id="plans" class="bg-neutral-900 pt-24">
    <div class="container mx-auto px-4">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">Membership Plans</h2>
            <p class="text-gray-400">Choose the perfect plan that fits your fitness journey</p>
        </div>

        @foreach($planCategories as $type => $category)
            <div class="mb-16">
                <h3 class="text-2xl font-bold text-white mb-8 text-center">{{ $category['title'] }}</h3>
                <div class="grid md:grid-cols-{{ $type === 'group' ? '2' : '3' }} gap-8 max-w-7xl mx-auto">
                    @foreach($category['plans'] as $planId => $plan)
                        <div class="relative group h-full">
                            <!-- Base gradient shadow untuk semua card -->
                            <div class="absolute -inset-0.5 bg-gradient-to-r from-orange-500/30 to-amber-500/30 rounded-lg blur opacity-75
                                group-hover:from-orange-500/50 group-hover:to-amber-500/50
                                {{ isset($plan['tag']) ? 'from-orange-500/50 to-amber-500/50' : '' }}
                                group-hover:opacity-100 transition duration-300">
                            </div>

                            <!-- Card content with enhanced shadow -->
                            <div class="relative bg-neutral-800 rounded-lg p-8 ring-1 ring-gray-700/50
                                shadow-lg shadow-orange-500/10
                                {{ isset($plan['tag']) ? 'shadow-orange-500/30' : '' }}
                                group-hover:shadow-orange-500/30
                                transition-all duration-300
                                flex flex-col h-full justify-between">

                                @if(isset($plan['tag']))
                                    <span class="absolute -top-1 -right-1 px-3 py-1 text-xs font-medium text-white
                                        bg-gradient-to-r from-orange-500 to-amber-500
                                        rounded-tr-lg rounded-bl-lg
                                        shadow-lg shadow-orange-500/50
                                        ring-1 ring-orange-500/50">
                                        {{ $plan['tag'] }}
                                    </span>
                                @endif

                                <div class="space-y-6">
                                    <h3 class="text-xl font-bold text-white text-center">{{ $plan['name'] }}</h3>
                                    <div class="text-center">
                                        <div class="text-3xl font-bold text-white">Rp {{ number_format($plan['price'], 0, ',', '.') }}</div>
                                        <span class="text-gray-400">{{ $plan['period'] }}</span>
                                        @if($plan['registration'] > 0)
                                            <div class="text-sm text-orange-500 mt-2">Registration: Rp {{ number_format($plan['registration'], 0, ',', '.') }}</div>
                                        @endif
                                    </div>

                                    @if(isset($plan['min_people']))
                                        <p class="text-sm text-gray-400 text-center">Must be renewed together as a group</p>
                                    @endif
                                </div>

                                <div class="mt-8">
                                    <a href="{{ route('payment.show', ['type' => $type, 'plan' => $planId]) }}"
                                       class="block w-full py-3 px-6 text-center rounded-lg border border-orange-500
                                            text-orange-400 hover:bg-orange-500 hover:text-white
                                            transition duration-300 hover:shadow-lg hover:shadow-orange-500/50">
                                        Choose Plan
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>
</section>
