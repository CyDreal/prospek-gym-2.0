<nav x-data="{
        open: false,
        atTop: true,
        scrollingUp: false,
        lastScroll: 0,
        handleScroll() {
            const currentScroll = window.pageYOffset;
            this.atTop = currentScroll <= 0;
            this.scrollingUp = currentScroll < this.lastScroll;
            this.lastScroll = currentScroll;
        }
    }"
    @scroll.window="handleScroll"
    class="fixed w-full top-0 z-50 transition-all duration-300"
    :class="{
        'bg-transparent': atTop,
        'bg-neutral-900/95 backdrop-blur-sm shadow-md': !atTop,
        '-translate-y-full': !scrollingUp && !atTop,
        'translate-y-0': scrollingUp || atTop
    }">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <!-- Logo -->
            <div class="flex items-center">
                <a href="/" class="text-xl font-bold text-white">Prospek Gym</a>
            </div>

            <!-- Desktop Menu -->
            <div class="hidden sm:flex space-x-6 items-center">
                <a href="{{ route('about') }}"
                   class="text-white hover:text-orange-400 transition-colors duration-200"
                   :class="{ 'text-white': atTop, 'text-orange-500': !atTop }">
                    Tentang Kami
                </a>
                <a href="{{ route('membership') }}"
                   class="text-white hover:text-orange-400 transition-colors duration-200"
                   :class="{ 'text-white': atTop, 'text-orange-500': !atTop }">
                    Membership
                </a>
                <a href="{{ route('trainer') }}"
                   class="text-white hover:text-orange-400 transition-colors duration-200"
                   :class="{ 'text-white': atTop, 'text-orange-500': !atTop }">
                    Trainer
                </a>

                <a href="/login"
                    class="ml-4 px-4 py-2 bg-orange-500 text-white rounded-md hover:bg-orange-400 transition duration-200">
                    Login
                </a>
            </div>

            <!-- Mobile Button -->
            <div class="flex items-center sm:hidden">
                <button @click="open = !open" type="button"
                    class="text-white hover:text-orange-400 focus:outline-none"
                    :class="{ 'text-white': atTop, 'text-orange-500': !atTop }">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path x-show="!open" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path x-show="open" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div x-show="open"
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0 -translate-y-1"
         x-transition:enter-end="opacity-100 translate-y-0"
         x-transition:leave="transition ease-in duration-150"
         x-transition:leave-start="opacity-100 translate-y-0"
         x-transition:leave-end="opacity-0 -translate-y-1"
         class="sm:hidden px-4 pt-2 pb-4 bg-neutral-900/95 backdrop-blur-sm">
        <a href="{{ route('about') }}" class="block py-2 text-white hover:text-orange-400">Tentang Kami</a>
        <a href="{{ route('membership') }}" class="block py-2 text-white hover:text-orange-400">Membership</a>
        <a href="{{ route('trainer') }}" class="block py-2 text-white hover:text-orange-400">Trainer</a>
        {{-- <a href="/login"
            class="block w-full text-center mt-2 px-4 py-2 bg-orange-500 text-white rounded-md hover:bg-orange-400 transition duration-200">
            Login
        </a> --}}
    </div>
</nav>
