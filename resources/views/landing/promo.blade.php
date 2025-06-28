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
    /* 🔥 background dihapus agar tidak ada lapisan pekat lagi */
    background-color: transparent;
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
</style>

<div class="container">
    <div class="promo-header">
        <h1>PROMO BULAN JUNI 2025</h1>
        <p>KHUSUS MEMBER <strong>PROSPEK BODY GOALS</strong></p>
    </div>

    <div class="grid">
        @php
        $promos = [
            ['img' => 'promo-pelajar.jpg', 'title' => '📘 Promo Khusus Pelajar & Mahasiswa', 'content' => '
                <p><strong>Biaya Pendaftaran:</strong> 25k</p>
                <ul>
                    <li>SD/Sederajat: <strong>60k/bulan</strong></li>
                    <li>SMP/Sederajat: <strong>70k/bulan</strong></li>
                    <li>SMA/Sederajat: <strong>80k/bulan</strong></li>
                </ul>
                <p><strong>Non Member (Harian):</strong> 10k/visit</p>
                <span class="discount-badge">Berlaku sampai Juni 2025</span>
            '],
            ['img' => 'member-aktif.jpg', 'title' => '🔥 Hadiah Untuk Member Paling Aktif', 'content' => '
                <p>Setiap bulan, <strong>1 pria dan 1 wanita</strong> paling aktif akan mendapatkan hadiah menarik.</p>
                <p><em>*Cukup tunjukkan kartu member saat absen</em></p>
            '],
            ['img' => 'auto-wash.jpg', 'title' => '🚗 Gebyar Kinclong – Istana Auto Wash', 'content' => '
                <ul>
                    <li>Cuci Mobil: <strong>Diskon 20%</strong></li>
                    <li>Coating Mobil: Mulai 1.000k</li>
                    <li>Coating Motor: Mulai 500k</li>
                    <li>Jamur Kaca: Mulai 100k</li>
                </ul>
                <p><em>Tunjukkan kartu member aktif & voucher saat transaksi</em></p>
            '],
            ['img' => 'aksesori.jpg', 'title' => '📱 Kartika Accessories HP', 'content' => '
                <ul>
                    <li><strong>Diskon 50%</strong> Biaya pendaftaran member bulanan</li>
                    <li><strong>Diskon 20%</strong> Belanja untuk member aktif</li>
                </ul>
            '],
            ['img' => 'coffee.jpg', 'title' => '☕ De Lapan Coffee & Eatery', 'content' => '
                <p><strong>Diskon 10%</strong> Semua menu</p>
                <p><em>Hanya untuk member aktif bulanan/tahunan</em></p>
            '],
            ['img' => 'join.jpg', 'title' => '👥 Cara Bergabung', 'content' => '
                <ol>
                    <li><strong>Daftar Akun:</strong> Gratis melalui halaman login</li>
                    <li><strong>Pilih Paket:</strong> Sesuai kebutuhan dan budget</li>
                    <li><strong>Mulai Berlatih:</strong> Datang ke gym dan nikmati fasilitas terbaik</li>
                </ol>
            '],
        ];
        @endphp

        @foreach($promos as $promo)
            <div class="promo-box">
                <div class="promo-box-top">
                    <img src="/images/{{ $promo['img'] }}" alt="">
                </div>
                <div class="promo-box-bottom">
                    <h2>{!! $promo['title'] !!}</h2>
                    {!! $promo['content'] !!}
                </div>
            </div>
        @endforeach
    </div>
</div>

@endsection
