@extends('layouts.appLanding')

@section('title', 'Promo')
@section('content')

    <style>
        body {
            background: #0f0f0f;
            color: #fff;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 1200px;
            margin: auto;
            padding: 40px 20px;
        }

        .promo-header {
            text-align: center;
            margin-bottom: 50px;
        }

        .promo-header h1 {
            font-size: 3rem;
            font-weight: 700;
            margin-bottom: 10px;
            color: #ffffff;
        }

        .promo-header p {
            font-size: 1.2rem;
            color: #ff9900;
        }

        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
            gap: 30px;
        }

        .promo-box {
            display: flex;
            flex-direction: column;
            border-radius: 16px;
            overflow: hidden;
            background: linear-gradient(to bottom, #1a1a1a 60%, #121212 100%);
            border: 1px solid rgba(255, 153, 0, 0.15);
            box-shadow: 0 0 20px rgba(255, 140, 0, 0.05);
            transition: transform 0.3s ease, box-shadow 0.3s ease, border 0.3s ease;
            position: relative;
        }

        .promo-box:hover {
            transform: translateY(-4px);
            box-shadow: 0 0 25px 5px rgba(255, 153, 0, 0.3);
            border: 1px solid rgba(255, 153, 0, 0.4);
        }

        .promo-box-top {
            height: 160px;
        }

        .promo-box-top img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        .promo-box-bottom {
            padding: 20px;
            color: #fff;
            font-size: 0.95rem;
            line-height: 1.5;
            background-color: transparent;
            flex-grow: 1;
        }

        .promo-box:hover .promo-box-bottom {
            background-color: #1e1e1e;
        }

        .promo-box-bottom h2 {
            font-size: 1.1rem;
            color: #ff9900;
            margin-bottom: 10px;
        }

        .promo-box-bottom ul,
        .promo-box-bottom ol,
        .promo-box-bottom p {
            margin: 0 0 10px;
        }

        .promo-box-bottom strong {
            color: #ffffff;
        }

        .discount-badge {
            display: inline-block;
            background: #ff6a00;
            color: black;
            padding: 6px 12px;
            border-radius: 20px;
            font-weight: bold;
            font-size: 0.8rem;
            margin-top: 10px;
        }

        .no-promos {
            text-align: center;
            padding: 60px 20px;
            color: #666;
        }

        .no-promos h3 {
            font-size: 1.5rem;
            margin-bottom: 10px;
            color: #999;
        }
    </style>

    <div class="container">
        <div class="promo-header">
            <h1>PROMO SPESIAL</h1>
            <p>KHUSUS MEMBER <strong>PROSPEK BODY GOALS</strong></p>
        </div>

        @php
            $promotions = app(\App\Http\Controllers\PromotionController::class)->getActivePromotions();
        @endphp

        @if ($promotions->count() > 0)
            <div class="grid">
                @foreach ($promotions as $promo)
                    <div class="promo-box">
                        <div class="promo-box-top">
                            <img src="{{ asset('storage/' . $promo->image) }}" alt="{{ $promo->title }}">
                        </div>
                        <div class="promo-box-bottom">
                            <h2>{{ $promo->title }}</h2>
                            {!! nl2br(e($promo->description)) !!}
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="no-promos">
                <h3>🎯 Promo Segera Hadir!</h3>
                <p>Kami sedang menyiapkan promo-promo menarik untuk Anda.<br>
                    Pantau terus halaman ini untuk update terbaru!</p>
            </div>
        @endif
    </div>

@endsection
