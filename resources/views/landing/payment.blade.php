@extends('layouts.appLanding')

@section('title', 'Payment Details')

@section('content')
<div class="py-32">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Card Container -->
        <div class="relative">
            <!-- Gradient Background Effect -->
            <div class="absolute -inset-0.5 bg-gradient-to-r from-orange-500/30 to-amber-500/30 rounded-lg blur opacity-75">
            </div>

            <!-- Main Content -->
            <div class="relative bg-neutral-800 rounded-lg p-8 ring-1 ring-gray-700/50 shadow-lg">
                <h2 class="text-3xl font-bold text-white mb-8">Payment Details</h2>

                <!-- Selected Plan Details -->
                <div class="mb-8 space-y-6">
                    <div class="bg-neutral-700/30 rounded-lg p-6">
                        <h3 class="text-xl font-semibold text-white mb-4">Selected Plan: {{ $plan['name'] }}</h3>
                        <div class="space-y-3 text-gray-300">
                            <div class="flex justify-between items-center">
                                <span>Price</span>
                                <span class="text-white">Rp {{ number_format($plan['price'], 0, ',', '.') }}</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span>Registration Fee</span>
                                <span class="text-white">Rp {{ number_format($plan['registration'], 0, ',', '.') }}</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span>Duration</span>
                                <span class="text-white">{{ $plan['duration'] }}</span>
                            </div>
                            <div class="h-px bg-gray-700 my-3"></div>
                            <div class="flex justify-between items-center text-lg font-bold">
                                <span class="text-white">Total</span>
                                <span class="text-orange-400">Rp {{ number_format($plan['price'] + $plan['registration'], 0, ',', '.') }}</span>
                            </div>
                        </div>
                    </div>

                    <!-- Payment Instructions -->
                    <div class="bg-neutral-700/30 rounded-lg p-6">
                        <h3 class="text-xl font-semibold text-white mb-4">Payment Instructions</h3>

                        <!-- Warning Message -->
                        <div class="mb-6 bg-orange-500/10 border border-orange-500/20 rounded-lg p-4">
                            <div class="flex items-start">
                                <svg class="w-5 h-5 text-orange-400 mt-0.5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                                </svg>
                                <p class="text-orange-400 text-sm">Please transfer the exact amount as shown in the total payment to ensure quick verification.</p>
                            </div>
                        </div>

                        <!-- Copyable Amount -->
                        <div class="mb-6 bg-neutral-700/50 rounded-lg p-4">
                            <label class="block text-sm text-gray-400 mb-2">Total Payment Amount:</label>
                            <div class="flex items-center space-x-3">
                                <div id="totalAmount" class="bg-neutral-800 px-4 py-2 rounded flex-1 text-white font-mono">
                                    Rp {{ number_format($totalPrice, 0, ',', '.') }}
                                </div>
                                <button type="button"
                                        onclick="copyToClipboard(event)"
                                        class="relative px-3 py-2 bg-orange-500 text-white rounded hover:bg-orange-600 transition-colors duration-200 flex items-center">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-1M8 5a2 2 0 002 2h2a2 2 0 002-2M8 5a2 2 0 012-2h2a2 2 0 012 2m0 0h2a2 2 0 012 2v3m2 4H10m0 0l3-3m-3 3l3 3"/>
                                    </svg>
                                </button>
                            </div>
                        </div>

                        <ol class="space-y-3 text-gray-300">
                            <li class="flex items-start">
                                <span class="flex items-center justify-center bg-orange-500 text-white rounded-full w-6 h-6 mr-3 mt-0.5 flex-shrink-0 text-sm">1</span>
                                <span>Transfer ke rekening Bank BCA: 1234567890 (Prospek Gym)</span>
                            </li>
                            <li class="flex items-start">
                                <span class="flex items-center justify-center bg-orange-500 text-white rounded-full w-6 h-6 mr-3 mt-0.5 flex-shrink-0 text-sm">2</span>
                                <span>Include your name and plan in transfer description</span>
                            </li>
                            <li class="flex items-start">
                                <span class="flex items-center justify-center bg-orange-500 text-white rounded-full w-6 h-6 mr-3 mt-0.5 flex-shrink-0 text-sm">3</span>
                                <span>Send proof of payment to WhatsApp: 081234567890</span>
                            </li>
                            <li class="flex items-start">
                                <span class="flex items-center justify-center bg-orange-500 text-white rounded-full w-6 h-6 mr-3 mt-0.5 flex-shrink-0 text-sm">4</span>
                                <span>Wait for confirmation (max 1x24 hours)</span>
                            </li>
                        </ol>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="flex justify-between items-center space-x-4">
                    <a href="{{ route('membership') }}"
                       class="flex-1 px-6 py-3 text-center rounded-lg border border-orange-500 text-orange-400 hover:bg-orange-500 hover:text-white transition duration-300">
                        Back to Plans
                    </a>
                    @php
                        $waMessage = urlencode("Hi Admin Prospek Gym,\n\nSaya ingin konfirmasi pembayaran untuk:\nPlan: {$plan['name']}\nTotal: Rp " . number_format($totalPrice, 0, ',', '.') . "\n\nTerima kasih.");
                    @endphp
                    <a href="https://wa.me/6281234567890?text={{ $waMessage }}"
                       target="_blank"
                       class="flex-1 px-6 py-3 text-center bg-gradient-to-r from-orange-500 to-amber-500 text-white rounded-lg hover:from-orange-600 hover:to-amber-600 transition duration-300">
                        Confirm Payment
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
